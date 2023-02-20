<?php

// verifier qu'on n'a pas deja creer la fonction
if (!class_exists('UsersRepository')) {
    // inculre la classe qui va creer le fichier "errors.log" en cas d'erreur.
    include_once dirname(__FILE__) . '/ObjetRepository.php';

    // fonction pour faire la connexion a la base de donnes
    class UsersRepository extends ObjetRepository {

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
            return $this->setSql('SELECT * FROM utilisateurs'.
            'LEFT JOIN avatar ON utilisateurs.id_user = avatar.id_user')->fetchAllAssoc();
        }
        public function findAllUserId(int $id):array {
            return $this->setSql('SELECT * FROM avatar WHERE id_user=:id')->setParamInt(":id", $id)->fetchAssoc();
        }

    }
}

