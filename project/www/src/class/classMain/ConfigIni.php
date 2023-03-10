<?php
/**
 * Pour lire le fichier avec les configurations du site.
 * numero d'error de la classe '1001XXXXXX'
 */

if (!class_exists('ConfigIni')) {

    /* en cas d'erreur sur la classe */
    include_once dirname(__FILE__) . '/Error_Log.php';
    include_once dirname(__FILE__) . '/PathPhp.php';

    /* recuperer l'emplacement du fichier de configuration */
    if (!defined('RACINE_CONFIG_INI') && file_exists(dirname(__FILE__) . '/../../config/config.php')) {
        include_once dirname(__FILE__) . '/../../config/config.php';
    } else if (!defined('RACINE_CONFIG_INI') && !file_exists(dirname(__FILE__) . '/../../config/config.php')) {
        define("RACINE_CONFIG_INI", dirname(__FILE__)."/../../config/");
    }

    /**
     * Creation de la class pour la lecture du fichier ini avec les configurations
     */
    class ConfigIni {

        /*
            les variables de la classe
        */
        /**
         * Le contenu du fichier ini
         *
         * @var array du contenu du fichier ini
         */
        protected $arrayIni;

        /**
         * la classe pour le fichier d'erreur
         *
         * @var Error_Log la classe pour le fichier d'erreur
         */
        protected $errorFile;

        /**
         * recuperer le numero d'erreur d'erreur
         *
         * @var int le numero d'erreur d'erreur
         */
        protected $nmError;

        protected $is_error;



        /**
         * le constructeur par defaut
         */
        public function __construct(?string $file_config = null) {
            $this->nmError = 0;
            $this->is_error = false;
            $this->errorFile = new Error_Log();
            if(empty($file_config)) {
                // recuperer le fichier de configuration
                $file_config = PathPhp::path(RACINE_CONFIG_INI, "config_def.ini");
            } else {
                $file_config = PathPhp::path(dirname(__FILE__), $file_config);
            }
            if(!file_exists($file_config)) {
                $file_config .= ".example";
            }
            // en cas d'erreur
            if(!file_exists($file_config)) {
                try {
                    throw new Exception("Le fichier de configuration n'a pas ete trouve.\n");
                } catch (Exception $e) {
                    $this->is_error = true;
                    $this->arrayIni = array();
                    $this->nmError = 1001000000;
                    $error_message = $e;
                    $this->errorFile->addError($error_message, $this->nmError, $file_config);
                }
            } else {
                try {
                    $this->arrayIni = parse_ini_file($file_config, true);
                } catch (Exception $e) {
                    $this->is_error = true;
                    $this->arrayIni = array();
                    $this->nmError = 1001000001;
                    $error_message = $e;
                    $this->errorFile->addError($error_message, $this->nmError, $file_config);
                }
            }

        }

        /**
         * Recuperer le dossier parent.
         */
        public function pathParent():?string {
            return RACINE_CONFIG_INI;
        }

        /**
         * Recuperer le numero d'erreur.
         */
        public function getNumError():int {
            return $this->nmError;
        }

        /**
         * Verifier s'il y a eu une erreur.
         */
        public function isError(): bool {
            return $this->is_error;
        }
    }

}
