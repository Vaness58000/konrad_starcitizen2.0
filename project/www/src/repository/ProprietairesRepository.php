<?php

// verifier qu'on n'a pas deja creer la fonction
if (!class_exists('ProprietairesRepository')) {
    // inculre la classe qui va creer le fichier "errors.log" en cas d'erreur.
    include_once dirname(__FILE__) . '/ObjetRepository.php';

    // fonction pour faire la connexion a la base de donnes
    class ProprietairesRepository extends ObjetRepository {

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
            return $this->setSql('SELECT *, objet.id AS id_objet, proprietaire.id AS id_proprietaire, objet.nom AS nom_obj FROM objet '.
                'INNER JOIN proprietaire ON proprietaire.id_objet = objet.id')->fetchAllAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findAllAndUser():array {
            return $this->setSql('SELECT *, objet.id AS id_objet, proprietaire.id AS id_proprietaire, objet.nom AS nom_obj FROM objet '.
                    'INNER JOIN proprietaire ON proprietaire.id_objet = objet.id '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user')->fetchAllAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findAllAndIdUser(int $id):array {
            return $this->setSql('SELECT *, objet.id AS id_objet, proprietaire.id AS id_proprietaire, objet.nom AS nom_obj FROM objet '.
            'INNER JOIN proprietaire ON proprietaire.id_objet = objet.id '.
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
            $sql = 'SELECT *, objet.id AS id_objet, proprietaire.id AS id_proprietaire, objet.nom AS nom_obj FROM objet '.
            'INNER JOIN proprietaire ON proprietaire.id_objet = objet.id '.
            'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
            'WHERE objet.id_objet_type=:id_type && utilisateurs.id_user=:id_user ORDER BY objet.id DESC'.$limit.'';
            return $this->setSql($sql)
                        ->setParamInt(":id_user", $id)
                        ->setParamInt(":id_type", $id_type)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserIdCount(int $id_type, int $id):int {
            $sql = 'SELECT *, objet.id AS id_objet, proprietaire.id AS id_proprietaire, objet.nom AS nom_obj FROM objet '.
                    'INNER JOIN proprietaire ON proprietaire.id_objet = objet.id '.
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
            $sql = 'SELECT *, objet.id AS id_objet, proprietaire.id AS id_proprietaire, objet.nom AS nom_obj FROM objet '.
                    'INNER JOIN proprietaire ON proprietaire.id_objet = objet.id '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'WHERE objet.id_objet_type=:id_type ORDER BY objet.id DESC'.$limit.'';
            return $this->setSql($sql)
                        ->setParamInt(":id_type", $id_type)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserCount(int $id_type):int {
            $sql = 'SELECT *, objet.id AS id_objet, proprietaire.id AS id_proprietaire, objet.nom AS nom_obj FROM objet '.
                    'INNER JOIN proprietaire ON proprietaire.id_objet = objet.id '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'WHERE objet.id_objet_type=:id_type ORDER BY objet.id DESC';
            return $this->setSql($sql)
                        ->setParamInt(":id_type", $id_type)
                        ->rowCount();
        }

        public function findAllIdAndLieux(int $id):array {
            $sql = 'SELECT *, objet.id AS id_objet, proprietaire_lieu.id AS id_proprietaire_lieu, objet.nom AS nom_lieu FROM objet '.
                    'INNER JOIN lieux ON lieux.id_objet = objet.id '.
                    'INNER JOIN proprietaire_lieu ON proprietaire_lieu.id_lieu = lieux.id_lieu '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'WHERE proprietaire_lieu.id_proprietaire=:id && objet.validation=1 ORDER BY proprietaire_lieu.id DESC';
            return $this->setSql($sql)
                        ->setParamInt(":id", $id)
                        ->fetchAllAssoc();
        }

        public function findIdTypePropriet():int {
            return $this->findIdTypeObj("propriétaire");
        }
    }
}

