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
            return $this->setSql('SELECT *, lieux.id_lieu AS id_lieu_princ, objet.id AS id_objet, objet.nom AS nom_obj, categories_lieux.nom AS nom_cat FROM objet '.
                    'INNER JOIN matiere_premiere ON matiere_premiere.id_objet = objet.id '.
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
            return $this->setSql('SELECT *, objet.id AS id_objet, objet.nom AS nom_obj FROM objet '.
                    'INNER JOIN matiere_premiere ON matiere_premiere.id_objet = objet.id '.
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
            return $this->setSql('SELECT *, objet.id AS id_objet, objet.nom AS nom_obj, matiere_premiere.id AS id_mat_prem FROM objet '.
                'INNER JOIN matiere_premiere ON matiere_premiere.id_objet = objet.id '.
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
            $sql = 'SELECT *, objet.id AS id_objet, objet.nom AS nom_obj, matiere_premiere.id AS id_mat_prem FROM objet '.
                    'INNER JOIN matiere_premiere ON matiere_premiere.id_objet = objet.id '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'WHERE objet.id_objet_type=:id_type && utilisateurs.id_user=:id_user ORDER BY objet.id DESC'.$limit.'';
            return $this->setSql($sql)
                        ->setParamInt(":id_user", $id)
                        ->setParamInt(":id_type", $id_type)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserIdCount(int $id_type, int $id):int {
            $sql = 'SELECT *, objet.id AS id_objet, objet.nom AS nom_obj, matiere_premiere.id AS id_mat_prem FROM objet '.
                    'INNER JOIN matiere_premiere ON matiere_premiere.id_objet = objet.id '.
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
            $sql = 'SELECT *, objet.id AS id_objet, objet.nom AS nom_obj, matiere_premiere.id AS id_mat_prem FROM objet '.
                    'INNER JOIN matiere_premiere ON matiere_premiere.id_objet = objet.id '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'WHERE objet.id_objet_type=:id_type ORDER BY objet.id DESC'.$limit.'';
            return $this->setSql($sql)
                        ->setParamInt(":id_type", $id_type)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserCount(int $id_type):int {
            $sql = 'SELECT *, objet.id AS id_objet, objet.nom AS nom_obj, matiere_premiere.id AS id_mat_prem FROM objet '.
                    'INNER JOIN matiere_premiere ON matiere_premiere.id_objet = objet.id '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'WHERE objet.id_objet_type=:id_type ORDER BY objet.id DESC';
            return $this->setSql($sql)
                        ->setParamInt(":id_type", $id_type)
                        ->rowCount();
        }

        public function findAllIdAndLieux(int $id):array {
            $sql = 'SELECT *, objet.id AS id_lieu, objet.nom AS nom_lieu FROM objet '.
                    'INNER JOIN lieux ON lieux.id_objet = objet.id '.
                    'INNER JOIN prod_pre_lieu ON lieux.id_lieu = prod_pre_lieu.id_lieu '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'WHERE prod_pre_lieu.id_prod_pre=:id && objet.validation=1 ORDER BY prod_pre_lieu.id DESC';
            return $this->setSql($sql)
                        ->setParamInt(":id", $id)
                        ->fetchAllAssoc();
        }

        public function findIdTypeMatierePremiere():int {
            return $this->findIdTypeObj("Matière première");
        }

    }
}

