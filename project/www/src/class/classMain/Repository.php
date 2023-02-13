<?php
/**
 * Pour se connecter a la base de donner a partir du fichier "sgbd_config.php".
 * Pouvoir avoir une connexion a la base de donnees differentes.
 * numero d'error de la classe '1005XXXXXX'
 * $id = $sgbd->lastInsertId();
 */

// verifier qu'on n'a pas deja creer la fonction
if (!function_exists('Repository')) {
    // inculre la classe qui va creer le fichier "errors.log" en cas d'erreur.
    include_once dirname(__FILE__) . '/Connexion_PDO.php';
    include_once dirname(__FILE__) . '/Error_Log.php';

    // fonction pour faire la connexion a la base de donnes
    class Repository extends Connexion_PDO {

        private $sql;
        protected $params;

        /**
         * le constructeur par defaut.
         */
        public function __construct(bool $isDatabase = true, ?string $file_config = null) {
            parent::__construct($isDatabase, $file_config);
            $this->is_error = false;
            $this->nmError = 0;
            $this->errorFile = new Error_Log();
            $this->sql = "";
            $this->params = array();
        }

        /**
         * recuperer la requete
         */
        public function setSql(?string $sql):self {
            if(!empty($sql)) {
                $this->sql = $sql;
                $this->params = array();
            }
            return $this;
        }

        /**
         * securiser la chaine de caractere a transmettre dans la base.
         */
        private function securiteValue(?string $value):?string {
            if(empty($value)) {
                return "";
            }
            return htmlspecialchars(stripslashes(trim($value)));
        }

        /**
         * placer un parametre (int) pour la requete
         */
        public function setParamInt(?string $key, int $value):self {
            $this->setParam($key, strval($value));
            return $this;
        }

        /**
         * placer un parametre (boolean) pour la requete
         */
        public function setParamBool(?string $key, bool $value):self {
            $valueBool = $value ? "1" : "0";
            $this->setParam($key, $valueBool);
            return $this;
        }

        /**
         * placer un parametre (string) pour la requete
         */
        public function setParam(?string $key, ?string $value):self {
            if(!empty($key) && isset($value)) {
                if(trim($value) == "0") {
                    $this->params[$key] = "0";
                } else {
                    $this->params[$key] = $this->securiteValue($value);
                }
            } else if(!empty($key)) {
                $this->params[$key] = "";
            } else if(isset($value)) {
                $this->params[] = $this->securiteValue($value);
            } 
            return $this;
        }

        /**
         * Recuperer un tableau de plusieurs lignes
         */
        public function fetchAllAssoc():array {
            if($this->nmError == 0 && !empty($this->sql) && !$this->is_error && !Error_Log::isError()) {
                try {
                    $sth = $this->prepare($this->sql);
                    $sth->execute($this->params);
                    $values = $sth->fetchAll(PDO::FETCH_ASSOC);
                    if($values !== false) {
                        return $values;
                    } else{
                        return array();
                    }
                } catch (PDOException $e) {
                    // en cas d'erreur de connexion, on place le message dans le fichier "errors.log".
                    $this->is_error = true;
                    $this->nmError = 1007000000;
                    $error_message = $e;
                    $this->errorFile->addError($error_message, $this->nmError);
                } catch (Exception $e) {
                    // en cas d'erreur de connexion, on place le message dans le fichier "errors.log".
                    $this->is_error = true;
                    $this->nmError = 1007000001;
                    $error_message = $e;
                    $this->errorFile->addError($error_message, $this->nmError);
                } catch (ParseError $e) {
                    // en cas d'erreur de connexion, on place le message dans le fichier "errors.log".
                    $this->is_error = true;
                    $this->nmError = 1007000002;
                    $error_message = $e;
                    $this->errorFile->addError($error_message, $this->nmError);
                }
            }
            return array();
        }

        /**
         * Recuperer un tableau d'une seule ligne
         */
        public function fetchAssoc():array {
            if($this->nmError == 0 && !empty($this->sql) && !$this->is_error && !Error_Log::isError()) {
                try {
                    $sth = $this->prepare($this->sql);
                    $sth->execute($this->params);
                    $values = $sth->fetch(PDO::FETCH_ASSOC);
                    if($values !== false) {
                        return $values;
                    } else{
                        return array();
                    }
                } catch (PDOException $e) {
                    // en cas d'erreur de connexion, on place le message dans le fichier "errors.log".
                    $this->is_error = true;
                    $this->nmError = 1007000003;
                    $error_message = $e;
                    $this->errorFile->addError($error_message, $this->nmError);
                } catch (Exception $e) {
                    // en cas d'erreur de connexion, on place le message dans le fichier "errors.log".
                    $this->is_error = true;
                    $this->nmError = 1007000004;
                    $error_message = $e;
                    $this->errorFile->addError($error_message, $this->nmError);
                } catch (ParseError $e) {
                    // en cas d'erreur de connexion, on place le message dans le fichier "errors.log".
                    $this->is_error = true;
                    $this->nmError = 1007000005;
                    $error_message = $e;
                    $this->errorFile->addError($error_message, $this->nmError);
                }
            }
            return array();
        }

        /**
         * Executer le sql
         */
        public function executeSql():self {
            if($this->nmError == 0 && !empty($this->sql) && !$this->is_error && !Error_Log::isError()) {
                try {
                    $sth = $this->prepare($this->sql);
                    $sth->execute($this->params);
                } catch (PDOException $e) {
                    // en cas d'erreur de connexion, on place le message dans le fichier "errors.log".
                    $this->is_error = true;
                    $this->nmError = 1007000009;
                    $error_message = $e;
                    $this->errorFile->addError($error_message, $this->nmError);
                } catch (Exception $e) {
                    // en cas d'erreur de connexion, on place le message dans le fichier "errors.log".
                    $this->is_error = true;
                    $this->nmError = 1007000010;
                    $error_message = $e;
                    $this->errorFile->addError($error_message, $this->nmError);
                } catch (ParseError $e) {
                    // en cas d'erreur de connexion, on place le message dans le fichier "errors.log".
                    $this->is_error = true;
                    $this->nmError = 1007000011;
                    $error_message = $e;
                    $this->errorFile->addError($error_message, $this->nmError);
                }
            }
            return $this;
        }

        /**
         * compte le nombre de ligne.
         */
        public function rowCount():int{
            if($this->nmError == 0 && !empty($this->sql) && !$this->is_error && !Error_Log::isError()) {
                try {
                    $sth = $this->prepare($this->sql);
                    $sth->execute($this->params);
                    return $sth->rowCount();
                } catch (PDOException $e) {
                    // en cas d'erreur de connexion, on place le message dans le fichier "errors.log".
                    $this->is_error = true;
                    $this->nmError = 1007000006;
                    $error_message = $e;
                    $this->errorFile->addError($error_message, $this->nmError);
                } catch (Exception $e) {
                    // en cas d'erreur de connexion, on place le message dans le fichier "errors.log".
                    $this->is_error = true;
                    $this->nmError = 1007000007;
                    $error_message = $e;
                    $this->errorFile->addError($error_message, $this->nmError);
                } catch (ParseError $e) {
                    // en cas d'erreur de connexion, on place le message dans le fichier "errors.log".
                    $this->is_error = true;
                    $this->nmError = 1007000008;
                    $error_message = $e;
                    $this->errorFile->addError($error_message, $this->nmError);
                }
            }
            return 0;
        }

    }
}