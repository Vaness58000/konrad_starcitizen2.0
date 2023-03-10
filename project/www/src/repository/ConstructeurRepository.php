<?php

// verifier qu'on n'a pas deja creer la fonction
if (!class_exists('ConstructeurRepository')) {
    // inculre la classe qui va creer le fichier "errors.log" en cas d'erreur.
    include_once dirname(__FILE__) . '/../class/classMain/Repository.php';

    // fonction pour faire la connexion a la base de donnes
    class ConstructeurRepository extends Repository {

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
            return $this->setSql('SELECT * FROM constructeur')->fetchAllAssoc();
        }


        public function findAllOrder(bool $orderName = false):array {
            $order = "constructeur.id_constructeur DESC";
            if($orderName) {
                $order = "constructeur.nom";
            }
            return $this->setSql('SELECT * FROM constructeur '.
                'INNER JOIN utilisateurs ON utilisateurs.id_user = constructeur.id_user ORDER BY '.$order)->fetchAllAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findAllAndUser():array {
            return $this->setSql('SELECT * FROM utilisateurs '.
                'INNER JOIN articles ON utilisateurs.id_user = articles.id_user')->fetchAllAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findAllAndIdUser($id):array {
            return $this->setSql('SELECT * FROM constructeur '.
                'INNER JOIN utilisateurs ON utilisateurs.id_user = constructeur.id_user '.
                'WHERE constructeur.id_constructeur=:id_const')
                ->setParamInt(":id_const", $id)->fetchAssoc();
        }

        public function findAllAndIdConstructeur($id):array {
            return $this->setSql('SELECT * FROM constructeur '.
                'WHERE constructeur.id_constructeur=:id_const')
                ->setParamInt(":id_const", $id)->fetchAssoc();
        }

        /**
         * Recuperer toutes les donnees visibles de la table
         */
        public function findAllImgArticle(int $id):array {
            return $this->setSql('SELECT * FROM articles_image WHERE id_article=:id_article')->setParamInt(":id_article", $id)->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserIdPage(int $id, int $nmPage=0, int $nbArtPage=0):array {
            $limit = "";
            if(!empty($nbArtPage)) {
                $nmStart = $nmPage*$nbArtPage;
                $limit = " LIMIT $nbArtPage OFFSET $nmStart";
            }
            $sql = 'SELECT * FROM constructeur '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = constructeur.id_user '.
                    'WHERE utilisateurs.id_user=:id_user ORDER BY constructeur.id_constructeur DESC'.$limit.'';
            return $this->setSql($sql)
                        ->setParamInt(":id_user", $id)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserIdCount(int $id):int {
            $sql = 'SELECT * FROM constructeur '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = constructeur.id_user '.
                    'WHERE utilisateurs.id_user=:id_user ORDER BY constructeur.id_constructeur DESC';
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
            $sql = 'SELECT * FROM constructeur '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = constructeur.id_user '.
                    'ORDER BY constructeur.id_constructeur DESC'.$limit.'';
            return $this->setSql($sql)
                        ->fetchAllAssoc();
        }

        /*Pour relier l'utilisateur au article*/
        public function findAllAndUserCount():int {
            $sql = 'SELECT * FROM constructeur '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = constructeur.id_user '.
                    'ORDER BY constructeur.id_constructeur DESC';
            return $this->setSql($sql)
                        ->rowCount();
        }

        public function findAllIdAndLieux(int $id):array {
            $sql = 'SELECT *, objet.id AS id_obj, constructeur_lieu.id AS id_const_lieu, objet.nom AS nom_lieu FROM objet '.
                    'INNER JOIN lieux ON lieux.id_objet = objet.id '.
                    'INNER JOIN constructeur_lieu ON constructeur_lieu.id_lieu = lieux.id_lieu '.
                    'INNER JOIN utilisateurs ON utilisateurs.id_user = objet.id_user '.
                    'WHERE constructeur_lieu.id_constructeur=:id && objet.validation=1 ORDER BY constructeur_lieu.id DESC';
            return $this->setSql($sql)
                        ->setParamInt(":id", $id)
                        ->fetchAllAssoc();
        }

        public function findLieuConstLieuId(int $id):array {
            $sql = 'SELECT * FROM constructeur_lieu WHERE id=:id';
            return $this->setSql($sql)
                        ->setParamInt(":id", $id)
                        ->fetchAllAssoc();
        }

        public function visible(int $id, bool $visible): self {
            $sql = "UPDATE constructeur SET validation=:visible WHERE id_constructeur=:id";
            $this->setSql($sql)->setParamInt(":id", $id)->setParamBool(":visible", $visible)->executeSql();
            return $this;
        }

        public function nameValid(int $id, string $name):bool {
            return $this->setSql('SELECT * FROM constructeur WHERE nom=:nom AND id_constructeur!=:id')
                    ->setParamInt(":id", $id)->setParam(":nom", $name)->rowCount() == 0;
        }
        
        public function addMod(int $id, string $name, string $contenu, int $id_user, bool $visible, string $logo = null, string $image = null): int {
            $id_main = $id;
            if(!empty($logo) || !empty($image)) {
                $id_main = $this->addModImg($id, $name, $contenu, $id_user, $visible, $logo, $image);
            } else {
                $id_main = $this->addModNoImg($id, $name, $contenu, $id_user, $visible);
            }
            return $id_main;
        }

        private function addModImg(int $id, string $name, string $contenu, int $id_user, bool $visible, string $logo, string $image): int {
            $id_main = $id;
            $this->beginTransaction();
            if(!empty($id)) {
                $sqlAddImg = "";
                if(!empty($logo)) {
                    $sqlAddImg .= "logo=:logo,";
                }
                if(!empty($image)) {
                    $sqlAddImg .= "image=:image,";
                }
                $sql = "UPDATE constructeur SET nom=:nom,".$sqlAddImg."contenu=:contenu,validation=:validation WHERE id_constructeur=:id";
                $this->setSql($sql)
                            ->setParamInt(":id", $id)
                            ->setParamBool(":validation", $visible)
                            ->setParam(":contenu", $contenu)
                            ->setParam(":nom", $name);
                if(!empty($image)) {
                    $this->setParam(":image", $image);
                }
                if(!empty($logo)) {
                    $this->setParam(":logo", $logo);
                }
                $this->executeSql();
            } else {
                $sqlAddImg = "";
                $sqlAddValueImg = "";
                if(!empty($logo)) {
                    $sqlAddImg .= "logo, ";
                    $sqlAddValueImg .= ":logo, ";
                }
                if(!empty($image)) {
                    $sqlAddImg .= "image, ";
                    $sqlAddValueImg .= ":image, ";
                }
                $sql = "INSERT INTO constructeur(nom, ".$sqlAddImg."contenu, id_user, validation) VALUES (:nom, ".$sqlAddValueImg.":contenu, :id_user, :validation)";
                $this->setSql($sql)
                            ->setParamInt(":id_user", $id_user)
                            ->setParamBool(":validation", $visible)
                            ->setParam(":contenu", $contenu)
                            ->setParam(":nom", $name);
                if(!empty($image)) {
                    $this->setParam(":image", $image);
                }
                if(!empty($logo)) {
                    $this->setParam(":logo", $logo);
                }
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

        private function addModNoImg(int $id, string $name, string $contenu, int $id_user, bool $visible): int {
            $id_main = $id;
            $this->beginTransaction();
            if(!empty($id)) {
                $sql = "UPDATE constructeur SET nom=:nom,contenu=:contenu,validation=:validation WHERE id_constructeur=:id";
                $this->setSql($sql)
                            ->setParamInt(":id", $id)
                            ->setParamBool(":validation", $visible)
                            ->setParam(":contenu", $contenu)
                            ->setParam(":nom", $name);
                $this->executeSql();
            } else {
                $sql = "INSERT INTO constructeur(nom, contenu, id_user, validation) VALUES (:nom, :contenu, :id_user, :validation)";
                $this->setSql($sql)
                            ->setParamInt(":id_user", $id_user)
                            ->setParamBool(":validation", $visible)
                            ->setParam(":contenu", $contenu)
                            ->setParam(":nom", $name);
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
            $sql = "DELETE FROM constructeur WHERE id_constructeur=:id";
            $this->setSql($sql)->setParamInt(":id", $id);
            $this->executeSql();
            return $this;
        }

        public function findImgId(int $id):string {
            $resulImg = $this->setSql('SELECT image FROM constructeur WHERE id_constructeur=:id')->setParamInt(":id", $id)->fetchAssoc();
            if(!empty($resulImg)) {
                return $resulImg["image"];
            }
            return "";
        }

        public function findImgLogoId(int $id):string {
            $resulImg = $this->setSql('SELECT logo FROM constructeur WHERE id_constructeur=:id')->setParamInt(":id", $id)->fetchAssoc();
            if(!empty($resulImg)) {
                return $resulImg["logo"];
            }
            return "";
        }

        public function addModLieu(int $id, int $id_construct, int $id_lieu): int {
            $id_main = $id;
            if(!empty($id)) {
                $sql = "UPDATE constructeur_lieu SET id_lieu=:id_lieu WHERE id=:id";
                $this->setSql($sql)
                            ->setParamInt(":id", $id)
                            ->setParamInt(":id_lieu", $id_lieu);
                $this->executeSql();
            } else {
                $sql = "INSERT INTO constructeur_lieu (id_constructeur, id_lieu) VALUES (:id_constructeur, :id_lieu)";
                $this->setSql($sql)
                            ->setParamInt(":id_constructeur", $id_construct)
                            ->setParamInt(":id_lieu", $id_lieu);
                $this->executeSql();
                $id_main = $this->lastInsertId();
            }
            return $id_main;
        }

        public function deleteLieuConstruct(int $id): self {
            $sql = "DELETE FROM constructeur_lieu WHERE id=:id";
            $this->setSql($sql)->setParamInt(":id", $id);
            $this->executeSql();
            return $this;
        }
    }
}

