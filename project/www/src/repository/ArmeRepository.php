<?php

// verifier qu'on n'a pas deja creer la fonction
if (!class_exists('ArmeRepository')) {
    // inculre la classe qui va creer le fichier "errors.log" en cas d'erreur.
    include_once dirname(__FILE__) . '/ObjetRepository.php';

    // fonction pour faire la connexion a la base de donnes
    class ArmeRepository extends ObjetRepository {

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
            return $this->setSql('SELECT *, objet.id AS id_objet, objet.nom AS nom_arm, categorie_arm_fps.nom AS nom_cat FROM objet '.
                    'INNER JOIN equipements_armement ON equipements_armement.id_objet = objet.id '.
                    'INNER JOIN arm_fps ON equipements_armement.id_arme = arm_fps.id_arm '.
                    'LEFT JOIN construct_arm ON equipements_armement.id_arme = construct_arm.id_arm '.
                    'INNER JOIN categorie_arm_fps ON arm_fps.id_cat = categorie_arm_fps.id_categ_arme')->fetchAllAssoc();
        }

        public function findAllIdAndLieux(int $id, bool $orderName = false):array {
            $order = "arm_lieu.id DESC";
            if($orderName) {
                $order = "objet.nom";
            }
            $sql = 'SELECT *, couleur.nom AS nom_couleur, objet.id AS id_obj, arm_lieu.id AS id_lieu_arm, objet.nom AS nom_lieu FROM objet '.
                    'INNER JOIN lieux ON lieux.id_objet = objet.id '.
                    'INNER JOIN arm_lieu ON arm_lieu.id_lieu = lieux.id_lieu '.
                    'LEFT JOIN construct_arm ON arm_lieu.id_arm = construct_arm.id_arm '.
                    'LEFT JOIN couleur_lieu_arm ON arm_lieu.id = couleur_lieu_arm.id_arm_lieu '.
                    'LEFT JOIN couleur ON couleur_lieu_arm.id_couleur = couleur.id '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'WHERE arm_lieu.id_arm=:id && objet.validation=1 ORDER BY '.$order;
            return $this->setSql($sql)
                        ->setParamInt(":id", $id)
                        ->fetchAllAssoc();
        }

        public function findIdTypeArmMain(string $name):int {
            $tab_type = $this->setSql('SELECT * FROM type_arm WHERE nom=:nom')->setParam(":nom", $name)->fetchAssoc();
            if(!(!empty($tab_type) && array_key_exists("id", $tab_type) && !empty($tab_type["id"]))) {
                return 0;
            }
            return intval($tab_type["id"]);
        }

    }
}

