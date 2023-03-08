<?php

// verifier qu'on n'a pas deja creer la fonction
if (!class_exists('ScreensRepository')) {
    // inculre la classe qui va creer le fichier "errors.log" en cas d'erreur.
    include_once dirname(__FILE__) . '/../class/classMain/Repository.php';

    // fonction pour faire la connexion a la base de donnes
    class ScreensRepository extends Repository {

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
            return $this->setSql('SELECT * FROM screens')->fetchAllAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findAllAndUser():array {
            return $this->setSql('SELECT * FROM screens '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = screens.id_user')->fetchAllAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findAllAndIdUser(int $id):array {
            return $this->setSql('SELECT * FROM screens '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = screens.id_user '.
                    'WHERE screens.id_screen=:id_screen')
                    ->setParamInt(":id_screen", $id)
                    ->fetchAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserIdPage(int $id, int $nmPage=0, int $nbArtPage=0):array {
            $limit = "";
            if(!empty($nbArtPage)) {
                $nmStart = $nmPage*$nbArtPage;
                $limit = " LIMIT $nbArtPage OFFSET $nmStart";
            }
            $sql = 'SELECT * FROM screens '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = screens.id_user '.
                    'WHERE utilisateurs.id_user=:id_user ORDER BY screens.id_screen DESC'.$limit.'';
            return $this->setSql($sql)
                        ->setParamInt(":id_user", $id)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserIdCount(int $id):int {
            $sql = 'SELECT * FROM screens '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = screens.id_user '.
                    'WHERE utilisateurs.id_user=:id_user ORDER BY screens.id_screen DESC';
            return $this->setSql($sql)
                        ->setParamInt(":id_user", $id)
                        ->rowCount();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserPage(int $nmPage=0, int $nbArtPage=0):array {
            $limit = "";
            if(!empty($nbArtPage)) {
                $nmStart = $nmPage*$nbArtPage;
                $limit = " LIMIT $nbArtPage OFFSET $nmStart";
            }
            $sql = 'SELECT * FROM screens '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = screens.id_user '.
                    'ORDER BY screens.id_screen DESC'.$limit.'';
            return $this->setSql($sql)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserCount():int {
            $sql = 'SELECT * FROM screens '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = screens.id_user '.
                    'ORDER BY screens.id_screen DESC';
            return $this->setSql($sql)
                        ->rowCount();
        }

        public function visible(int $id, bool $visible): self {
            $sql = "UPDATE screens SET validation=:visible WHERE id_screen=:id";
            $this->setSql($sql)->setParamInt(":id", $id)->setParamBool(":visible", $visible)->executeSql();
            return $this;
        }
        
        public function addMod(int $id, string $name, string $alt, int $id_user, bool $visible, string $srcImg = null): self {
            if(!empty($srcImg)) {
                $this->addModImg($id, $name, $alt, $id_user, $visible, $srcImg);
            } else {
                $this->addModNoImg($id, $name, $alt, $id_user, $visible);
            }
            return $this;
        }

        private function addModImg(int $id, string $name, string $alt, int $id_user, bool $visible, string $srcImg): self {
            if(!empty($id)) {
                $sql = "UPDATE screens SET name=:name,image=:image,alt=:alt,src=:src, validation=:validation WHERE id_screen=:id";
                $this->setSql($sql)
                            ->setParamInt(":id", $id)
                            ->setParamBool(":validation", $visible)
                            ->setParam(":image", $srcImg)
                            ->setParam(":src", $srcImg)
                            ->setParam(":alt", $alt)
                            ->setParam(":name", $name);
                $this->executeSql();
            } else {
                $sql = "INSERT INTO screens (id_user, name, image, alt, src, validation) VALUES (:id_user, :name, :image, :alt, :src, :validation)";
                $this->setSql($sql)
                            ->setParamInt(":id_user", $id_user)
                            ->setParamBool(":validation", $visible)
                            ->setParam(":image", $srcImg)
                            ->setParam(":src", $srcImg)
                            ->setParam(":alt", $alt)
                            ->setParam(":name", $name);
                $this->executeSql();
            }
            return $this;
        }

        private function addModNoImg(int $id, string $name, string $alt, int $id_user, bool $visible): self {
            if(!empty($id)) {
                $sql = "UPDATE screens SET name=:name,alt=:alt, validation=:validation WHERE id_screen=:id";
                $this->setSql($sql)
                            ->setParamInt(":id", $id)
                            ->setParamBool(":validation", $visible)
                            ->setParam(":alt", $alt)
                            ->setParam(":name", $name);
                $this->executeSql();
            } else {
                $sql = "INSERT INTO screens (id_user, name, alt, validation) VALUES (:id_user, :name, :alt, :validation)";
                $this->setSql($sql)
                            ->setParamInt(":id_user", $id_user)
                            ->setParamBool(":validation", $visible)
                            ->setParam(":alt", $alt)
                            ->setParam(":name", $name);
                $this->executeSql();
            }
            return $this;
        }

        public function delete(int $id): self {
            $sql = "DELETE FROM screens WHERE id_screen=:id";
            $this->setSql($sql)->setParamInt(":id", $id);
            $this->executeSql();
            return $this;
        }

        public function findImgId(int $id):string {
            $resulImg = $this->setSql('SELECT src FROM screens WHERE id_screen=:id')->setParamInt(":id", $id)->fetchAssoc();
            if(!empty($resulImg)) {
                return $resulImg["src"];
            }
            return "";
        }
        
    }
}

