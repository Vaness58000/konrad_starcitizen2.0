<?php

// verifier qu'on n'a pas deja creer la fonction
if (!class_exists('TransportRepository')) {
    // inculre la classe qui va creer le fichier "errors.log" en cas d'erreur.
    include_once dirname(__FILE__) . '/ObjetRepository.php';

    // fonction pour faire la connexion a la base de donnes
    class TransportRepository extends ObjetRepository
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
            return $this->setSql('SELECT *, objet.id AS id_objet, objet.nom AS nom_obj FROM objet ' .
                'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user ' .
                'INNER JOIN equipements_transports ON equipements_transports.id_objet = objet.id ' .
                'INNER JOIN arm_vaiss ON equipements_armement.id_arme = arm_vaiss.id_arm')->fetchAllAssoc();
        }

        public function findAllAndIdUser(int $id): array
        {
            return $this->setSql('SELECT *, utilisateurs.id_user AS idUser, objet.id AS id_objet, objet.nom AS nom_obj, objet.contenu AS contenu_obj, equipements_transports.id AS id_transp FROM objet ' .
                'INNER JOIN equipements_transports ON equipements_transports.id_objet = objet.id ' .
                'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user ' .
                'LEFT JOIN construct_transp ON equipements_transports.id = construct_transp.id_transp ' .
                'LEFT JOIN constructeur ON construct_transp.id_construct = constructeur.id_constructeur ' .
                'INNER JOIN disponibilite ON disponibilite.id_disponibilite = equipements_transports.id_disponible ' .
                'WHERE objet.id=:id')->setParamInt(":id", $id)->fetchAssoc();
        }

        public function findAllAndUserConstructeurId(int $id): array
        {
            return $this->setSql('SELECT *, utilisateurs.id_user AS idUser, objet.id AS id_objet, objet.nom AS nom_obj, equipements_transports.id AS id_transp FROM objet ' .
                'INNER JOIN equipements_transports ON equipements_transports.id_objet = objet.id ' .
                'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user ' .
                'LEFT JOIN construct_transp ON equipements_transports.id = construct_transp.id_transp ' .
                'WHERE construct_transp.id_construct=:id')->setParamInt(":id", $id)->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserIdPage(int $id_type, int $id, int $nmPage = 0, int $nbArtPage = 0): array
        {
            $limit = "";
            if (!empty($nbArtPage)) {
                $nmStart = $nmPage * $nbArtPage;
                $limit = " LIMIT $nbArtPage OFFSET $nmStart";
            }
            $sql = 'SELECT *, objet.id AS id_objet, objet.nom AS nom_obj FROM objet ' .
                'INNER JOIN equipements_transports ON equipements_transports.id_objet = objet.id ' .
                'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user ' .
                'WHERE objet.id_objet_type=:id_type && utilisateurs.id_user=:id_user ORDER BY objet.id DESC' . $limit . '';
            return $this->setSql($sql)
                ->setParamInt(":id_user", $id)
                ->setParamInt(":id_type", $id_type)
                ->fetchAllAssoc();
        }
        public function findAllAndConstructIdPage(int $id_type, int $id, int $nmPage = 0, int $nbArtPage = 0): array
        {
            $limit = "";
            if (!empty($nbArtPage)) {
                $nmStart = $nmPage * $nbArtPage;
                $limit = " LIMIT $nbArtPage OFFSET $nmStart";
            }
            $sql = 'SELECT *, objet.id AS id_objet, objet.nom AS nom_obj FROM objet ' .
                'INNER JOIN equipements_transports ON equipements_transports.id_objet = objet.id ' .
                'LEFT JOIN construct_transp ON equipements_transports.id = construct_transp.id_transp ' .
                'LEFT JOIN constructeur ON construct_transp.id_construct = constructeur.id_constructeur ' .
                'WHERE equipements_transports.categorie=:id_type && constructeur.id_constructeur =:id_constructeur ORDER BY objet.id DESC' . $limit . '';
            return $this->setSql($sql)
                ->setParamInt(":id_constructeur", $id)
                ->setParamInt(":id_type", $id_type)
                ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserIdCount(int $id_type, int $id): int
        {
            $sql = 'SELECT *, objet.id AS id_objet, objet.nom AS nom_obj FROM objet ' .
                'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user ' .
                'INNER JOIN equipements_transports ON equipements_transports.id_objet = objet.id ' .
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
            $sql = 'SELECT *, objet.id AS id_objet, objet.nom AS nom_obj FROM objet ' .
                'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user ' .
                'INNER JOIN equipements_transports ON equipements_transports.id_objet = objet.id ' .
                'WHERE objet.id_objet_type=:id_type ORDER BY objet.id DESC' . $limit . '';
            return $this->setSql($sql)
                ->setParamInt(":id_type", $id_type)
                ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserCount(int $id_type): int
        {
            $sql = 'SELECT *, objet.id AS id_objet, objet.nom AS nom_obj FROM objet ' .
                'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user ' .
                'INNER JOIN equipements_transports ON equipements_transports.id_objet = objet.id ' .
                'WHERE objet.id_objet_type=:id_type ORDER BY objet.id DESC';
            return $this->setSql($sql)
                ->setParamInt(":id_type", $id_type)
                ->rowCount();
        }

        public function findAllIdAndLieux(int $id):array {
            $sql = 'SELECT *, transport_lieu.id AS id_transp_lieu, objet.id AS id_obj, objet.nom AS nom_lieu FROM objet '.
                    'INNER JOIN lieux ON lieux.id_objet = objet.id '.
                    'LEFT JOIN transport_lieu ON lieux.id_lieu = transport_lieu.id_lieu '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'WHERE transport_lieu.id_transport=:id && objet.validation=1 ORDER BY transport_lieu.id_transport DESC';
            return $this->setSql($sql)
                ->setParamInt(":id", $id)
                ->fetchAllAssoc();
        }

        public function findAllIdAndForce(int $id): array
        {
            $sql = 'SELECT *, transp_forces.id AS id_transp_forces FROM forces ' .
                'INNER JOIN transp_forces ON transp_forces.id_forces = forces.id_force ' .
                'WHERE transp_forces.id_transp=:id ORDER BY transp_forces.id DESC';
            return $this->setSql($sql)
                ->setParamInt(":id", $id)
                ->fetchAllAssoc();
        }

        public function findAllIdAndFaibl(int $id): array
        {
            $sql = 'SELECT *, transp_faiblesses.id AS id_transp_faibl FROM faiblesses ' .
                'INNER JOIN transp_faiblesses ON transp_faiblesses.id_faiblesse = faiblesses.id_faiblesse ' .
                'WHERE transp_faiblesses.id_transp=:id ORDER BY transp_faiblesses.id DESC';
            return $this->setSql($sql)
                ->setParamInt(":id", $id)
                ->fetchAllAssoc();
        }

        public function findAllIdAndEquipem(int $id):array {
            $sql = 'SELECT *, equipement.id AS id_equipem, transp_equip.id AS id_transp_equip FROM equipement '.
                    'INNER JOIN transp_equip ON transp_equip.id_equip = equipement.id '.
                    'WHERE transp_equip.id_transp=:id ORDER BY transp_equip.id DESC';
            return $this->setSql($sql)
                ->setParamInt(":id", $id)
                ->fetchAllAssoc();
        }

        public function findAllIdAndArmement(int $id): array
        {
            $sql = 'SELECT *, transport_arm.id AS id_transport_arm, objet.id AS id_obj, objet.nom AS nom_obj FROM objet ' .
                'INNER JOIN equipements_armement ON equipements_armement.id_objet = objet.id ' .
                'INNER JOIN transport_arm ON transport_arm.id_arm_transp = equipements_armement.id_arme ' .
                'WHERE transport_arm.id_transport=:id ORDER BY transport_arm.id DESC';
            return $this->setSql($sql)
                ->setParamInt(":id", $id)
                ->fetchAllAssoc();
        }

        public function findListCat(): array
        {
            $sql = 'SELECT * FROM categorie_transport ORDER BY id_transport DESC';
            return $this->setSql($sql)
                ->fetchAllAssoc();
        }

        public function findListType(): array
        {
            $sql = 'SELECT * FROM type_transport ORDER BY id_type DESC';
            return $this->setSql($sql)
                ->fetchAllAssoc();
        }

        public function findListDisp(): array
        {
            $sql = 'SELECT * FROM disponibilite ORDER BY id_disponibilite DESC';
            return $this->setSql($sql)
                ->fetchAllAssoc();
        }
        public function findIdTypeTransports(string $name): int
        {
            $tab_type = $this->setSql('SELECT * FROM categories_transport WHERE nom=:nom')->setParam(":nom", $name)->fetchAssoc();
            if (!(!empty($tab_type) && array_key_exists("id_transport", $tab_type) && !empty($tab_type["id_transport"]))) {
                return 0;
            }
            return intval($tab_type["id_transport"]);
        }
        public function findIdTypeTransport(): int
        {
            return $this->findIdTypeObj("transport");
        }

        public function recupIdTransp(int $id_objet): int {
            $sql = 'SELECT id FROM equipements_transports WHERE id_objet=:id';
            $recupId = $this->setSql($sql)
                        ->setParamInt(":id", $id_objet)
                        ->fetchAssoc();
            if(empty($recupId)) {
                return 0;
            }
            return intval($recupId['id']);
        }
        
        public function add(int $id_transp, int $id_objet, ?string $prix, ?string $equipage, ?string $taille, ?string $poids, ?string $vitesse_max, ?string $capacite, int $categorie, int $type, ?string $lien, int $id_disponible, ?string $description = null): int {
            $id_main = $id_transp;
            if(empty($description)) {
                $description = "";
            }
            $this->beginTransaction();
            if(!empty($id_transp)) {
                $sql = "UPDATE equipements_transports SET prix=:prix,equipage=:equipage,taille=:taille,poids=:poids,vitesse_max=:vitesse_max,capacite=:capacite,description=:description,categorie=:categorie,type=:type,lien=:lien,id_disponible=:id_disponible WHERE id=:id";
                $this->setSql($sql)
                    ->setParamInt(":id", $id_transp)
                    ->setParamInt(":categorie", $categorie)
                    ->setParamInt(":type", $type)
                    ->setParamInt(":id_disponible", $id_disponible)
                    ->setParam(":prix", $prix)
                    ->setParam(":equipage", $equipage)
                    ->setParam(":taille", $taille)
                    ->setParam(":poids", $poids)
                    ->setParam(":vitesse_max", $vitesse_max)
                    ->setParam(":capacite", $capacite)
                    ->setParam(":description", $description)
                    ->setParam(":lien", $lien);
                $this->executeSql();
            } else {
                $sql = "INSERT INTO equipements_transports (id_objet, prix, equipage, taille, poids, vitesse_max, capacite, description, categorie, type, lien, id_disponible) VALUES (:id_objet, :prix, :equipage, :taille, :poids, :vitesse_max, :capacite, :description, :categorie, :type, :lien, :id_disponible)";
                $this->setSql($sql)
                    ->setParamInt(":id_objet", $id_objet)
                    ->setParamInt(":categorie", $categorie)
                    ->setParamInt(":type", $type)
                    ->setParamInt(":id_disponible", $id_disponible)
                    ->setParam(":prix", $prix)
                    ->setParam(":equipage", $equipage)
                    ->setParam(":taille", $taille)
                    ->setParam(":poids", $poids)
                    ->setParam(":vitesse_max", $vitesse_max)
                    ->setParam(":capacite", $capacite)
                    ->setParam(":description", $description)
                    ->setParam(":lien", $lien);
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

        public function addModLieu(int $id, int $id_transport, int $id_lieu): int {
            $id_main = $id;
            $this->beginTransaction();
            if(!empty($id)) {
                $sql = "UPDATE transport_lieu SET id_lieu=:id_lieu WHERE id=:id";
                $this->setSql($sql)
                            ->setParamInt(":id", $id)
                            ->setParamInt(":id_lieu", $id_lieu);
                $this->executeSql();
            } else {
                $sql = "INSERT INTO transport_lieu (id_transport, id_lieu) VALUES (:id_transport, :id_lieu)";
                $this->setSql($sql)
                            ->setParamInt(":id_transport", $id_transport)
                            ->setParamInt(":id_lieu", $id_lieu);
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

        public function deleteLieuTransp(int $id): self {
            $sql = "DELETE FROM transport_lieu WHERE id=:id";
            $this->setSql($sql)->setParamInt(":id", $id);
            $this->executeSql();
            return $this;
        }

        public function addModForce(int $id, int $id_transport, int $id_forces): int {
            $id_main = $id;
            $this->beginTransaction();
            if(!empty($id)) {
                $sql = "UPDATE transp_forces SET id_forces=:id_forces WHERE id=:id";
                $this->setSql($sql)
                            ->setParamInt(":id", $id)
                            ->setParamInt(":id_forces", $id_forces);
                $this->executeSql();
            } else {
                $sql = "INSERT INTO transp_forces (id_transp, id_forces) VALUES (:id_transport, :id_forces)";
                $this->setSql($sql)
                            ->setParamInt(":id_transport", $id_transport)
                            ->setParamInt(":id_forces", $id_forces);
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

        public function deleteForceTransp(int $id): self {
            $sql = "DELETE FROM transp_forces WHERE id=:id";
            $this->setSql($sql)->setParamInt(":id", $id);
            $this->executeSql();
            return $this;
        }

        public function addModFaibl(int $id, int $id_transport, int $id_faiblesse): int {
            $id_main = $id;
            $this->beginTransaction();
            if(!empty($id)) {
                $sql = "UPDATE transp_faiblesses SET id_faiblesse=:id_faiblesse WHERE id=:id";
                $this->setSql($sql)
                            ->setParamInt(":id", $id)
                            ->setParamInt(":id_faiblesse", $id_faiblesse);
                $this->executeSql();
            } else {
                $sql = "INSERT INTO transp_faiblesses (id_transp, id_faiblesse) VALUES (:id_transport, :id_faiblesse)";
                $this->setSql($sql)
                            ->setParamInt(":id_transport", $id_transport)
                            ->setParamInt(":id_faiblesse", $id_faiblesse);
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

        public function deleteFaiblTransp(int $id): self {
            $sql = "DELETE FROM transp_faiblesses WHERE id=:id";
            $this->setSql($sql)->setParamInt(":id", $id);
            $this->executeSql();
            return $this;
        }

        public function addModArm(int $id, int $id_transport, int $id_arm_transp): int {
            $id_main = $id;
            $this->beginTransaction();
            if(!empty($id)) {
                $sql = "UPDATE transport_arm SET id_arm_transp=:id_arm_transp WHERE id=:id";
                $this->setSql($sql)
                            ->setParamInt(":id", $id)
                            ->setParamInt(":id_arm_transp", $id_arm_transp);
                $this->executeSql();
            } else {
                $sql = "INSERT INTO transport_arm (id_transport, id_arm_transp) VALUES (:id_transport, :id_arm_transp)";
                $this->setSql($sql)
                            ->setParamInt(":id_transport", $id_transport)
                            ->setParamInt(":id_arm_transp", $id_arm_transp);
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

        public function deleteArmTransp(int $id): self {
            $sql = "DELETE FROM transport_arm WHERE id=:id";
            $this->setSql($sql)->setParamInt(":id", $id);
            $this->executeSql();
            return $this;
        }

        public function addModEquip(int $id, ?string $nom, ?string $description, ?string $prix): int {
            $id_main = $id;
            $this->beginTransaction();
            if(!empty($id)) {
                $sql = "UPDATE equipement SET nom=:nom,description=:description,prix=:prix WHERE id=:id";
                $this->setSql($sql)
                            ->setParamInt(":id", $id)
                            ->setParam(":nom", $nom)
                            ->setParam(":description", $description)
                            ->setParam(":prix", $prix);
                $this->executeSql();
            } else {
                $sql = "INSERT INTO equipement (nom, description, prix) VALUES (:nom, :description, :prix)";
                $this->setSql($sql)
                            ->setParam(":nom", $nom)
                            ->setParam(":description", $description)
                            ->setParam(":prix", $prix);
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

        public function addEquipTransp(int $id, int $id_equip, int $id_transp) {
            $id_main = $id;
            if(empty($id)) {
                $this->beginTransaction();
                $sql = "INSERT INTO transp_equip (id_equip, id_transp) VALUES (:id_equip, :id_transp)";
                $this->setSql($sql)
                    ->setParam(":id_equip", $id_equip)
                    ->setParam(":id_transp", $id_transp);
                $this->executeSql();
                $id_main = $this->lastInsertId();
                // en cas d'erreur
                if(Error_Log::isError()) {
                    $id_main = 0;
                    $this->rollBack();
                } else {
                    $this->commit();
                }
            }
            return $id_main;
        }

        public function deleteEquipTransp(int $id): self {
            $sql = "DELETE FROM equipement WHERE id=:id";
            $this->setSql($sql)->setParamInt(":id", $id);
            $this->executeSql();
            return $this;
        }
        
        public function recupIdConstructTransp(int $id_transp): int {
            $sql = 'SELECT id FROM construct_transp WHERE id_transp=:id';
            $recupId = $this->setSql($sql)
                        ->setParamInt(":id", $id_transp)
                        ->fetchAssoc();
            if(empty($recupId)) {
                return 0;
            }
            return intval($recupId['id']);
        }

        public function addModConstruct(int $id, int $id_transp, int $id_construct): int {
            $id_main = $id;
            if(!empty($id)) {
                $this->beginTransaction();
                $sql = "UPDATE construct_transp SET id_construct=:id_construct WHERE id=:id";
                $this->setSql($sql)
                    ->setParamInt(":id", $id)
                    ->setParamInt(":id_transp", $id_transp);
                $this->executeSql();
            }else {
                $this->beginTransaction();
                $sql = "INSERT INTO construct_transp (id_construct, id_transp) VALUES (:id_construct, :id_transp)";
                $this->setSql($sql)
                    ->setParamInt(":id_construct", $id_construct)
                    ->setParamInt(":id_transp", $id_transp);
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

    
    }
}
