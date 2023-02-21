<?php

// verifier qu'on n'a pas deja creer la fonction
if (!class_exists('ConstructeurRepository')) {
    // inculre la classe qui va creer le fichier "errors.log" en cas d'erreur.
    include_once dirname(__FILE__) . '/../class/classMain/Repository.php';

    // fonction pour faire la connexion a la base de donnes
    class ConstructeurRepository extends Repository {

        /**
         * Constructeur par defaut
         */
        public function __construct(bool $isDatabase = true, ?string $file_config = null) {
            parent::__construct($isDatabase, $file_config);
        }

        /**
         * Recuperer toutes les donnees de la table
         */
        public function findAll():array {
            return $this->setSql('SELECT * FROM constructeur')->fetchAllAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findAllAndUser():array {
            return $this->setSql('SELECT * FROM utilisateurs '.
                'INNER JOIN articles ON utilisateurs.id_user = articles.id_user')->fetchAllAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findAllImgArticle(int $id):array {
            return $this->setSql('SELECT * FROM articles_image WHERE id_article=:id_article')->setParamInt(":id_article", $id)->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserIdPage(int $id, int $nmPage=0, int $nbArtPage=0):array {
            $limit = "";
            if(!empty($nbArtPage)) {
                $nmStart = $nmPage*$nbArtPage;
                $limit = " LIMIT $nbArtPage OFFSET $nmStart";
            }
            $sql = 'SELECT * FROM constructeur '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = constructeur.id_user '.
                    'WHERE utilisateurs.id_user=:id_user ORDER BY constructeur.id_constructeur DESC'.$limit.'';
            return $this->setSql($sql)
                        ->setParamInt(":id_user", $id)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserIdCount(int $id):int {
            $sql = 'SELECT * FROM constructeur '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = constructeur.id_user '.
                    'WHERE utilisateurs.id_user=:id_user ORDER BY constructeur.id_constructeur DESC';
            return $this->setSql($sql)
                        ->setParamInt(":id_user", $id)
                        ->rowCount();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserPage(int $nmPage=0, int $nbArtPage=0):array {
            $limit = "";
            if(!empty($nbArtPage)) {
                $nmStart = $nmPage*$nbArtPage;
                $limit = " LIMIT $nbArtPage OFFSET $nmStart";
            }
            $sql = 'SELECT * FROM constructeur '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = constructeur.id_user '.
                    'ORDER BY constructeur.id_constructeur DESC'.$limit.'';
            return $this->setSql($sql)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserCount():int {
            $sql = 'SELECT * FROM constructeur '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = constructeur.id_user '.
                    'ORDER BY constructeur.id_constructeur DESC';
            return $this->setSql($sql)
                        ->rowCount();
        }
    }
}

