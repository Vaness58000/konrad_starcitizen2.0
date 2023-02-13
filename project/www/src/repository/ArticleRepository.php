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
            return $this->setSql('SELECT * FROM actualites')->fetchAllAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findAllAndUser():array {
            return $this->setSql('SELECT * FROM articles '.
                'INNER JOIN utilisateurs ON utilisateurs.id_user = articles.id_user')->fetchAllAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findAllImgArticle(int $id):array {
            return $this->setSql('SELECT * FROM articles_image WHERE id_article=:id_article')->setParamInt(":id_article", $id)->fetchAllAssoc();
        }
    }
}

