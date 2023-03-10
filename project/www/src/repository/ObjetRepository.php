<?php

// verifier qu'on n'a pas deja creer la fonction
if (!class_exists('ObjetRepository')) {
    // inculre la classe qui va creer le fichier "errors.log" en cas d'erreur.
    include_once dirname(__FILE__) . '/../class/classMain/Repository.php';

    // fonction pour faire la connexion a la base de donnes
    class ObjetRepository extends Repository {

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
            return $this->setSql('SELECT * FROM objet')->fetchAllAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findAllAndUser():array {
            return $this->setSql('SELECT * FROM objet '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user')->fetchAllAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findAllImgObj(int $id):array {
            return $this->setSql('SELECT * FROM images_objet WHERE id_objet=:id_objet')->setParamInt(":id_objet", $id)->fetchAllAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findAllInfObj(int $id):array {
            return $this->setSql('SELECT * FROM info_objet WHERE id_objet=:id_objet ORDER BY id DESC')->setParamInt(":id_objet", $id)->fetchAllAssoc();
        }

        public function findAllInfObjId(int $id):array {
            return $this->setSql('SELECT * FROM info_objet WHERE id=:id')->setParamInt(":id", $id)->fetchAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findAllImgInfObj(int $id):array {
            return $this->setSql('SELECT * FROM images_info_objet WHERE id_info_objet=:id_info_objet')->setParamInt(":id_info_objet", $id)->fetchAllAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findListTypeObj(int $id):array {
            return $this->setSql('SELECT * FROM objet_type')->fetchAllAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findIdTypeObj(string $name):int {
            $tab_type = $this->setSql('SELECT * FROM objet_type WHERE nom=:nom')->setParam(":nom", $name)->fetchAssoc();
            if(!(!empty($tab_type) && array_key_exists("id", $tab_type) && !empty($tab_type["id"]))) {
                return 0;
            }
            return intval($tab_type["id"]);
        }

        public function imagePrincipale(int $id_obj):?array {
            $imgPrinc = $this->setSql('SELECT * FROM images_objet WHERE id_objet=:id_objet AND img_principal=1')->setParamInt(":id_objet", $id_obj)->fetchAssoc();
            if(!empty($imgPrinc)) {
                return $imgPrinc;
            }
            return $this->setSql('SELECT * FROM images_objet WHERE id_objet=:id_objet LIMIT 1')->setParamInt(":id_objet", $id_obj)->fetchAssoc();
        }

        public function visible(int $id, bool $visible): self {
            $sql = "UPDATE objet SET validation=:visible WHERE id=:id";
            $this->setSql($sql)->setParamInt(":id", $id)->setParamBool(":visible", $visible)->executeSql();
            return $this;
        }

        public function addImg(int $id_objet, string $src, string $name = null, int $alt = null): int {
            if(empty($name)) {
                $name = $src;
            }
            if(empty($alt)) {
                $alt = "";
            }
            $id_main = 0;
            $this->beginTransaction();
            $sql = "INSERT INTO images_objet(name, src, alt, id_objet) VALUES (:name, :src, :alt, :id_objet)";
            $this->setSql($sql)
                            ->setParamInt(":id_objet", $id_objet)
                            ->setParamBool(":name", $name)
                            ->setParam(":src", $src)
                            ->setParam(":alt", $alt);
            $this->executeSql();
            $id_main = $this->lastInsertId();
            // en cas d'erreur
            if(Error_Log::isError()) {
                $id_main = 0;
                $this->rollBack();
            } else {
                $this->commit();
            }
            return $id_main;
        }

        public function modImgPrincip(int $id_objet, int $id_img): self {
            $this->beginTransaction();
            $sql = "UPDATE images_objet SET img_principal=0 WHERE id_objet=:id";
            $this->setSql($sql)->setParamInt(":id", $id_objet)->executeSql();
            $sqlPrinc = "UPDATE images_objet SET img_principal=1 WHERE id_image_obj=:id";
            $this->setSql($sqlPrinc)->setParamInt(":id", $id_img)->executeSql();
            // en cas d'erreur
            if(Error_Log::isError()) {
                $this->rollBack();
            } else {
                $this->commit();
            }
            return $this;
        }

        public function findImgId(int $id):string {
            $resulImg = $this->setSql('SELECT src FROM images_objet WHERE id_image_obj=:id')->setParamInt(":id", $id)->fetchAssoc();
            if(!empty($resulImg)) {
                return $resulImg["src"];
            }
            return "";
        }

        public function deleteImg(int $id): self {
            $sql = "DELETE FROM images_objet WHERE id_image_obj=:id";
            $this->setSql($sql)->setParamInt(":id", $id);
            $this->executeSql();
            return $this;
        }

        public function addModObj(int $id, ?string $nom, ?string $contenu, int $id_user, int $id_objet_type, bool $visible = false): int {
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
                $sql = "UPDATE objet SET nom=:nom,contenu=:contenu,id_objet_type=:id_objet_type,validation=:validation WHERE id=:id";
                $this->setSql($sql)
                            ->setParamInt(":id", $id)
                            ->setParamInt(":id_objet_type", $id_objet_type)
                            ->setParamBool(":validation", $visible)
                            ->setParam(":nom", $nom)
                            ->setParam(":contenu", $contenu);
                $this->executeSql();
            } else {
                $sql = "INSERT INTO objet (nom, contenu, id_user, id_objet_type, validation) VALUES (:nom, :contenu, :id_user, :id_objet_type, :validation)";
                $this->setSql($sql)
                            ->setParamInt(":id_user", $id_user)
                            ->setParamInt(":id_objet_type", $id_objet_type)
                            ->setParamBool(":validation", $visible)
                            ->setParam(":nom", $nom)
                            ->setParam(":contenu", $contenu);
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

        public function addModInfo(int $id, int $id_objet, ?string $nom, ?string $info): int {
            $id_main = $id;
            $this->beginTransaction();
            if(!empty($id)) {
                $sql = "UPDATE info_objet SET nom=:nom, info=:info WHERE id=:id";
                $this->setSql($sql)
                            ->setParamInt(":id", $id)
                            ->setParam(":nom", $nom)
                            ->setParam(":info", $info);
                $this->executeSql();
            } else {
                $sql = "INSERT INTO info_objet (id_objet, nom, info) VALUES (:id_objet, :nom, :info)";
                $this->setSql($sql)
                ->setParamInt(":id_objet", $id_objet)
                ->setParam(":nom", $nom)
                ->setParam(":info", $info);
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

