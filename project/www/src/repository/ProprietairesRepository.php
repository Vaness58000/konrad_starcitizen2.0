<?php

// verifier qu'on n'a pas deja creer la fonction
if (!class_exists('ProprietairesRepository')) {
    // inculre la classe qui va creer le fichier "errors.log" en cas d'erreur.
    include_once dirname(__FILE__) . '/ObjetRepository.php';

    // fonction pour faire la connexion a la base de donnes
    class ProprietairesRepository extends ObjetRepository {

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
            return $this->setSql('SELECT *, objet.id AS id_objet, proprietaire.id AS id_proprietaire, objet.nom AS nom_obj FROM objet '.
                'INNER JOIN proprietaire ON proprietaire.id_objet = objet.id')->fetchAllAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findAllAndUser():array {
            return $this->setSql('SELECT *, objet.id AS id_objet, proprietaire.id AS id_proprietaire, objet.nom AS nom_obj FROM objet '.
                    'INNER JOIN proprietaire ON proprietaire.id_objet = objet.id '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user')->fetchAllAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findAllAndIdUser(int $id):array {
            return $this->setSql('SELECT *, objet.id AS id_objet, proprietaire.id AS id_proprietaire, objet.nom AS nom_obj FROM objet '.
            'INNER JOIN proprietaire ON proprietaire.id_objet = objet.id '.
            'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
            'WHERE objet.id=:id')
                ->setParamInt(":id", $id)
                ->fetchAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserIdPage(int $id_type, int $id, int $nmPage=0, int $nbArtPage=0):array {
            $limit = "";
            if(!empty($nbArtPage)) {
                $nmStart = $nmPage*$nbArtPage;
                $limit = " LIMIT $nbArtPage OFFSET $nmStart";
            }
            $sql = 'SELECT *, objet.id AS id_objet, proprietaire.id AS id_proprietaire, objet.nom AS nom_obj FROM objet '.
            'INNER JOIN proprietaire ON proprietaire.id_objet = objet.id '.
            'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
            'WHERE objet.id_objet_type=:id_type && utilisateurs.id_user=:id_user ORDER BY objet.id DESC'.$limit.'';
            return $this->setSql($sql)
                        ->setParamInt(":id_user", $id)
                        ->setParamInt(":id_type", $id_type)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserIdCount(int $id_type, int $id):int {
            $sql = 'SELECT *, objet.id AS id_objet, proprietaire.id AS id_proprietaire, objet.nom AS nom_obj FROM objet '.
                    'INNER JOIN proprietaire ON proprietaire.id_objet = objet.id '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
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
            $sql = 'SELECT *, objet.id AS id_objet, proprietaire.id AS id_proprietaire, objet.nom AS nom_obj FROM objet '.
                    'INNER JOIN proprietaire ON proprietaire.id_objet = objet.id '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'WHERE objet.id_objet_type=:id_type ORDER BY objet.id DESC'.$limit.'';
            return $this->setSql($sql)
                        ->setParamInt(":id_type", $id_type)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserCount(int $id_type):int {
            $sql = 'SELECT *, objet.id AS id_objet, proprietaire.id AS id_proprietaire, objet.nom AS nom_obj FROM objet '.
                    'INNER JOIN proprietaire ON proprietaire.id_objet = objet.id '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'WHERE objet.id_objet_type=:id_type ORDER BY objet.id DESC';
            return $this->setSql($sql)
                        ->setParamInt(":id_type", $id_type)
                        ->rowCount();
        }

        public function findAllIdAndLieux(int $id):array {
            $sql = 'SELECT *, objet.id AS id_objet, proprietaire_lieu.id AS id_proprietaire_lieu, objet.nom AS nom_lieu FROM objet '.
                    'INNER JOIN lieux ON lieux.id_objet = objet.id '.
                    'INNER JOIN proprietaire_lieu ON proprietaire_lieu.id_lieu = lieux.id_lieu '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'WHERE proprietaire_lieu.id_proprietaire=:id && objet.validation=1 ORDER BY proprietaire_lieu.id DESC';
            return $this->setSql($sql)
                        ->setParamInt(":id", $id)
                        ->fetchAllAssoc();
        }

        public function findIdTypePropriet():int {
            return $this->findIdTypeObj("propriétaire");
        }

        public function addModLieu(int $id, int $id_proprietaire, int $id_lieu): int {
            $id_main = $id;
            $this->beginTransaction();
            if(!empty($id)) {
                $sql = "UPDATE proprietaire_lieu SET id_lieu=:id_lieu WHERE id=:id";
                $this->setSql($sql)
                            ->setParamInt(":id", $id)
                            ->setParamInt(":id_lieu", $id_lieu);
                $this->executeSql();
            } else {
                $sql = "INSERT INTO proprietaire_lieu (id_proprietaire, id_lieu) VALUES (:id_proprietaire, :id_lieu)";
                $this->setSql($sql)
                            ->setParamInt(":id_proprietaire", $id_proprietaire)
                            ->setParamInt(":id_lieu", $id_lieu);
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

        public function deleteLieuPropriet(int $id): self {
            $sql = "DELETE FROM proprietaire_lieu WHERE id=:id";
            $this->setSql($sql)->setParamInt(":id", $id);
            $this->executeSql();
            return $this;
        }
        
        public function add(int $id_objet): int {
            $this->beginTransaction();
            $sql = "INSERT INTO proprietaire (id_objet) VALUES (:id_objet)";
            $this->setSql($sql)->setParamInt(":id_objet", $id_objet);
            $this->executeSql();
            $id_main = $this->lastInsertId();
            // en cas d'erreur
            if(Error_Log::isError()) {
                $id_main = 0;
                $this->rollBack();
            } else {
                $this->commit();
            }
            return $id_main;
        }

        public function recupIdPropriet(int $id_objet): int {
            $sql = 'SELECT id FROM proprietaire WHERE id_objet=:id';
            $recupId = $this->setSql($sql)
                        ->setParamInt(":id", $id_objet)
                        ->fetchAssoc();
            if(empty($recupId)) {
                return 0;
            }
            return intval($recupId['id']);
        }

        public function recupIdProprietLieu(int $id_objet): int {
            $sql = 'SELECT proprietaire_lieu.id AS id_prop_lieu FROM proprietaire INNER JOIN proprietaire_lieu ON proprietaire_lieu.id_proprietaire = proprietaire.id WHERE proprietaire.id_objet=:id';
            $recupId = $this->setSql($sql)
                        ->setParamInt(":id", $id_objet)
                        ->fetchAssoc();
            if(empty($recupId)) {
                return 0;
            }
            return intval($recupId['id_prop_lieu']);
        }
        
        public function addModPro(int $id_propri, int $id_objet, string $logo = null): int {
            $id_main = $id_propri;
            if(!empty($logo)) {
                $id_main = $this->addModAndImg($id_propri, $id_objet, $logo);
            } else {
                $id_main = $this->addModAndNoImg($id_propri, $id_objet);
            }
            return $id_main;
        }

        private function addModAndImg(int $id_propri, int $id_objet, string $logo):  int {
            $id_main = $id_propri;
            $this->beginTransaction();
            if(!empty($id_main)) {
                $sql = "UPDATE proprietaire SET logo=:logo WHERE id=:id";
                $this->setSql($sql)
                            ->setParamInt(":id", $id_propri)
                            ->setParam(":logo", $logo);
                $this->executeSql();
            } else {
                $sql = "INSERT INTO proprietaire (id_objet, logo) VALUES (:id_objet, :logo)";
                $this->setSql($sql)
                            ->setParam(":logo", $logo)
                            ->setParamInt(":id_objet", $id_objet);
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

        public function addModAndNoImg(int $id_propri, int $id_objet): int {
            $id_main = $id_propri;
            $this->beginTransaction();
            if(empty($id_main)) {
                $sql = "INSERT INTO proprietaire (id_objet) VALUES (:id_objet)";
                $this->setSql($sql)
                            ->setParamInt(":id_objet", $id_objet);
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

        public function findImgLogoId(int $id):string {
            $resulImg = $this->setSql('SELECT logo FROM proprietaire WHERE id=:id')->setParamInt(":id", $id)->fetchAssoc();
            if(!empty($resulImg)) {
                return $resulImg["logo"];
            }
            return "";
        }
    }
}

