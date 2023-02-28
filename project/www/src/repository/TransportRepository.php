<?php

// verifier qu'on n'a pas deja creer la fonction
if (!class_exists('TransportRepository')) {
    // inculre la classe qui va creer le fichier "errors.log" en cas d'erreur.
    include_once dirname(__FILE__) . '/ObjetRepository.php';

    // fonction pour faire la connexion a la base de donnes
    class TransportRepository extends ObjetRepository {

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
            return $this->setSql('SELECT *, objet.id AS id_objet, objet.nom AS nom_obj FROM objet '.
            'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'INNER JOIN equipements_transports ON equipements_transports.id_objet = objet.id '.
                    'INNER JOIN arm_vaiss ON equipements_armement.id_arme = arm_vaiss.id_arm')->fetchAllAssoc();
        }

        public function findAllAndIdUser(int $id):array {
            return $this->setSql('SELECT *, objet.id AS id_objet, objet.nom AS nom_obj, equipements_transports.id AS id_transp FROM objet '.
            'INNER JOIN equipements_transports ON equipements_transports.id_objet = objet.id '.
            'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
            'LEFT JOIN construct_transp ON equipements_transports.id = construct_transp.id_transp '.
                    'WHERE objet.id=:id')->setParamInt(":id", $id)->fetchAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserIdPage(int $id_type, int $id, int $nmPage=0, int $nbArtPage=0):array {
            $limit = "";
            if(!empty($nbArtPage)) {
                $nmStart = $nmPage*$nbArtPage;
                $limit = " LIMIT $nbArtPage OFFSET $nmStart";
            }
            $sql = 'SELECT *, objet.id AS id_objet, objet.nom AS nom_obj FROM objet '.
            'INNER JOIN equipements_transports ON equipements_transports.id_objet = objet.id '.
            'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
            'WHERE objet.id_objet_type=:id_type && utilisateurs.id_user=:id_user ORDER BY objet.id DESC'.$limit.'';
            return $this->setSql($sql)
                        ->setParamInt(":id_user", $id)
                        ->setParamInt(":id_type", $id_type)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserIdCount(int $id_type, int $id):int {
            $sql = 'SELECT *, objet.id AS id_objet, objet.nom AS nom_obj FROM objet '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'INNER JOIN equipements_transports ON equipements_transports.id_objet = objet.id '.
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
            $sql = 'SELECT *, objet.id AS id_objet, objet.nom AS nom_obj FROM objet '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'INNER JOIN equipements_transports ON equipements_transports.id_objet = objet.id '.
                    'WHERE objet.id_objet_type=:id_type ORDER BY objet.id DESC'.$limit.'';
            return $this->setSql($sql)
                        ->setParamInt(":id_type", $id_type)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserCount(int $id_type):int {
            $sql = 'SELECT *, objet.id AS id_objet, objet.nom AS nom_obj FROM objet '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'INNER JOIN equipements_transports ON equipements_transports.id_objet = objet.id '.
                    'WHERE objet.id_objet_type=:id_type ORDER BY objet.id DESC';
            return $this->setSql($sql)
                        ->setParamInt(":id_type", $id_type)
                        ->rowCount();
        }

        public function findAllIdAndLieux(int $id):array {
            $sql = 'SELECT *, objet.id AS id_lieu, objet.nom AS nom_lieu FROM objet '.
                    'INNER JOIN lieux ON lieux.id_objet = objet.id '.
                    'LEFT JOIN transport_lieu ON lieux.id_lieu = transport_lieu.id_lieu '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'WHERE transport_lieu.id=:id && objet.validation=1 ORDER BY transport_lieu.id_transport DESC';
            return $this->setSql($sql)
                        ->setParamInt(":id", $id)
                        ->fetchAllAssoc();
        }

        public function findAllIdAndForce(int $id):array {
            $sql = 'SELECT *, transp_forces.id AS id_transp_forces FROM forces '.
                    'INNER JOIN transp_forces ON transp_forces.id_forces = forces.id_force '.
                    'WHERE transp_forces.id_transp=:id ORDER BY transp_forces.id DESC';
            return $this->setSql($sql)
                        ->setParamInt(":id", $id)
                        ->fetchAllAssoc();
        }

        public function findAllIdAndFaibl(int $id):array {
            $sql = 'SELECT *, transp_faiblesses.id AS id_transp_faibl FROM faiblesses '.
                    'INNER JOIN transp_faiblesses ON transp_faiblesses.id_faiblesse = faiblesses.id_faiblesse '.
                    'WHERE transp_faiblesses.id_transp=:id ORDER BY transp_faiblesses.id DESC';
            return $this->setSql($sql)
                        ->setParamInt(":id", $id)
                        ->fetchAllAssoc();
        }

        public function findAllIdAndEquipem(int $id):array {
            $sql = 'SELECT *, transp_equip.id AS id_transp_equip FROM equipement '.
                    'INNER JOIN transp_equip ON transp_equip.id_equip = equipement.id '.
                    'WHERE transp_equip.id_transp=:id ORDER BY transp_equip.id DESC';
            return $this->setSql($sql)
                        ->setParamInt(":id", $id)
                        ->fetchAllAssoc();
        }

        public function findAllIdAndArmement(int $id):array {
            $sql = 'SELECT *, transport_arm.id AS id_transport_arm, objet.id AS id_obj, objet.nom AS nom_obj FROM objet '.
                    'INNER JOIN equipements_armement ON equipements_armement.id_objet = objet.id '.
                    'INNER JOIN transport_arm ON transport_arm.id_arm_transp = equipements_armement.id_arme '.
                    'WHERE transport_arm.id_transport=:id ORDER BY transport_arm.id DESC';
            return $this->setSql($sql)
                        ->setParamInt(":id", $id)
                        ->fetchAllAssoc();
        }

        public function findListCat():array {
            $sql = 'SELECT * FROM categorie_transport ORDER BY id_transport DESC';
            return $this->setSql($sql)
                        ->fetchAllAssoc();
        }

        public function findListType():array {
            $sql = 'SELECT * FROM type_transport ORDER BY id_type DESC';
            return $this->setSql($sql)
                        ->fetchAllAssoc();
        }

        public function findListDisp():array {
            $sql = 'SELECT * FROM disponibilite ORDER BY id_disponibilite DESC';
            return $this->setSql($sql)
                        ->fetchAllAssoc();
        }

        public function findIdTypeTransport():int {
            return $this->findIdTypeObj("transport");
        }

    }
}

