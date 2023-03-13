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
                        'WHERE articles.id=:id_article ORDER BY articles.id DESC')
                        ->setParamInt(":id_article", $id)
                        ->fetchAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndIdTypeUser(int $id, int $type):array {
            return $this->setSql('SELECT *, articles.id AS id_article FROM articles '.
                        'INNER JOIN utilisateurs ON utilisateurs.id_user = articles.id_user '.
                        'WHERE articles.id=:id_article AND articles.id_categorie_article=:id_categorie_article ORDER BY articles.id DESC')
                        ->setParamInt(":id_article", $id)
                        ->setParamInt(":id_categorie_article", $type)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndTypeUserId(int $id, int $type):array {
            $sql = 'SELECT *, articles.id AS id_article FROM articles '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = articles.id_user '.
                    'WHERE articles.id=:id AND articles.id_categorie_article=:id_categorie_article ORDER BY articles.id DESC';
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
                    'WHERE utilisateurs.id_user=:id_user ORDER BY articles.id DESC'.$limit;
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
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = articles.id_user ORDER BY articles.id DESC'.
                    $limit;
            return $this->setSql($sql)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserId(int $id):array {
            $sql = 'SELECT *, articles.id AS id_article FROM articles '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = articles.id_user '.
                    'WHERE utilisateurs.id_user=:id_user ORDER BY articles.id DESC';
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
                    'WHERE utilisateurs.id_user=:id_user AND articles.id_categorie_article=:id_categorie_article ORDER BY articles.id DESC'.$limit;
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
                    'WHERE articles.id_categorie_article=:id_categorie_article ORDER BY articles.id DESC'.$limit;
            return $this->setSql($sql)
                        ->setParamInt(":id_categorie_article", $type)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserIdCount(int $id):int {
            $sql = 'SELECT *, articles.id AS id_article FROM articles '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = articles.id_user '.
                    'WHERE utilisateurs.id_user=:id_user ORDER BY articles.id DESC';
            return $this->setSql($sql)
                        ->setParamInt(":id_user", $id)
                        ->rowCount();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserCount():int {
            $sql = 'SELECT *, articles.id AS id_article FROM articles '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = articles.id_user ORDER BY articles.id DESC';
            return $this->setSql($sql)
                        ->rowCount();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndTypeUserIdCount(int $id, int $type):int {
            $sql = 'SELECT *, articles.id AS id_article FROM articles '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = articles.id_user '.
                    'WHERE utilisateurs.id_user=:id_user AND articles.id_categorie_article=:id_categorie_article ORDER BY articles.id DESC';
            return $this->setSql($sql)
                        ->setParamInt(":id_user", $id)
                        ->setParamInt(":id_categorie_article", $type)
                        ->rowCount();
        }

        /*pour relier le type */
        public function findAllAndTypeUserCount(int $type):int {
            $sql = 'SELECT *, articles.id AS id_article FROM articles '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = articles.id_user '.
                    'WHERE articles.id_categorie_article=:id_categorie_article ORDER BY articles.id DESC';
            return $this->setSql($sql)
                        ->setParamInt(":id_categorie_article", $type)
                        ->rowCount();
        }

        /*pour relier le type */
        public function findAllAndTypeUser(int $type):array {
            return $this->setSql('SELECT *, articles.id AS id_article FROM articles '.
                        'INNER JOIN utilisateurs ON utilisateurs.id_user = articles.id_user '.
                        'WHERE articles.id_categorie_article=:id_categorie_article ORDER BY articles.id DESC')
                        ->setParamInt(":id_categorie_article", $type)
                        ->fetchAllAssoc();
        }

        public function findAllAndTypeUserNoId(int $type, int $id_art):array {
            return $this->setSql('SELECT *, articles.id AS id_article FROM articles '.
                        'INNER JOIN utilisateurs ON utilisateurs.id_user = articles.id_user '.
                        'WHERE articles.id_categorie_article=:id_categorie_article AND articles.id!=:id_art LIMIT 3')
                        ->setParamInt(":id_art", $id_art)
                        ->setParamInt(":id_categorie_article", $type)
                        ->fetchAllAssoc();
        }

        public function findAllIdAndGplayType(int $id):array {
            $sql = 'SELECT *, gameplay_type_articles.id AS id_gameplay_type_articles FROM gameplay_type '.
                    'INNER JOIN gameplay_type_articles ON gameplay_type_articles.id_gameplay_type = gameplay_type.id '.
                    'WHERE gameplay_type_articles.id_article=:id ORDER BY gameplay_type_articles.id DESC';
            return $this->setSql($sql)
                        ->setParamInt(":id", $id)
                        ->fetchAllAssoc();
        }

        /*pour relier le type */
        public function findAllCat():array {
            return $this->setSql('SELECT * FROM categories_articles')
                        ->fetchAllAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        
        public function findIdTypeArticle(string $name):int {
            $tab_type = $this->setSql('SELECT * FROM categories_articles WHERE nom=:nom')->setParam(":nom", $name)->fetchAssoc();
            if(!(!empty($tab_type) && array_key_exists("id_categorie_article", $tab_type) && !empty($tab_type["id_categorie_article"]))) {
                return 0;
            }
            return intval($tab_type["id_categorie_article"]);
        }

        public function visible(int $id, bool $visible): self {
            $sql = "UPDATE articles SET validation=:visible WHERE id=:id";
            $this->setSql($sql)->setParamInt(":id", $id)->setParamBool(":visible", $visible)->executeSql();
            return $this;
        }

        public function addMod(int $id, int $id_user, string $titre, string $contenu, int $id_categorie_article, string $resume = null, string $video = null, bool $visible = false): int {
            $id_main = $id;
            if(empty($video)) {
                $video = "";
            }
            if(empty($resume)) {
                if(!empty($contenu) && strlen($contenu) > 255) {
                    $resume = substr($contenu, 0, 255);
                } else {
                    $resume = $contenu;
                }
            }
            $this->beginTransaction();
            if(!empty($id)) {
                $sql = "UPDATE articles SET titre=:titre,contenu=:contenu,video=:video,id_categorie_article=:id_categorie_article,validation=:validation,resume=:resume WHERE id=:id";
                $this->setSql($sql)
                            ->setParamInt(":id", $id)
                            ->setParamInt(":id_categorie_article", $id_categorie_article)
                            ->setParamBool(":validation", $visible)
                            ->setParam(":titre", $titre)
                            ->setParam(":contenu", $contenu)
                            ->setParam(":resume", $resume)
                            ->setParam(":video", $video);
                $this->executeSql();
            } else {
                $sql = "INSERT INTO articles(id_user, titre, contenu, video, id_categorie_article, validation, resume) VALUES (:id_user, :titre, :contenu, :video, :id_categorie_article, :validation, :resume)";
                $this->setSql($sql)
                            ->setParamInt(":id_user", $id_user)
                            ->setParamInt(":id_categorie_article", $id_categorie_article)
                            ->setParamBool(":validation", $visible)
                            ->setParam(":titre", $titre)
                            ->setParam(":contenu", $contenu)
                            ->setParam(":resume", $resume)
                            ->setParam(":video", $video);
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

        public function delete(int $id): self {
            $sql = "DELETE FROM articles WHERE id=:id";
            $this->setSql($sql)->setParamInt(":id", $id);
            $this->executeSql();
            return $this;
        }

        public function addImg(int $id_article, string $src, string $name = null, int $alt = null): self {
            if(empty($name)) {
                $name = $src;
            }
            if(empty($alt)) {
                $alt = "";
            }
            $sql = "INSERT INTO articles_image(name, src, alt, id_article) VALUES (:name, :src, :alt, :id_article)";
            $this->setSql($sql)
                            ->setParamInt(":id_article", $id_article)
                            ->setParamBool(":name", $name)
                            ->setParam(":src", $src)
                            ->setParam(":alt", $alt);
            $this->executeSql();
            return $this;
        }

        public function findImgId(int $id):string {
            $resulImg = $this->setSql('SELECT src FROM articles_image WHERE id=:id')->setParamInt(":id", $id)->fetchAssoc();
            if(!empty($resulImg)) {
                return $resulImg["src"];
            }
            return "";
        }

        public function deleteImg(int $id): self {
            $sql = "DELETE FROM articles_image WHERE id=:id";
            $this->setSql($sql)->setParamInt(":id", $id);
            $this->executeSql();
            return $this;
        }

        public function findGPlayId(int $id): array {
            $sql = "SELECT * FROM gameplay_type_articles WHERE id=:id";
            $this->setSql($sql)->setParamInt(":id", $id);
            return $this->fetchAssoc();
        }

        public function findImgArticleId(int $id): array {
            $sql = "SELECT * FROM articles_image WHERE id_article=:id";
            $this->setSql($sql)->setParamInt(":id", $id);
            return $this->fetchAllAssoc();
        }

        public function addModGPlay(int $id, int $id_article, int $id_gameplay_type): int {
            $id_main = $id;
            if(!empty($id)) {
                $sql = "UPDATE gameplay_type_articles SET id_gameplay_type=:id_gameplay_type WHERE id=:id";
                $this->setSql($sql)
                            ->setParamInt(":id", $id)
                            ->setParamInt(":id_gameplay_type", $id_gameplay_type);
                $this->executeSql();
            } else {
                $sql = "INSERT INTO gameplay_type_articles (id_article, id_gameplay_type) VALUES (:id_article, :id_gameplay_type)";
                $this->setSql($sql)
                            ->setParamInt(":id_article", $id_article)
                            ->setParamInt(":id_gameplay_type", $id_gameplay_type);
                $this->executeSql();
                $id_main = $this->lastInsertId();
            }
            return $id_main;
        }

        public function deleteGPlay(int $id): self {
            $sql = "DELETE FROM gameplay_type_articles WHERE id=:id";
            $this->setSql($sql)->setParamInt(":id", $id);
            $this->executeSql();
            return $this;
        }
    } 
}

