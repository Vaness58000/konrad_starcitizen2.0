<?php

// verifier qu'on n'a pas deja creer la fonction
if (!class_exists('MatierePremiereRepository')) {
    // inculre la classe qui va creer le fichier "errors.log" en cas d'erreur.
    include_once dirname(__FILE__) . '/ObjetRepository.php';

    // fonction pour faire la connexion a la base de donnes
    class MatierePremiereRepository extends ObjetRepository {

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
            return $this->setSql('SELECT *, prod_pre_lieu.id AS id_prod_pre_lieu, lieux.id_lieu AS id_lieu_princ, objet.id AS id_objet, objet.nom AS nom_obj, categories_lieux.nom AS nom_cat FROM objet '.
                    'INNER JOIN matiere_premiere ON matiere_premiere.id_objet = objet.id '.
                    'INNER JOIN prod_pre_lieu ON matiere_premiere.id = prod_pre_lieu.id_prod_pre '.
                    'LEFT JOIN lieux_risque ON lieux.id_lieu = lieux_risque.id_lieux '.
                    'LEFT JOIN lier_lieu ON lieux.id_lieu = lier_lieu.id_lieu '.
                    'INNER JOIN categories_lieux ON categories_lieux.id_categ_lieu = lieux.id_categ_lieu')->fetchAllAssoc();
        }

        public function findListRisq() {
            return $this->setSql('SELECT * FROM risque')->fetchAllAssoc();
        }

        public function findListCat() {
            return $this->setSql('SELECT * FROM categorie_matiere_premier')->fetchAllAssoc();
        }
        public function findAllCatIdLieuId(int $id, int $id_cat):array {
            return $this->setSql('SELECT *, prod_pre_lieu.id AS id_prod_pre_lieu, objet.id AS id_objet, objet.nom AS nom_obj FROM objet '.
                    'INNER JOIN matiere_premiere ON matiere_premiere.id_objet = objet.id '.
                    'INNER JOIN prod_pre_lieu ON matiere_premiere.id = prod_pre_lieu.id_prod_pre '.
                    'WHERE categories_lieux.id_categ_lieu=:id_cat AND objet.id=:id')->setParamInt(":id_cat", $id_cat)->setParamInt(":id", $id)->fetchAllAssoc();
        }
        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findAllCatId(int $id_cat):array {
            return $this->setSql('SELECT * FROM categorie_matiere_premier '.
                    'WHERE categorie_matiere_premier.id=:id_cat')->setParamInt(":id_cat", $id_cat)->fetchAllAssoc();
        }
        
        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findAllAndIdUser(int $id):array {
            return $this->setSql('SELECT *, prod_pre_lieu.id AS id_prod_pre_lieu, objet.id AS id_objet, objet.nom AS nom_obj, matiere_premiere.id AS id_mat_prem FROM objet '.
                'INNER JOIN matiere_premiere ON matiere_premiere.id_objet = objet.id '.
                'INNER JOIN prod_pre_lieu ON matiere_premiere.id = prod_pre_lieu.id_prod_pre '.
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
            $sql = 'SELECT *, prod_pre_lieu.id AS id_prod_pre_lieu, objet.id AS id_objet, objet.nom AS nom_obj, matiere_premiere.id AS id_mat_prem FROM objet '.
                    'INNER JOIN matiere_premiere ON matiere_premiere.id_objet = objet.id '.
                    'INNER JOIN prod_pre_lieu ON matiere_premiere.id = prod_pre_lieu.id_prod_pre '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'WHERE objet.id_objet_type=:id_type && utilisateurs.id_user=:id_user ORDER BY objet.id DESC'.$limit.'';
            return $this->setSql($sql)
                        ->setParamInt(":id_user", $id)
                        ->setParamInt(":id_type", $id_type)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserIdCount(int $id_type, int $id):int {
            $sql = 'SELECT *, prod_pre_lieu.id AS id_prod_pre_lieu, objet.id AS id_objet, objet.nom AS nom_obj, matiere_premiere.id AS id_mat_prem FROM objet '.
                    'INNER JOIN matiere_premiere ON matiere_premiere.id_objet = objet.id '.
                    'INNER JOIN prod_pre_lieu ON matiere_premiere.id = prod_pre_lieu.id_prod_pre '.
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
            $sql = 'SELECT *, prod_pre_lieu.id AS id_prod_pre_lieu, objet.id AS id_objet, objet.nom AS nom_obj, matiere_premiere.id AS id_mat_prem FROM objet '.
                    'INNER JOIN matiere_premiere ON matiere_premiere.id_objet = objet.id '.
                    'INNER JOIN prod_pre_lieu ON matiere_premiere.id = prod_pre_lieu.id_prod_pre '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'WHERE objet.id_objet_type=:id_type ORDER BY objet.id DESC'.$limit.'';
            return $this->setSql($sql)
                        ->setParamInt(":id_type", $id_type)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserCount(int $id_type):int {
            $sql = 'SELECT *, prod_pre_lieu.id AS id_prod_pre_lieu, objet.id AS id_objet, objet.nom AS nom_obj, matiere_premiere.id AS id_mat_prem FROM objet '.
                    'INNER JOIN matiere_premiere ON matiere_premiere.id_objet = objet.id '.
                    'INNER JOIN prod_pre_lieu ON matiere_premiere.id = prod_pre_lieu.id_prod_pre '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'WHERE objet.id_objet_type=:id_type ORDER BY objet.id DESC';
            return $this->setSql($sql)
                        ->setParamInt(":id_type", $id_type)
                        ->rowCount();
        }

        public function findAllIdAndLieux(int $id):array {
            $sql = 'SELECT *, prod_pre_lieu.id AS id_lieu_prod, objet.id AS id_obj, objet.nom AS nom_lieu FROM objet '.
                    'INNER JOIN lieux ON lieux.id_objet = objet.id '.
                    'INNER JOIN prod_pre_lieu ON lieux.id_lieu = prod_pre_lieu.id_lieu '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'WHERE prod_pre_lieu.id_prod_pre=:id && objet.validation=1 ORDER BY prod_pre_lieu.id DESC';
            return $this->setSql($sql)
                        ->setParamInt(":id", $id)
                        ->fetchAllAssoc();
        }
        
        public function findAllAndLieuxId(int $id):array {
            $sql = 'SELECT *, prod_pre_lieu.id AS id_lieu_prod FROM lieux '.
                    'INNER JOIN prod_pre_lieu ON lieux.id_lieu = prod_pre_lieu.id_lieu '.
                    'WHERE prod_pre_lieu.id=:id';
            return $this->setSql($sql)
                        ->setParamInt(":id", $id)
                        ->fetchAssoc();
        }

        public function findIdTypeMatierePremiere():int {
            return $this->findIdTypeObj("Matière première");
        }

        public function recupIdMatPrem(int $id_objet): int {
            $sql = 'SELECT id FROM matiere_premiere WHERE id_objet=:id';
            $recupId = $this->setSql($sql)
                        ->setParamInt(":id", $id_objet)
                        ->fetchAssoc();
            if(empty($recupId)) {
                return 0;
            }
            return intval($recupId['id']);
        }

        public function recupIdMatPremLieu(int $id_objet): int {
            $sql = 'SELECT id FROM matiere_premiere INNER JOIN  WHERE id_objet=:id';
            $recupId = $this->setSql($sql)
                        ->setParamInt(":id", $id_objet)
                        ->fetchAssoc();
            if(empty($recupId)) {
                return 0;
            }
            return intval($recupId['id']);
        }
        
        public function add(int $id_matPrem, int $id_objet, int $id_cat): int {
            $id_main = $id_matPrem;
            $this->beginTransaction();
            if(!empty($id_matPrem)) {
                $sql = "UPDATE matiere_premiere SET id_categorie=:id_categorie WHERE id=:id";
                $this->setSql($sql)->setParamInt(":id", $id_matPrem)->setParamInt(":id_categorie", $id_cat);
                $this->executeSql();
            } else {
                $sql = "INSERT INTO matiere_premiere (id_categorie, id_objet) VALUES (:id_categorie, :id_objet)";
                $this->setSql($sql)->setParamInt(":id_objet", $id_objet)->setParamInt(":id_categorie", $id_cat);
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

        public function addModLieu(int $id, int $id_prod_pre, int $id_lieu, ?string $prix_vente, ?string $prix_achat, ?string $actu_min, ?string $inv_max): int {
            $id_main = $id;
            $this->beginTransaction();
            if(!empty($id)) {
                $sql = "UPDATE prod_pre_lieu SET id_lieu=:id_lieu,prix_vente=:prix_vente,prix_achat=:prix_achat,actu_min=:actu_min,inv_max=:inv_max WHERE id=:id";
                $this->setSql($sql)
                            ->setParamInt(":id", $id)
                            ->setParamInt(":id_lieu", $id_lieu)
                            ->setParam(":prix_vente", $prix_vente)
                            ->setParam(":prix_achat", $prix_achat)
                            ->setParam(":actu_min", $actu_min)
                            ->setParam(":inv_max", $inv_max);
                $this->executeSql();
            } else {
                $sql = "INSERT INTO prod_pre_lieu(id_prod_pre, id_lieu, prix_vente, prix_achat, actu_min, inv_max) VALUES (:id_prod_pre, :id_lieu, :prix_vente, :prix_achat, :actu_min, :inv_max)";
                $this->setSql($sql)
                            ->setParamInt(":id_prod_pre", $id_prod_pre)
                            ->setParamInt(":id_lieu", $id_lieu)
                            ->setParam(":prix_vente", $prix_vente)
                            ->setParam(":prix_achat", $prix_achat)
                            ->setParam(":actu_min", $actu_min)
                            ->setParam(":inv_max", $inv_max);
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

        public function deleteLieuMatPrem(int $id): self {
            $sql = "DELETE FROM prod_pre_lieu WHERE id=:id";
            $this->setSql($sql)->setParamInt(":id", $id);
            $this->executeSql();
            return $this;
        }

    }
}

