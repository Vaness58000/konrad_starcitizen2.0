<?php

// verifier qu'on n'a pas deja creer la fonction
if (!class_exists('ArticleRepository')) {
    // inculre la classe qui va creer le fichier "errors.log" en cas d'erreur.
    include_once dirname(__FILE__) . '/../class/classMain/Repository.php';

    // fonction pour faire la connexion a la base de donnes
    class ArticleRepository extends Repository {

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
            return $this->setSql('SELECT *, articles.id AS id_article FROM articles')
                        ->fetchAllAssoc();
        }

        public function findAllUserId(int $id):array {
            return $this->setSql('SELECT *, articles.id AS id_article FROM articles WHERE id_user=:id_user')->setParamInt(":id_user", $id)
                        ->fetchAllAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findAllAndUser():array {
            return $this->setSql('SELECT *, articles.id AS id_article FROM articles '.
                'INNER JOIN utilisateurs ON utilisateurs.id_user = articles.id_user')
                ->fetchAllAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findAllImgArticle(int $id):array {
            return $this->setSql('SELECT * FROM articles_image '.
                        'WHERE id_article=:id_article')
                        ->setParamInt(":id_article", $id)
                        ->fetchAllAssoc();
        }

        public function findAllAndIdUser(int $id):array {
            return $this->setSql('SELECT *, articles.id AS id_article FROM articles '.
                        'INNER JOIN utilisateurs ON utilisateurs.id_user = articles.id_user '.
                        'WHERE articles.id=:id_article')
                        ->setParamInt(":id_article", $id)
                        ->fetchAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndIdTypeUser(int $id, int $type):array {
            return $this->setSql('SELECT *, articles.id AS id_article FROM articles '.
                        'INNER JOIN utilisateurs ON utilisateurs.id_user = articles.id_user '.
                        'WHERE articles.id=:id_article AND articles.id_categorie_article=:id_categorie_article')
                        ->setParamInt(":id_article", $id)
                        ->setParamInt(":id_categorie_article", $type)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndTypeUserId(int $id, int $type):array {
            $sql = 'SELECT *, articles.id AS id_article FROM articles '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = articles.id_user '.
                    'WHERE articles.id=:id AND articles.id_categorie_article=:id_categorie_article';
            return $this->setSql($sql)
                        ->setParamInt(":id", $id)
                        ->setParamInt(":id_categorie_article", $type)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserIdPage(int $id, int $nmPage=0, int $nbArtPage=0):array {
            $limit = "";
            if(!empty($nbArtPage)) {
                $nmStart = $nmPage*$nbArtPage;
                $limit = " LIMIT $nbArtPage OFFSET $nmStart";
            }
            $sql = 'SELECT *, articles.id AS id_article FROM articles '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = articles.id_user '.
                    'WHERE utilisateurs.id_user=:id_user'.$limit;
            return $this->setSql($sql)
                        ->setParamInt(":id_user", $id)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserPage(int $nmPage=0, int $nbArtPage=0):array {
            $limit = "";
            if(!empty($nbArtPage)) {
                $nmStart = $nmPage*$nbArtPage;
                $limit = " LIMIT $nbArtPage OFFSET $nmStart";
            }
            $sql = 'SELECT *, articles.id AS id_article FROM articles '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = articles.id_user '.
                    $limit;
            return $this->setSql($sql)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserId(int $id):array {
            $sql = 'SELECT *, articles.id AS id_article FROM articles '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = articles.id_user '.
                    'WHERE utilisateurs.id_user=:id_user';
            return $this->setSql($sql)
                        ->setParamInt(":id_user", $id)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndTypeUserIdPage(int $id, int $type, int $nmPage=0, int $nbArtPage=0):array {
            $limit = "";
            if(!empty($nbArtPage)) {
                $nmStart = $nmPage*$nbArtPage;
                $limit = " LIMIT $nbArtPage OFFSET $nmStart";
            }
            $sql = 'SELECT *, articles.id AS id_article FROM articles '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = articles.id_user '.
                    'WHERE utilisateurs.id_user=:id_user AND articles.id_categorie_article=:id_categorie_article'.$limit;
            return $this->setSql($sql)
                        ->setParamInt(":id_user", $id)
                        ->setParamInt(":id_categorie_article", $type)
                        ->fetchAllAssoc();
        }

        /*pour relier le type */
        public function findAllAndTypeUserPage(int $type, int $nmPage=0, int $nbArtPage=0):array {
            $limit = "";
            if(!empty($nbArtPage)) {
                $nmStart = $nmPage*$nbArtPage;
                $limit = " LIMIT $nbArtPage OFFSET $nmStart";
            }
            $sql = 'SELECT *, articles.id AS id_article FROM articles '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = articles.id_user '.
                    'WHERE articles.id_categorie_article=:id_categorie_article'.$limit;
            return $this->setSql($sql)
                        ->setParamInt(":id_categorie_article", $type)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserIdCount(int $id):int {
            $sql = 'SELECT *, articles.id AS id_article FROM articles '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = articles.id_user '.
                    'WHERE utilisateurs.id_user=:id_user';
            return $this->setSql($sql)
                        ->setParamInt(":id_user", $id)
                        ->rowCount();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserCount():int {
            $sql = 'SELECT *, articles.id AS id_article FROM articles '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = articles.id_user ';
            return $this->setSql($sql)
                        ->rowCount();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndTypeUserIdCount(int $id, int $type):int {
            $sql = 'SELECT *, articles.id AS id_article FROM articles '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = articles.id_user '.
                    'WHERE utilisateurs.id_user=:id_user AND articles.id_categorie_article=:id_categorie_article';
            return $this->setSql($sql)
                        ->setParamInt(":id_user", $id)
                        ->setParamInt(":id_categorie_article", $type)
                        ->rowCount();
        }

        /*pour relier le type */
        public function findAllAndTypeUserCount(int $type):int {
            $sql = 'SELECT *, articles.id AS id_article FROM articles '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = articles.id_user '.
                    'WHERE articles.id_categorie_article=:id_categorie_article';
            return $this->setSql($sql)
                        ->setParamInt(":id_categorie_article", $type)
                        ->rowCount();
        }

        /*pour relier le type */
        public function findAllAndTypeUser(int $type):array {
            return $this->setSql('SELECT *, articles.id AS id_article FROM articles '.
                        'INNER JOIN utilisateurs ON utilisateurs.id_user = articles.id_user '.
                        'WHERE articles.id_categorie_article=:id_categorie_article')
                        ->setParamInt(":id_categorie_article", $type)
                        ->fetchAllAssoc();
        }

        public function findAllAndTypeUserNoId(int $type, int $id_art):array {
            return $this->setSql('SELECT *, articles.id AS id_article FROM articles '.
                        'INNER JOIN utilisateurs ON utilisateurs.id_user = articles.id_user '.
                        'WHERE articles.id_categorie_article=:id_categorie_article AND articles.id!=:id_art')
                        ->setParamInt(":id_art", $id_art)
                        ->setParamInt(":id_categorie_article", $type)
                        ->fetchAllAssoc();
        }

        /*pour relier le type */
        public function findAllCat():array {
            return $this->setSql('SELECT * FROM categories_articles')
                        ->fetchAllAssoc();
        }
    } 
}

