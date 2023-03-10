<?php

// verifier qu'on n'a pas deja creer la fonction
if (!class_exists('VaisseauRepository')) {
    // inculre la classe qui va creer le fichier "errors.log" en cas d'erreur.
    include_once dirname(__FILE__) . '/ObjetRepository.php';

    // fonction pour faire la connexion a la base de donnes
    class VaisseauRepository extends ObjetRepository {

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
            return $this->setSql('SELECT *, objet.id AS id_objet, objet.nom AS nom_vaiss, categorie_transport.nom AS nom_cat, type_transport.nom AS nom_type FROM objet '.
                    'INNER JOIN equipements_transports ON equipements_transports.id_objet = objet.id '.
                    'INNER JOIN categorie_transport ON categorie_transport.id_transport = equipements_transports.categorie '.
                    'INNER JOIN type_transport ON type_transport.id_type = equipements_transports.type '.
                    'INNER JOIN disponibilite ON disponibilite.id_disponibilite = equipements_transports.id_disponible')->fetchAllAssoc();
        }
        public function findAllId(int $id):array {
            return $this->setSql('SELECT *, objet.id AS id_objet, objet.nom AS nom_vaiss, categorie_transport.nom AS nom_cat, type_transport.nom AS nom_type FROM objet '.
                    'INNER JOIN equipements_transports ON equipements_transports.id_objet = objet.id '.
                    'INNER JOIN categorie_transport ON categorie_transport.id_transport = equipements_transports.categorie '.
                    'INNER JOIN type_transport ON type_transport.id_type = equipements_transports.type '.
                    'INNER JOIN disponibilite ON disponibilite.id_disponibilite = equipements_transports.id_disponible WHERE equipements_transports.id=:id')->setParamInt(":id", $id)->fetchAllAssoc();
        }       
        public function findAllType(int $type):array {
            return $this->setSql('SELECT *, objet.id AS id_objet, objet.nom AS nom_vaiss, categorie_transport.nom AS nom_cat, type_transport.nom AS nom_type FROM objet '.
                    'INNER JOIN equipements_transports ON equipements_transports.id_objet = objet.id '.
                    'INNER JOIN categorie_transport ON categorie_transport.id_transport = equipements_transports.categorie '.
                    'INNER JOIN type_transport ON type_transport.id_type = equipements_transports.type '.
                    'INNER JOIN disponibilite ON disponibilite.id_disponibilite = equipements_transports.id_disponible WHERE type_transport.id_type=:type')->setParamInt(":type", $type)->fetchAllAssoc();
        }        
       
        public function findIdTypeTransport(string $name):int {
            $tab_type = $this->setSql('SELECT * FROM categorie_transport WHERE nom=:nom')->setParam(":nom", $name)->fetchAssoc();
            if(!(!empty($tab_type) && array_key_exists("id_transport", $tab_type) && !empty($tab_type["id_transport"]))) {
                return 0;
            }
            return intval($tab_type["id_transport"]);
        }
    }
}

