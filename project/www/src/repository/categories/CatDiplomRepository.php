<?php

// verifier qu'on n'a pas deja creer la fonction
if (!class_exists('CatDiplomRepository')) {
    // inculre la classe qui va creer le fichier "errors.log" en cas d'erreur.
    include_once dirname(__FILE__) . '/../../class/classMain/Repository.php';

    // fonction pour faire la connexion a la base de donnes
    class CatDiplomRepository extends Repository {

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
            return $this->setSql('SELECT * FROM diplomatie INNER JOIN diplomatie_espece ON diplomatie_espece.id_diplomatie = diplomatie.id')->fetchAllAssoc();
        }


        public function findAllOrder(bool $orderName = false):array {
            $order = "diplomatie.id DESC";
            if($orderName) {
                $order = "diplomatie.type";
            }
            return $this->setSql('SELECT * FROM diplomatie INNER JOIN diplomatie_espece ON diplomatie_espece.id_diplomatie = diplomatie.id ORDER BY '.$order)->fetchAllAssoc();
        }

        public function findAllId(int $id):array {
            return $this->setSql('SELECT * FROM diplomatie INNER JOIN diplomatie_espece ON diplomatie_espece.id_diplomatie = diplomatie.id WHERE diplomatie.id=:id')->setParamInt(":id", $id)->fetchAssoc();
        }

        public function findAllEspeceId(int $id):array {
            return $this->setSql('SELECT * FROM diplomatie INNER JOIN diplomatie_espece ON diplomatie_espece.id_diplomatie = diplomatie.id WHERE diplomatie_espece.id_espece=:id')->setParamInt(":id", $id)->fetchAllAssoc();
        }

        /*public function findAllAndIdUser(int $id):array {
            return $this->setSql('SELECT *, arm_fps.id_arm AS id_arm_fps, objet.id AS id_objet, objet.nom AS nom_obj, categorie_arm_fps.nom AS nom_cat FROM objet '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'INNER JOIN equipements_armement ON equipements_armement.id_objet = objet.id '.
                    'INNER JOIN arm_fps ON equipements_armement.id_arme = arm_fps.id_arm '.
                    'LEFT JOIN construct_arm ON equipements_armement.id_arme = construct_arm.id_arm '.
                    'INNER JOIN categorie_arm_fps ON arm_fps.id_cat = categorie_arm_fps.id_categ_arme WHERE objet.id=:id')->setParamInt(":id", $id)->fetchAssoc();
        }*/

        public function findAllAndPage(int $nmPage=0, int $nbArtPage=0, bool $orderName = false):array {
            $limit = "";
            if(!empty($nbArtPage)) {
                $nmStart = $nmPage*$nbArtPage;
                $limit = " LIMIT $nbArtPage OFFSET $nmStart";
            }
            $order = "diplomatie.id DESC";
            if($orderName) {
                $order = "diplomatie.type";
            }
            $sql = 'SELECT * FROM diplomatie INNER JOIN diplomatie_espece ON diplomatie_espece.id_diplomatie = diplomatie.id ORDER BY '.$order.$limit.'';
            return $this->setSql($sql)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndCount():int {
            $sql = 'SELECT * FROM diplomatie INNER JOIN diplomatie_espece ON diplomatie_espece.id_diplomatie = diplomatie.id';
            return $this->setSql($sql)
                        ->rowCount();
        }


    }
}

