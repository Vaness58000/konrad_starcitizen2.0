<?php

// verifier qu'on n'a pas deja creer la fonction
if (!class_exists('ObjetRepository')) {
    // inculre la classe qui va creer le fichier "errors.log" en cas d'erreur.
    include_once dirname(__FILE__) . '/../class/classMain/Repository.php';

    // fonction pour faire la connexion a la base de donnes
    class ObjetRepository extends Repository {

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
            return $this->setSql('SELECT * FROM objet')->fetchAllAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findAllAndUser():array {
            return $this->setSql('SELECT * FROM objet '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user')->fetchAllAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findAllImgObj(int $id):array {
            return $this->setSql('SELECT * FROM images_objet WHERE id_objet=:id_objet')->setParamInt(":id_objet", $id)->fetchAllAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findAllInfObj(int $id):array {
            return $this->setSql('SELECT * FROM info_objet WHERE id_objet=:id_objet')->setParamInt(":id_objet", $id)->fetchAllAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findAllImgInfObj(int $id):array {
            return $this->setSql('SELECT * FROM images_info_objet WHERE id_info_objet=:id_info_objet')->setParamInt(":id_info_objet", $id)->fetchAllAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findListTypeObj(int $id):array {
            return $this->setSql('SELECT * FROM objet_type')->fetchAllAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findIdTypeObj(string $name):int {
            $tab_type = $this->setSql('SELECT * FROM objet_type WHERE nom=:nom')->setParam(":nom", $name)->fetchAssoc();
            if(!(!empty($tab_type) && array_key_exists("id", $tab_type) && !empty($tab_type["id"]))) {
                return 0;
            }
            return intval($tab_type["id"]);
        }

        public function imagePrincipale(int $id_obj):?array {
            $imgPrinc = $this->setSql('SELECT * FROM images_objet WHERE id_objet=:id_objet AND img_principal=1')->setParamInt(":id_objet", $id_obj)->fetchAssoc();
            if(!empty($imgPrinc)) {
                return $imgPrinc;
            }
            return $this->setSql('SELECT * FROM images_objet WHERE id_objet=:id_objet LIMIT 1')->setParamInt(":id_objet", $id_obj)->fetchAssoc();
        }

    }
}

