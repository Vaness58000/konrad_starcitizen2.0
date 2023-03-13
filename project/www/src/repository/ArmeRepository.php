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

        public function recupIdArm(int $id_objet): int {
            $sql = 'SELECT id_arme FROM equipements_armement WHERE id_objet=:id';
            $recupId = $this->setSql($sql)
                        ->setParamInt(":id", $id_objet)
                        ->fetchAssoc();
            if(empty($recupId)) {
                return 0;
            }
            return intval($recupId['id_arme']);
        }
        
        public function addArm(int $id_arm, int $id_objet, int $id_type, ?string $lien): int {
            $id_main = $id_arm;
            if(empty($description)) {
                $description = "";
            }
            $this->beginTransaction();
            if(!empty($id_arm)) {
                $sql = "UPDATE equipements_armement SET id_type=:id_type,lien=:lien WHERE id_arme=:id";
                $this->setSql($sql)
                    ->setParamInt(":id", $id_arm)
                    ->setParamInt(":id_type", $id_type)
                    ->setParam(":lien", $lien);
                $this->executeSql();
            } else {
                $sql = "INSERT INTO equipements_armement (id_objet, id_type, lien) VALUES (:id_objet, :id_type, :lien)";
                $this->setSql($sql)
                    ->setParamInt(":id_objet", $id_objet)
                    ->setParamInt(":id_type", $id_type)
                    ->setParam(":lien", $lien);
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
        
        public function recupIdConstructArm(int $id_transp): int {
            $sql = 'SELECT id FROM construct_arm WHERE id_arm=:id';
            $recupId = $this->setSql($sql)
                        ->setParamInt(":id", $id_transp)
                        ->fetchAssoc();
            if(empty($recupId)) {
                return 0;
            }
            return intval($recupId['id']);
        }

        public function addModConstruct(int $id, int $id_arm, int $id_construct): int {
            $id_main = $id;
            if(!empty($id)) {
                $this->beginTransaction();
                $sql = "UPDATE construct_arm SET id_construct=:id_construct WHERE id=:id";
                $this->setSql($sql)
                    ->setParamInt(":id", $id)
                    ->setParamInt(":id_construct", $id_construct);
                $this->executeSql();
            }else {
                $this->beginTransaction();
                $sql = "INSERT INTO construct_arm (id_construct, id_arm) VALUES (:id_construct, :id_arm)";
                $this->setSql($sql)
                    ->setParamInt(":id_construct", $id_construct)
                    ->setParamInt(":id_arm", $id_arm);
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

        public function addModLieu(int $id, int $id_arm, int $id_lieu, ?string $prix): int {
            $id_main = $id;
            $this->beginTransaction();
            if(!empty($id)) {
                $sql = "UPDATE arm_lieu SET id_lieu=:id_lieu,prix=:prix WHERE id=:id";
                $this->setSql($sql)
                            ->setParamInt(":id", $id)
                            ->setParamInt(":id_lieu", $id_lieu)
                            ->setParam(":prix", $prix);
                $this->executeSql();
            } else {
                $sql = "INSERT INTO arm_lieu (id_lieu, id_arm, prix) VALUES (:id_lieu, :id_arm, :prix)";
                $this->setSql($sql)
                            ->setParamInt(":id_arm", $id_arm)
                            ->setParamInt(":id_lieu", $id_lieu)
                            ->setParam(":prix", $prix);
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

        public function deleteLieu(int $id): self {
            $sql = "DELETE FROM arm_lieu WHERE id=:id";
            $this->setSql($sql)->setParamInt(":id", $id);
            $this->executeSql();
            return $this;
        }

        public function recupIdArmCouleur(int $id_transp): int {
            $sql = 'SELECT id FROM couleur_lieu_arm WHERE id_arm_lieu=:id';
            $recupId = $this->setSql($sql)
                        ->setParamInt(":id", $id_transp)
                        ->fetchAssoc();
            if(empty($recupId)) {
                return 0;
            }
            return intval($recupId['id']);
        }

        public function addModArmCouleur(int $id, int $id_arm_lieu, int $id_couleur): int {
            $id_main = $id;
            if(!empty($id)) {
                $this->beginTransaction();
                $sql = "UPDATE couleur_lieu_arm SET id_couleur=:id_couleur WHERE id=:id";
                $this->setSql($sql)
                    ->setParamInt(":id", $id)
                    ->setParamInt(":id_couleur", $id_couleur);
                $this->executeSql();
            }else {
                $this->beginTransaction();
                $sql = "INSERT INTO couleur_lieu_arm (id_arm_lieu, id_couleur) VALUES (:id_arm_lieu, :id_couleur)";
                $this->setSql($sql)
                    ->setParamInt(":id_arm_lieu", $id_arm_lieu)
                    ->setParamInt(":id_couleur", $id_couleur);
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

