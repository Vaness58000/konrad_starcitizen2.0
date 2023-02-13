<?php

// verifier qu'on n'a pas deja creer la fonction
if (!class_exists('LieuxRepository')) {
    // inculre la classe qui va creer le fichier "errors.log" en cas d'erreur.
    include_once dirname(__FILE__) . '/ObjetRepository.php';

    // fonction pour faire la connexion a la base de donnes
    class LieuxRepository extends ObjetRepository {

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
            return $this->setSql('SELECT *, objet.id AS id_objet, objet.nom AS nom_lieu, categories_lieux.nom AS nom_cat FROM objet '.
                    'INNER JOIN lieux ON lieux.id_objet = objet.id '.
                    'INNER JOIN categories_lieux ON categories_lieux.id_categ_lieu = lieux.id_categ_lieu')->fetchAllAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findAllCat(int $id_cat):array {
            return $this->setSql('SELECT *, objet.id AS id_objet, objet.nom AS nom_lieu, categories_lieux.nom AS nom_cat FROM objet '.
                    'INNER JOIN lieux ON lieux.id_objet = objet.id '.
                    'INNER JOIN categories_lieux ON categories_lieux.id_categ_lieu = lieux.id_categ_lieu '.
                    'WHERE categories_lieux.id_categ_lieu=:id_cat')->setParamInt(":id_cat", $id_cat)->fetchAllAssoc();
        }

    }
}

