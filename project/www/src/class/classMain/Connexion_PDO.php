<?php
/**
 * Pour se connecter a la base de donner a partir du fichier "sgbd_config.php".
 * Pouvoir avoir une connexion a la base de donnees differentes.
 * numero d'error de la classe '1005XXXXXX'
 */

// verifier qu'on n'a pas deja creer la fonction
if (!function_exists('Connexion_PDO')) {
    // inculre la classe qui va creer le fichier "errors.log" en cas d'erreur.
    include_once dirname(__FILE__) . '/Error_Log.php';
    include_once dirname(__FILE__) . '/Config_SGBD.php';

    // fonction pour faire la connexion a la base de donnes
    class Connexion_PDO extends PDO {

        /**
         * recuperer le numero d'erreur d'erreur
         *
         * @var int le numero d'erreur d'erreur
         */
        protected $nmError;

        /**
         * la classe pour le fichier d'erreur
         *
         * @var Error_Log la classe pour le fichier d'erreur
         */
        protected $errorFile;

        protected $prefix;

        protected $is_error;

        /**
         * Constructeur par defaut.
         */
        public function __construct(bool $isDatabase = true, ?string $file_config = null) {

            $this->is_error = false;
            $this->nmError = 0;
            
            $this->errorFile = new Error_Log();

            // verifier l'existance du fichier pour ouvrir la base de donnees
            if(file_exists(dirname(__FILE__) . '/../../config/sgbd_config.php')) {
                // recupere les valeurs de connexion a la base de donnees.
                include dirname(__FILE__) . '/../../config/sgbd_config.php';
            }

            $config = new Config_SGBD($file_config);
            $tab_config = $config->getConfig_SGBD();
            $sgbd_type = $tab_config["type"];
            $sgbd_server = $tab_config["server"];
            $sgbd_port = $tab_config["port"];
            $sgbd_name = $tab_config["name"];
            $sgbd_user = $tab_config["user"];
            $sgbd_pass = $tab_config["pass"];
            $sgbd_prefix = $tab_config["prefix"];
            
            // recupere les valeurs de connexion a la base et si null ou vide, on met une valeur par defaut.
            $sgbd_conn_type = !empty($sgbd_type) ? $sgbd_type : "mysql";
            $sgbd_conn_server = !empty($sgbd_server) ? $sgbd_server : "localhost";
            $sgbd_conn_port = !empty($sgbd_port) ? $sgbd_port : "0";
            $sgbd_conn_name = !empty($sgbd_name) ? $sgbd_name : "";
            $sgbd_conn_user = !empty($sgbd_user) ? $sgbd_user : "";
            $sgbd_conn_pass = !empty($sgbd_pass) ? $sgbd_pass : "";
            $this->prefix = !empty($sgbd_prefix) ? $sgbd_prefix : "";

            // creation de la ligne de connexion a placer dans PDO
            $line = $sgbd_conn_type . ':host=' . $sgbd_conn_server;
            // si on a besoin d'un numero de port
            if(!empty($sgbd_conn_port) && $sgbd_conn_port !== "0") {
                $line .= ';port=' . $sgbd_conn_port;
            }
            // si on a le nom de la table
            if(!empty($sgbd_conn_name) && $isDatabase) {
                $line .= ';dbname=' . $sgbd_conn_name;
            }
            // utilisation de l'encodage UTF-8
            $line .= ";charset=UTF8";

            // valeur $sgbd a null par defaut.
            try {
                // verifier qu'on utilise un nom d'utilisateur et un mot de passe.
                if(!empty($sgbd_conn_user) && !empty($sgbd_conn_pass)) {
                    parent::__construct($line, $sgbd_conn_user, $sgbd_conn_pass);
                // si on a seulement un nom d'utilisateur et pas de mot de passe.
                } else if(!empty($sgbd_conn_user)) {
                    parent::__construct($line, $sgbd_conn_user, "");
                // si on n'a aucun des deux.
                } else {
                    parent::__construct($line);
                }
            } catch (PDOException $e) {             
                // en cas d'erreur de connexion, on place le message dans le fichier "errors.log".
                $this->is_error = true;
                $this->nmError = 1005000000;
                $error_message = $e;
                $this->errorFile->addError($error_message, $this->nmError);
            } catch (Exception $e) {  
                // en cas d'erreur de connexion, on place le message dans le fichier "errors.log".
                $this->is_error = true;
                $this->nmError = 1005000001;
                $error_message = $e;
                $this->errorFile->addError($error_message, $this->nmError);
            } catch (ParseError $e) {
                // en cas d'erreur de connexion, on place le message dans le fichier "errors.log".
                $this->is_error = true;
                $this->nmError = 1005000002;
                $error_message = $e;
                $this->errorFile->addError($error_message, $this->nmError);
            }
        }

        /**
         * Si on utilise un prefix pour les tables.
         */
        public function prefix():?string {
            return $this->prefix;
        }

        /**
         * le numero d'erreur.
         */
        public function getNumError():int {
            return $this->nmError;
        }

        /**
         * S'il y a une erreur.
         */
        public function isError(): bool {
            return $this->is_error;
        }
    }
}

