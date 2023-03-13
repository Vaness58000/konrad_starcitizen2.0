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
                    '')->fetchAllAssoc();
        }
        public function findAllNoId(int $id):array {
            return $this->setSql('SELECT *, objet.id AS id_objet, objet.nom AS nom_obj FROM objet '.
                    'INNER JOIN especes ON especes.id_objet = objet.id '.
                    'LEFT JOIN lieu_espece ON especes.id_espece = lieu_espece.id_espece '.
                    'WHERE objet.id!=:id LIMIT 3')->setParamInt(":id", $id)->fetchAllAssoc();
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
        public function findAllAndEspeceIdPage(int $nmPage=0, int $nbArtPage=0):array {
            $limit = "";
            if(!empty($nbArtPage)) {
                $nmStart = $nmPage*$nbArtPage;
                $limit = " LIMIT $nbArtPage OFFSET $nmStart";
            }
            $sql = 'SELECT *, objet.id AS id_objet, objet.nom AS nom_obj FROM objet '.
            'INNER JOIN especes ON especes.id_objet = objet.id '.
            'LEFT JOIN lieu_espece ON especes.id_espece = lieu_espece.id_espece '.
            'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user 
            ORDER BY objet.id DESC'.$limit.'';
            return $this->setSql($sql)
                        ->fetchAllAssoc();
        }public function findAllAndEspeceIdCount():int {
            $sql = 'SELECT *, objet.id AS id_objet, objet.nom AS nom_obj FROM objet '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'INNER JOIN especes ON especes.id_objet = objet.id '.
                    'LEFT JOIN lieu_espece ON especes.id_espece = lieu_espece.id_espece ORDER BY objet.id DESC';
            return $this->setSql($sql)
                        ->rowCount();
        }

        public function findAllAndIdUser(int $id):array {
            return $this->setSql('SELECT *, especes.id_espece AS idEspece, objet.id AS id_objet, objet.nom AS nom_obj FROM objet '.
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

        public function recupIdEspece(int $id_objet): int {
            $sql = 'SELECT id_espece FROM especes WHERE id_objet=:id';
            $recupId = $this->setSql($sql)
                        ->setParamInt(":id", $id_objet)
                        ->fetchAssoc();
            if(empty($recupId)) {
                return 0;
            }
            return intval($recupId['id_espece']);
        }
        
        public function add(int $id_espece, int $id_objet, int $id_categ_espece, ?string $gouvernence, ?string $souverainete, ?string $philosophie, ?string $religion, ?string $pre_contact, ?string $origine): int {
            $id_main = $id_espece;
            $this->beginTransaction();
            if(!empty($id_main)) {
                $sql = "UPDATE especes SET id_categ_espece=:id_categ_espece,gouvernence=:gouvernence,souverainete=:souverainete,philosophie=:philosophie,religion=:religion,pre_contact=:pre_contact,origine=:origine WHERE id_espece=:id";
                $this->setSql($sql)
                            ->setParamInt(":id", $id_espece)
                            ->setParamInt(":id_categ_espece", $id_categ_espece)
                            ->setParam(":gouvernence", $gouvernence)
                            ->setParam(":souverainete", $souverainete)
                            ->setParam(":philosophie", $philosophie)
                            ->setParam(":religion", $religion)
                            ->setParam(":pre_contact", $pre_contact)
                            ->setParam(":origine", $origine);
                $this->executeSql();
            } else {
                $sql = "INSERT INTO especes (id_objet, id_categ_espece, gouvernence, souverainete, philosophie, religion, pre_contact, origine) VALUES (:id_objet, :id_categ_espece, :gouvernence, :souverainete, :philosophie, :religion, :pre_contact, :origine)";
                $this->setSql($sql)
                            ->setParamInt(":id_objet", $id_objet)
                            ->setParamInt(":id_categ_espece", $id_categ_espece)
                            ->setParam(":gouvernence", $gouvernence)
                            ->setParam(":souverainete", $souverainete)
                            ->setParam(":philosophie", $philosophie)
                            ->setParam(":religion", $religion)
                            ->setParam(":pre_contact", $pre_contact)
                            ->setParam(":origine", $origine);
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

        public function addModControle(int $id, int $id_espece, int $id_lieu): int {
            $id_main = $id;
            $this->beginTransaction();
            if(!empty($id)) {
                $sql = "UPDATE controle_lieu SET id_lieu=:id_lieu WHERE id=:id";
                $this->setSql($sql)
                            ->setParamInt(":id", $id)
                            ->setParamInt(":id_lieu", $id_lieu);
                $this->executeSql();
            } else {
                $sql = "INSERT INTO controle_lieu (id_espece, id_lieu) VALUES (:id_espece, :id_lieu)";
                $this->setSql($sql)
                            ->setParamInt(":id_espece", $id_espece)
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

        public function deleteLieuControle(int $id): self {
            $sql = "DELETE FROM controle_lieu WHERE id=:id";
            $this->setSql($sql)->setParamInt(":id", $id);
            $this->executeSql();
            return $this;
        }
        
        public function recupIdLieuEspece(int $id_espece): int {
            $sql = 'SELECT id FROM lieu_espece WHERE id_espece=:id';
            $recupId = $this->setSql($sql)
                        ->setParamInt(":id", $id_espece)
                        ->fetchAssoc();
            if(empty($recupId)) {
                return 0;
            }
            return intval($recupId['id']);
        }

        public function addModLieu(int $id, int $id_espece, int $id_lieu): int {
            $id_main = $id;
            if(!empty($id)) {
                $this->beginTransaction();
                $sql = "UPDATE lieu_espece SET id_lieu=:id_lieu WHERE id=:id";
                $this->setSql($sql)
                    ->setParamInt(":id", $id)
                    ->setParamInt(":id_lieu", $id_lieu);
                $this->executeSql();
            }else {
                $this->beginTransaction();
                $sql = "INSERT INTO lieu_espece (id_espece, id_lieu) VALUES (:id_espece, :id_lieu)";
                $this->setSql($sql)
                    ->setParamInt(":id_espece", $id_espece)
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

        public function addModDiplom(int $id, ?string $type, ?string $traite): int {
            $id_main = $id;
            $this->beginTransaction();
            if(!empty($id)) {
                $sql = "UPDATE diplomatie SET type=:type,traite=:traite WHERE id=:id";
                $this->setSql($sql)
                            ->setParamInt(":id", $id)
                            ->setParam(":type", $type)
                            ->setParam(":traite", $traite);
                $this->executeSql();
            } else {
                $sql = "INSERT INTO diplomatie (type, traite) VALUES (:type, :traite)";
                $this->setSql($sql)
                            ->setParam(":type", $type)
                            ->setParam(":traite", $traite);
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

        public function addDiplomEspec(int $id, int $id_espece, int $id_diplomatie) {
            $id_main = $id;
            if(empty($id)) {
                $this->beginTransaction();
                $sql = "INSERT INTO diplomatie_espece (id_diplomatie, id_espece) VALUES (:id_diplomatie, :id_espece)";
                $this->setSql($sql)
                    ->setParam(":id_espece", $id_espece)
                    ->setParam(":id_diplomatie", $id_diplomatie);
                $this->executeSql();
                $id_main = $this->lastInsertId();
                // en cas d'erreur
                if(Error_Log::isError()) {
                    $id_main = 0;
                    $this->rollBack();
                } else {
                    $this->commit();
                }
            }
            return $id_main;
        }
        
        public function recupEspecIdDiplom(int $id_diplomatie_esp): int {
            $sql = 'SELECT id_diplomatie FROM diplomatie_espece WHERE id=:id';
            $recupId = $this->setSql($sql)
                        ->setParamInt(":id", $id_diplomatie_esp)
                        ->fetchAssoc();
            if(empty($recupId)) {
                return 0;
            }
            return intval($recupId['id_diplomatie']);
        }
        
        public function recupObjEspecIdDiplom(int $id_obj): int {
            $sql = 'SELECT id_espece FROM especes WHERE id_objet=:id';
            $recupId = $this->setSql($sql)
                        ->setParamInt(":id", $id_obj)
                        ->fetchAssoc();
            if(empty($recupId)) {
                return 0;
            }
            return intval($recupId['id_espece']);
        }

        public function deleteDiplomEspece(int $id): self {
            $sql = "DELETE FROM diplomatie WHERE id=:id";
            $this->setSql($sql)->setParamInt(":id", $id);
            $this->executeSql();
            return $this;
        }

        
    }
}

