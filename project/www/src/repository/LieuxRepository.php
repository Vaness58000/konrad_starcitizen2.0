<?php

// verifier qu'on n'a pas deja creer la fonction
if (!class_exists('LieuxRepository')) {
    // inculre la classe qui va creer le fichier "errors.log" en cas d'erreur.
    include_once dirname(__FILE__) . '/ObjetRepository.php';

    // fonction pour faire la connexion a la base de donnes
    class LieuxRepository extends ObjetRepository {

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
            return $this->setSql('SELECT *, objet.id AS id_objet, objet.nom AS nom_lieu, categories_lieux.nom AS nom_cat FROM objet '.
                    'INNER JOIN lieux ON lieux.id_objet = objet.id '.
                    'INNER JOIN categories_lieux ON categories_lieux.id_categ_lieu = lieux.id_categ_lieu')->fetchAllAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findAllCat(int $id_cat):array {
            return $this->setSql('SELECT *, objet.id AS id_objet, objet.nom AS nom_lieu, categories_lieux.nom AS nom_cat FROM objet '.
                    'INNER JOIN lieux ON lieux.id_objet = objet.id '.
                    'INNER JOIN categories_lieux ON categories_lieux.id_categ_lieu = lieux.id_categ_lieu '.
                    'WHERE categories_lieux.id_categ_lieu=:id_cat')->setParamInt(":id_cat", $id_cat)->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserIdPage(int $id_type, int $id, int $nmPage=0, int $nbArtPage=0):array {
            $limit = "";
            if(!empty($nbArtPage)) {
                $nmStart = $nmPage*$nbArtPage;
                $limit = " LIMIT $nbArtPage OFFSET $nmStart";
            }
            $sql = 'SELECT *, objet.id AS id_objet, objet.nom AS nom_obj, categories_lieux.nom AS nom_cat FROM objet '.
            'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
            'INNER JOIN lieux ON lieux.id_objet = objet.id '.
            'INNER JOIN categories_lieux ON categories_lieux.id_categ_lieu = lieux.id_categ_lieu '.
            'WHERE objet.id_objet_type=:id_type && utilisateurs.id_user=:id_user ORDER BY objet.id DESC'.$limit.'';
            return $this->setSql($sql)
                        ->setParamInt(":id_user", $id)
                        ->setParamInt(":id_type", $id_type)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserIdCount(int $id_type, int $id):int {
            $sql = 'SELECT *, objet.id AS id_objet, objet.nom AS nom_obj, categories_lieux.nom AS nom_cat FROM objet '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'INNER JOIN lieux ON lieux.id_objet = objet.id '.
                    'INNER JOIN categories_lieux ON categories_lieux.id_categ_lieu = lieux.id_categ_lieu '.
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
            $sql = 'SELECT *, objet.id AS id_objet, objet.nom AS nom_obj, categories_lieux.nom AS nom_cat FROM objet '.
            'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
            'INNER JOIN lieux ON lieux.id_objet = objet.id '.
            'INNER JOIN categories_lieux ON categories_lieux.id_categ_lieu = lieux.id_categ_lieu '.
            'WHERE objet.id_objet_type=:id_type ORDER BY objet.id DESC'.$limit.'';
            return $this->setSql($sql)
                        ->setParamInt(":id_type", $id_type)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserCount(int $id_type):int {
            $sql = 'SELECT *, objet.id AS id_objet, objet.nom AS nom_obj, categories_lieux.nom AS nom_cat FROM objet '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'INNER JOIN lieux ON lieux.id_objet = objet.id '.
                    'INNER JOIN categories_lieux ON categories_lieux.id_categ_lieu = lieux.id_categ_lieu '.
                    'WHERE objet.id_objet_type=:id_type ORDER BY objet.id DESC';
            return $this->setSql($sql)
                        ->setParamInt(":id_type", $id_type)
                        ->rowCount();
        }

    }
}

