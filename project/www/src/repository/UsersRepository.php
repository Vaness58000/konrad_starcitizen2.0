<?php

// verifier qu'on n'a pas deja creer la fonction
if (!class_exists('UsersRepository')) {
    // inculre la classe qui va creer le fichier "errors.log" en cas d'erreur.
    include_once dirname(__FILE__) . '/ObjetRepository.php';

    // fonction pour faire la connexion a la base de donnes
    class UsersRepository extends ObjetRepository {

        /**
         * Constructeur par defaut
         */
        public function __construct(bool $isDatabase = true, ?string $file_config = null) {
            parent::__construct($isDatabase, $file_config);
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findAll():array {
            return $this->setSql('SELECT * FROM utilisateurs  '.
            'LEFT JOIN avatar ON utilisateurs.id_user = avatar.id_user')->fetchAllAssoc();
        }

        public function findAllId(int $id):array {
            return $this->setSql('SELECT *, utilisateurs.id_user AS idUser FROM utilisateurs '.
            'LEFT JOIN avatar ON utilisateurs.id_user = avatar.id_user WHERE utilisateurs.id_user=:id')->setParamInt(":id", $id)->fetchAssoc();
        }

        public function findAllNoId(int $id):array {
            return $this->setSql('SELECT * FROM utilisateurs '.
            'LEFT JOIN avatar ON utilisateurs.id_user = avatar.id_user '.
            'WHERE utilisateurs.id_user !=:id_user')->setParamInt(":id_user", $id)->fetchAllAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findRoleAll():array {
            return $this->setSql('SELECT * FROM type_role')->fetchAllAssoc();
        }
        
        public function findAllUserAvatarId(int $id):array {
            return $this->setSql('SELECT * FROM avatar WHERE id_user=:id')->setParamInt(":id", $id)->fetchAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserNoIdPage(int $id, int $nmPage=0, int $nbArtPage=0):array {
            $limit = "";
            if(!empty($nbArtPage)) {
                $nmStart = $nmPage*$nbArtPage;
                $limit = " LIMIT $nbArtPage OFFSET $nmStart";
            }
            $sql = 'SELECT * FROM utilisateurs '.
                    'LEFT JOIN avatar ON utilisateurs.id_user = avatar.id_user '.
                    'WHERE utilisateurs.id_user !=:id_user '.
                    'ORDER BY utilisateurs.id_user DESC'.$limit.'';
            return $this->setSql($sql)
                        ->setParamInt(":id_user", $id)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserNoIdCount(int $id):int {
            $sql = 'SELECT * FROM utilisateurs '.
                    'LEFT JOIN avatar ON utilisateurs.id_user = avatar.id_user '.
                    'WHERE utilisateurs.id_user !=:id_user '.
                    'ORDER BY utilisateurs.id_user DESC';
            return $this->setSql($sql)
                        ->setParamInt(":id_user", $id)
                        ->rowCount();
        }
        
    }
}

