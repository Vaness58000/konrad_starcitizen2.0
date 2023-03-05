<?php

// verifier qu'on n'a pas deja creer la fonction
if (!class_exists('EspecesRepository')) {
    // inculre la classe qui va creer le fichier "errors.log" en cas d'erreur.
    include_once dirname(__FILE__) . '/ObjetRepository.php';

    // fonction pour faire la connexion a la base de donnes
    class EspecesRepository extends ObjetRepository {

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
            return $this->setSql('SELECT *, objet.id AS id_objet, objet.nom AS nom_obj FROM objet '.
                    'INNER JOIN especes ON especes.id_objet = objet.id '.
                    'LEFT JOIN lieu_espece ON especes.id_espece = lieu_espece.id_espece '.
                    'INNER JOIN categorie_arm_fps ON arm_fps.id_cat = categorie_arm_fps.id_categ_arme '.
                    '')->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserIdPage(int $id_type, int $id, int $nmPage=0, int $nbArtPage=0):array {
            $limit = "";
            if(!empty($nbArtPage)) {
                $nmStart = $nmPage*$nbArtPage;
                $limit = " LIMIT $nbArtPage OFFSET $nmStart";
            }
            $sql = 'SELECT *, objet.id AS id_objet, objet.nom AS nom_obj FROM objet '.
            'INNER JOIN especes ON especes.id_objet = objet.id '.
            'LEFT JOIN lieu_espece ON especes.id_espece = lieu_espece.id_espece '.
            'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
            'WHERE objet.id_objet_type=:id_type && utilisateurs.id_user=:id_user ORDER BY objet.id DESC'.$limit.'';
            return $this->setSql($sql)
                        ->setParamInt(":id_user", $id)
                        ->setParamInt(":id_type", $id_type)
                        ->fetchAllAssoc();
        }

        public function findAllAndIdUser(int $id):array {
            return $this->setSql('SELECT *, objet.id AS id_objet, objet.nom AS nom_obj FROM objet '.
                    'INNER JOIN especes ON especes.id_objet = objet.id '.
                    'LEFT JOIN lieu_espece ON especes.id_espece = lieu_espece.id_espece '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'WHERE objet.id=:id')->setParamInt(":id", $id)->fetchAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserIdCount(int $id_type, int $id):int {
            $sql = 'SELECT *, objet.id AS id_objet, objet.nom AS nom_obj FROM objet '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'INNER JOIN especes ON especes.id_objet = objet.id '.
                    'LEFT JOIN lieu_espece ON especes.id_espece = lieu_espece.id_espece '.
                    'WHERE objet.id_objet_type=:id_type && utilisateurs.id_user=:id_user ORDER BY objet.id DESC';
            return $this->setSql($sql)
                        ->setParamInt(":id_user", $id)
                        ->setParamInt(":id_type", $id_type)
                        ->rowCount();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserPage(int $id_type, int $nmPage=0, int $nbArtPage=0):array {
            $limit = "";
            if(!empty($nbArtPage)) {
                $nmStart = $nmPage*$nbArtPage;
                $limit = " LIMIT $nbArtPage OFFSET $nmStart";
            }
            $sql = 'SELECT *, objet.id AS id_objet, objet.nom AS nom_obj FROM objet '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'INNER JOIN especes ON especes.id_objet = objet.id '.
                    'LEFT JOIN lieu_espece ON especes.id_espece = lieu_espece.id_espece '.
                    'WHERE objet.id_objet_type=:id_type ORDER BY objet.id DESC'.$limit.'';
            return $this->setSql($sql)
                        ->setParamInt(":id_type", $id_type)
                        ->fetchAllAssoc();
        }

        public function findAllIdAndDiplomatie(int $id):array {
            $sql = 'SELECT *, diplomatie.id AS id_diplomat, diplomatie_espece.id AS id_diplo_esp FROM diplomatie '.
                    'INNER JOIN diplomatie_espece ON diplomatie.id = diplomatie_espece.id_diplomatie '.
                    'WHERE diplomatie_espece.id_espece=:id ORDER BY diplomatie_espece.id DESC';
            return $this->setSql($sql)
                        ->setParamInt(":id", $id)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserCount(int $id_type):int {
            $sql = 'SELECT *, objet.id AS id_objet, objet.nom AS nom_obj FROM objet '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'INNER JOIN especes ON especes.id_objet = objet.id '.
                    'LEFT JOIN lieu_espece ON especes.id_espece = lieu_espece.id_espece '.
                    'WHERE objet.id_objet_type=:id_type ORDER BY objet.id DESC';
            return $this->setSql($sql)
                        ->setParamInt(":id_type", $id_type)
                        ->rowCount();
        }

        public function findListCat():array {
            $sql = 'SELECT * FROM categories_especes ORDER BY id_categ_espece DESC';
            return $this->setSql($sql)
                        ->fetchAllAssoc();
        }

        public function findAllIdAndControle(int $id):array {
            $sql = 'SELECT *, controle_lieu.id AS id_control_lieu, objet.id AS id_obj, objet.nom AS nom_lieu FROM objet '.
                    'INNER JOIN lieux ON lieux.id_objet = objet.id '.
                    'INNER JOIN controle_lieu ON controle_lieu.id_lieu = lieux.id_lieu '.
                    'WHERE controle_lieu.id_espece=:id && objet.validation=1 ORDER BY controle_lieu.id DESC';
            return $this->setSql($sql)
                        ->setParamInt(":id", $id)
                        ->fetchAllAssoc();
        }

        public function findIdTypeEspece():int {
            return $this->findIdTypeObj("espèces");
        }
    }
}

