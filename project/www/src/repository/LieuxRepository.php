<?php

// verifier qu'on n'a pas deja creer la fonction
if (!class_exists('LieuxRepository')) {
    // inculre la classe qui va creer le fichier "errors.log" en cas d'erreur.
    include_once dirname(__FILE__) . '/ObjetRepository.php';

    // fonction pour faire la connexion a la base de donnes
    class LieuxRepository extends ObjetRepository
    {

        /**
         * Constructeur par defaut
         */
        public function __construct(bool $isDatabase = true, ?string $file_config = null)
        {
            parent::__construct($isDatabase, $file_config);
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findAll(): array
        {
            return $this->setSql('SELECT *, lieux.id_lieu AS id_lieu_princ, objet.id AS id_objet, objet.nom AS nom_obj, categories_lieux.nom AS nom_cat FROM objet ' .
                'INNER JOIN lieux ON lieux.id_objet = objet.id ' .
                'LEFT JOIN lieux_risque ON lieux.id_lieu = lieux_risque.id_lieux ' .
                'LEFT JOIN lier_lieu ON lieux.id_lieu = lier_lieu.id_lieu ' .
                'INNER JOIN categories_lieux ON categories_lieux.id_categ_lieu = lieux.id_categ_lieu')->fetchAllAssoc();
        }

        public function findListRisq()
        {
            return $this->setSql('SELECT * FROM risque')->fetchAllAssoc();
        }

        public function findListCat()
        {
            return $this->setSql('SELECT * FROM categories_lieux')->fetchAllAssoc();
        }
        public function findAllCatIdLieuId(int $id, int $id_cat): array
        {
            return $this->setSql('SELECT *, objet.id AS id_objet, objet.nom AS nom_lieu, categories_lieux.nom AS nom_cat FROM objet ' .
                'INNER JOIN lieux ON lieux.id_objet = objet.id ' .
                'INNER JOIN categories_lieux ON categories_lieux.id_categ_lieu = lieux.id_categ_lieu ' .
                'WHERE categories_lieux.id_categ_lieu=:id_cat AND objet.id=:id')->setParamInt(":id_cat", $id_cat)->setParamInt(":id", $id)->fetchAllAssoc();
        }
     
        public function findAllCatIdNoId(int $id, int $id_cat): array
        {
            return $this->setSql('SELECT *, lieux.id_lieu AS id_lieu_princ, objet.id AS id_objet, objet.nom AS nom_obj, categories_lieux.nom AS nom_cat FROM objet ' .
                'INNER JOIN lieux ON lieux.id_objet = objet.id ' .
                'LEFT JOIN lieux_risque ON lieux.id_lieu = lieux_risque.id_lieux ' .
                'LEFT JOIN lier_lieu ON lieux.id_lieu = lier_lieu.id_lieu ' .
                'INNER JOIN categories_lieux ON categories_lieux.id_categ_lieu = lieux.id_categ_lieu ' .
                'WHERE categories_lieux.id_categ_lieu=:id_cat AND objet.id!=:id LIMIT 3')->setParamInt(":id", $id)->setParamInt(":id_cat", $id_cat)->fetchAllAssoc();
        }
        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findAllCatId(int $id_cat): array
        {
            return $this->setSql('SELECT *, lieux.id_lieu AS id_lieu_princ, objet.id AS id_objet, objet.nom AS nom_obj, categories_lieux.nom AS nom_cat FROM objet ' .
                'INNER JOIN lieux ON lieux.id_objet = objet.id ' .
                'LEFT JOIN lieux_risque ON lieux.id_lieu = lieux_risque.id_lieux ' .
                'LEFT JOIN lier_lieu ON lieux.id_lieu = lier_lieu.id_lieu ' .
                'INNER JOIN categories_lieux ON categories_lieux.id_categ_lieu = lieux.id_categ_lieu ' .
                'WHERE categories_lieux.id_categ_lieu=:id_cat')->setParamInt(":id_cat", $id_cat)->fetchAllAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findAllAndIdUser(int $id): array
        {
            return $this->setSql('SELECT *, lieux.id_lieu AS id_lieu_princ, objet.id AS id_objet, objet.nom AS nom_obj, categories_lieux.nom AS nom_cat FROM objet ' .
                'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user ' .
                'INNER JOIN lieux ON lieux.id_objet = objet.id ' .
                'LEFT JOIN lieux_risque ON lieux.id_lieu = lieux_risque.id_lieux ' .
                'LEFT JOIN lier_lieu ON lieux.id_lieu = lier_lieu.id_lieu ' .
                'INNER JOIN categories_lieux ON categories_lieux.id_categ_lieu = lieux.id_categ_lieu ' .
                'WHERE objet.id=:id')
                ->setParamInt(":id", $id)
                ->fetchAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserIdPage(int $id_type, int $id, int $nmPage = 0, int $nbArtPage = 0): array
        {
            $limit = "";
            if (!empty($nbArtPage)) {
                $nmStart = $nmPage * $nbArtPage;
                $limit = " LIMIT $nbArtPage OFFSET $nmStart";
            }
            $sql = 'SELECT *, lieux.id_lieu AS id_lieu_princ, objet.id AS id_objet, objet.nom AS nom_obj, categories_lieux.nom AS nom_cat FROM objet ' .
                'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user ' .
                'INNER JOIN lieux ON lieux.id_objet = objet.id ' .
                'LEFT JOIN lieux_risque ON lieux.id_lieu = lieux_risque.id_lieux ' .
                'LEFT JOIN lier_lieu ON lieux.id_lieu = lier_lieu.id_lieu ' .
                'INNER JOIN categories_lieux ON categories_lieux.id_categ_lieu = lieux.id_categ_lieu ' .
                'WHERE objet.id_objet_type=:id_type && utilisateurs.id_user=:id_user ORDER BY objet.id DESC' . $limit . '';
            return $this->setSql($sql)
                ->setParamInt(":id_user", $id)
                ->setParamInt(":id_type", $id_type)
                ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserIdCount(int $id_type, int $id): int
        {
            $sql = 'SELECT *, lieux.id_lieu AS id_lieu_princ, objet.id AS id_objet, objet.nom AS nom_obj, categories_lieux.nom AS nom_cat FROM objet ' .
                'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user ' .
                'INNER JOIN lieux ON lieux.id_objet = objet.id ' .
                'LEFT JOIN lieux_risque ON lieux.id_lieu = lieux_risque.id_lieux ' .
                'LEFT JOIN lier_lieu ON lieux.id_lieu = lier_lieu.id_lieu ' .
                'INNER JOIN categories_lieux ON categories_lieux.id_categ_lieu = lieux.id_categ_lieu ' .
                'WHERE objet.id_objet_type=:id_type && utilisateurs.id_user=:id_user ORDER BY objet.id DESC';
            return $this->setSql($sql)
                ->setParamInt(":id_user", $id)
                ->setParamInt(":id_type", $id_type)
                ->rowCount();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserPage(int $id_type, int $nmPage = 0, int $nbArtPage = 0): array
        {
            $limit = "";
            if (!empty($nbArtPage)) {
                $nmStart = $nmPage * $nbArtPage;
                $limit = " LIMIT $nbArtPage OFFSET $nmStart";
            }
            $sql = 'SELECT *, lieux.id_lieu AS id_lieu_princ, objet.id AS id_objet, objet.nom AS nom_obj, categories_lieux.nom AS nom_cat FROM objet ' .
                'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user ' .
                'INNER JOIN lieux ON lieux.id_objet = objet.id ' .
                'LEFT JOIN lieux_risque ON lieux.id_lieu = lieux_risque.id_lieux ' .
                'LEFT JOIN lier_lieu ON lieux.id_lieu = lier_lieu.id_lieu ' .
                'INNER JOIN categories_lieux ON categories_lieux.id_categ_lieu = lieux.id_categ_lieu ' .
                'WHERE objet.id_objet_type=:id_type ORDER BY objet.id DESC' . $limit . '';
            return $this->setSql($sql)
                ->setParamInt(":id_type", $id_type)
                ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserCount(int $id_type): int
        {
            $sql = 'SELECT *, lieux.id_lieu AS id_lieu_princ, objet.id AS id_objet, objet.nom AS nom_obj, categories_lieux.nom AS nom_cat FROM objet ' .
                'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user ' .
                'INNER JOIN lieux ON lieux.id_objet = objet.id ' .
                'LEFT JOIN lieux_risque ON lieux.id_lieu = lieux_risque.id_lieux ' .
                'LEFT JOIN lier_lieu ON lieux.id_lieu = lier_lieu.id_lieu ' .
                'INNER JOIN categories_lieux ON categories_lieux.id_categ_lieu = lieux.id_categ_lieu ' .
                'WHERE objet.id_objet_type=:id_type ORDER BY objet.id DESC';
            return $this->setSql($sql)
                ->setParamInt(":id_type", $id_type)
                ->rowCount();
        }
        public function findIdTypeLieu(string $name): int
        {
            $tab_type = $this->setSql('SELECT * FROM categories_lieux WHERE nom=:nom')->setParam(":nom", $name)->fetchAssoc();
            if (!(!empty($tab_type) && array_key_exists("id_categ_lieu", $tab_type) && !empty($tab_type["id_categ_lieu"]))) {
                return 0;
            }
            return intval($tab_type["id_categ_lieu"]);
        }
        public function findIdTypeLieux(): int
        {
            return $this->findIdTypeObj("lieux");
        }
    }
}
