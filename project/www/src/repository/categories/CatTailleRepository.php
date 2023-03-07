<?php

// verifier qu'on n'a pas deja creer la fonction
if (!class_exists('CatTailleRepository')) {
    // inculre la classe qui va creer le fichier "errors.log" en cas d'erreur.
    include_once dirname(__FILE__) . '/../../class/classMain/Repository.php';

    // fonction pour faire la connexion a la base de donnes
    class CatTailleRepository extends Repository {

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
            return $this->setSql('SELECT * FROM taille_arm_vaisseau AS cat INNER JOIN utilisateurs ON utilisateurs.id_user = cat.id_user_cat')->fetchAllAssoc();
        }


        public function findAllOrder(bool $orderName = false):array {
            $order = "cat.id DESC";
            if($orderName) {
                $order = "cat.taille";
            }
            return $this->setSql('SELECT * FROM taille_arm_vaisseau AS cat INNER JOIN utilisateurs ON utilisateurs.id_user = cat.id_user_cat ORDER BY '.$order)->fetchAllAssoc();
        }

        public function findAllId(int $id):array {
            return $this->setSql('SELECT * FROM taille_arm_vaisseau AS cat INNER JOIN utilisateurs ON utilisateurs.id_user = cat.id_user_cat WHERE id=:id')->setParamInt(":id", $id)->fetchAssoc();
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
            $order = "cat.id DESC";
            if($orderName) {
                $order = "cat.taille";
            }
            $sql = 'SELECT * FROM taille_arm_vaisseau AS cat INNER JOIN utilisateurs ON utilisateurs.id_user = cat.id_user_cat ORDER BY '.$order.$limit.'';
            return $this->setSql($sql)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndCount():int {
            $sql = 'SELECT * FROM taille_arm_vaisseau AS cat INNER JOIN utilisateurs ON utilisateurs.id_user = cat.id_user_cat';
            return $this->setSql($sql)
                        ->rowCount();
        }
        
        public function addMod(int $id, string $taille, int $id_user): self {
            if(!empty($id)) {
                $sql = "UPDATE taille_arm_vaisseau SET taille=:taille WHERE id=:id";
                $this->setSql($sql)
                            ->setParamInt(":id", $id)
                            ->setParam(":taille", $taille);
                $this->executeSql();
            } else {
                $sql = "INSERT INTO taille_arm_vaisseau(taille, id_user_cat) VALUES (:taille, :id_user_cat)";
                $this->setSql($sql)
                            ->setParamInt(":id_user_cat", $id_user)
                            ->setParam(":taille", $taille);
                $this->executeSql();
            }
            return $this;
        }

        public function delete(int $id): self {
            $sql = "DELETE FROM taille_arm_vaisseau WHERE id=:id";
            $this->setSql($sql)->setParamInt(":id", $id);
            $this->executeSql();
            return $this;
        }

        public function nameValid(int $id, string $taille) {
            return $this->setSql('SELECT * FROM taille_arm_vaisseau WHERE taille=:taille AND id!=:id')
                    ->setParamInt(":id", $id)->setParam(":taille", $taille)->rowCount() == 0;
        }

    }
}

