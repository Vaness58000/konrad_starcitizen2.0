<?php

// verifier qu'on n'a pas deja creer la fonction
if (!class_exists('ArmeVaissRepository')) {
    // inculre la classe qui va creer le fichier "errors.log" en cas d'erreur.
    include_once dirname(__FILE__) . '/ArmeRepository.php';

    // fonction pour faire la connexion a la base de donnes
    class ArmeVaissRepository extends ArmeRepository {

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
            return $this->setSql('SELECT *, objet.id AS id_objet, objet.nom AS nom_arm FROM objet '.
                    'INNER JOIN equipements_armement ON equipements_armement.id_objet = objet.id '.
                    'INNER JOIN arm_vaiss ON equipements_armement.id_arme = arm_vaiss.id_arm '.
                    'LEFT JOIN construct_arm ON equipements_armement.id_arme = construct_arm.id_arm')->fetchAllAssoc();
        }

        public function findAllId(int $id):array {
            return $this->setSql('SELECT *, objet.id AS id_objet, objet.nom AS nom_arm FROM objet '.
                    'INNER JOIN equipements_armement ON equipements_armement.id_objet = objet.id '.
                    'INNER JOIN arm_vaiss ON equipements_armement.id_arme = arm_vaiss.id_arm '.
                    'LEFT JOIN construct_arm ON equipements_armement.id_arme = construct_arm.id_arm WHERE arm_fps.id=:id')->setParamInt(":id", $id)->fetchAllAssoc();
        }
        
        public function findAllTranspId(int $id):array {
            return $this->setSql('SELECT *, transport_arm.id AS id_transport_arm, arm_vaiss.id AS id_arm_transp, objet.id AS id_objet, objet.nom AS nom_arm FROM objet '.
                    'INNER JOIN equipements_armement ON equipements_armement.id_objet = objet.id '.
                    'INNER JOIN arm_vaiss ON equipements_armement.id_arme = arm_vaiss.id_arm '.
                    'INNER JOIN transport_arm ON transport_arm.id_arm_transp = arm_vaiss.id '.
                    'LEFT JOIN construct_arm ON equipements_armement.id_arme = construct_arm.id_arm WHERE transport_arm.id_transport=:id')->setParamInt(":id", $id)->fetchAllAssoc();
        }


        public function findAllOrder(bool $orderName = false):array {
            $order = "objet.id DESC";
            if($orderName) {
                $order = "objet.nom";
            }
            return $this->setSql('SELECT *, arm_vaiss.id AS id_arm_vaiss, objet.id AS id_objet, objet.nom AS nom_arm FROM objet '.
                    'INNER JOIN equipements_armement ON equipements_armement.id_objet = objet.id '.
                    'INNER JOIN arm_vaiss ON equipements_armement.id_arme = arm_vaiss.id_arm '.
                    'LEFT JOIN construct_arm ON equipements_armement.id_arme = construct_arm.id_arm ORDER BY '.$order)->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserIdPage(int $id_type, int $id, int $nmPage=0, int $nbArtPage=0):array {
            $limit = "";
            if(!empty($nbArtPage)) {
                $nmStart = $nmPage*$nbArtPage;
                $limit = " LIMIT $nbArtPage OFFSET $nmStart";
            }
            $sql = 'SELECT *, objet.id AS id_objet, objet.nom AS nom_obj FROM objet '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'INNER JOIN equipements_armement ON equipements_armement.id_objet = objet.id '.
                    'INNER JOIN arm_vaiss ON equipements_armement.id_arme = arm_vaiss.id_arm '.
                    'WHERE objet.id_objet_type=:id_type && utilisateurs.id_user=:id_user ORDER BY objet.id DESC'.$limit.'';
            return $this->setSql($sql)
                        ->setParamInt(":id_user", $id)
                        ->setParamInt(":id_type", $id_type)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserIdCount(int $id_type, int $id):int {
            $sql = 'SELECT *, objet.id AS id_objet, objet.nom AS nom_obj FROM objet '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'INNER JOIN equipements_armement ON equipements_armement.id_objet = objet.id '.
                    'INNER JOIN arm_vaiss ON equipements_armement.id_arme = arm_vaiss.id_arm '.
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
                    'INNER JOIN equipements_armement ON equipements_armement.id_objet = objet.id '.
                    'INNER JOIN arm_vaiss ON equipements_armement.id_arme = arm_vaiss.id_arm '.
                    'WHERE objet.id_objet_type=:id_type ORDER BY objet.id DESC'.$limit.'';
            return $this->setSql($sql)
                        ->setParamInt(":id_type", $id_type)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserCount(int $id_type):int {
            $sql = 'SELECT *, objet.id AS id_objet, objet.nom AS nom_obj FROM objet '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'INNER JOIN equipements_armement ON equipements_armement.id_objet = objet.id '.
                    'INNER JOIN arm_vaiss ON equipements_armement.id_arme = arm_vaiss.id_arm '.
                    'WHERE objet.id_objet_type=:id_type ORDER BY objet.id DESC';
            return $this->setSql($sql)
                        ->setParamInt(":id_type", $id_type)
                        ->rowCount();
        }

        public function findAllAndIdUser(int $id):array {
            return $this->setSql('SELECT *, arm_vaiss.id_arm AS arm_vaiss_fps, objet.id AS id_objet, objet.nom AS nom_obj FROM objet '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'INNER JOIN equipements_armement ON equipements_armement.id_objet = objet.id '.
                    'INNER JOIN arm_vaiss ON equipements_armement.id_arme = arm_vaiss.id_arm '.
                    'LEFT JOIN construct_arm ON equipements_armement.id_arme = construct_arm.id_arm '.
                    'WHERE objet.id=:id')->setParamInt(":id", $id)->fetchAssoc();
        }

        /*public function findAllIdAndLieux(int $id):array {
            $sql = 'SELECT *, couleur.nom AS nom_couleur, objet.id AS id_obj, arm_lieu.id AS id_lieu_arm, objet.nom AS nom_lieu FROM objet '.
                    'INNER JOIN lieux ON lieux.id_objet = objet.id '.
                    'INNER JOIN arm_lieu ON arm_lieu.id_lieu = lieux.id_lieu '.
                    'LEFT JOIN construct_arm ON arm_lieu.id_arm = construct_arm.id_arm '.
                    'LEFT JOIN couleur_lieu_arm ON arm_lieu.id = couleur_lieu_arm.id_arm_lieu '.
                    'LEFT JOIN couleur ON couleur_lieu_arm.id_couleur = couleur.id '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'WHERE arm_lieu.id_arm=:id && objet.validation=1 ORDER BY arm_lieu.id DESC';
            return $this->setSql($sql)
                        ->setParamInt(":id", $id)
                        ->fetchAllAssoc();
        }*/

        public function findListTaille():array {
            $sql = 'SELECT * FROM taille_arm_vaisseau ORDER BY id DESC';
            return $this->setSql($sql)
                        ->fetchAllAssoc();
        }

        public function findIdTypeArm():int {
            return $this->findIdTypeObj("armement");
        }

        public function findIdTypeArmTransp():int {
            return $this->findIdTypeArmMain("armement des vaisseaux");
        }

        public function recupIdArmTransp(int $id_arm): int {
            $sql = 'SELECT id FROM arm_fps WHERE id_arm=:id';
            $recupId = $this->setSql($sql)
                        ->setParamInt(":id", $id_arm)
                        ->fetchAssoc();
            if(empty($recupId)) {
                return 0;
            }
            return intval($recupId['id']);
        }
        
        public function add(int $id_transp, int $id_arm, int $id_taille): int {
            $id_main = $id_transp;
            if(empty($description)) {
                $description = "";
            }
            $this->beginTransaction();
            if(!empty($id_transp)) {
                $sql = "UPDATE arm_vaiss SET id_taille=:id_taille WHERE id=:id";
                $this->setSql($sql)
                    ->setParamInt(":id", $id_transp)
                    ->setParamInt(":id_taille", $id_taille);
                $this->executeSql();
            } else {
                $sql = "INSERT INTO arm_vaiss (id_arm, id_taille) VALUES (:id_arm, :id_taille)";
                $this->setSql($sql)
                    ->setParamInt(":id_arm", $id_arm)
                    ->setParamInt(":id_taille", $id_taille);
                $this->executeSql();
                $id_main = $this->lastInsertId();
            }
            // en cas d'erreur
            if(Error_Log::isError()) {
                $id_main = 0;
                $this->rollBack();
            } else {
                $this->commit();
            }
            return $id_main;
        }

    }
}

