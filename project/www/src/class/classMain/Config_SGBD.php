<?php
/**
 * Pour configurer la base de donnees
 */

if (!class_exists('Config_SGBD')) {

    /* pour lire le fichier ini */
    include_once dirname(__FILE__) . '/ConfigIni.php';
    include_once dirname(__FILE__) . '/SGBD_crypt.php';

    /**
     * Pour configurer la base de donnees
     */
    class Config_SGBD extends ConfigIni {

        private $config_SGBD;
        private $sgbd_crypt;

        /**
         * le constructeur par defaut
         */
        public function __construct(?string $file_config = null) {
            parent::__construct($file_config);
            $key1 = "";
            $key2 = "";
            if(array_key_exists("keyPrivate", $this->arrayIni) && $this->nmError === 0) {
                if(array_key_exists("key1", $this->arrayIni["keyPrivate"])) {
                    $key1 = $this->arrayIni["keyPrivate"]["key1"];
                }
                if(array_key_exists("key2", $this->arrayIni["keyPrivate"])) {
                    $key2 = $this->arrayIni["keyPrivate"]["key2"];
                }
            }
            $this->sgbd_crypt = new SGBD_crypt($key1, $key2);
            $this->initConfigSGBD();
            
        }

        /**
         * Crypter le mot de passe de la base de donnees.
         */
        public function cryptPass(?string $text):?string {
            return $this->sgbd_crypt->encrypt($text);
        }

        /**
         * initialiser les valeurs de la base de donnees.
         */
        private function initConfigSGBD():self {
            $this->config_SGBD = ["type" => "mysql",
            "server" => "localhost",
            "port" => "0",
            "name" => "",
            "user" => "",
            "pass" => "",
            "prefix" => ""];
            // emplacement par defaut du fichier
            if(array_key_exists("sgbd", $this->arrayIni) && $this->nmError === 0) {
                if(array_key_exists("type", $this->arrayIni["sgbd"])) {
                    $this->config_SGBD["type"] = $this->arrayIni["sgbd"]["type"];
                }
                if(array_key_exists("server", $this->arrayIni["sgbd"])) {
                    $this->config_SGBD["server"] = $this->arrayIni["sgbd"]["server"];
                }
                if(array_key_exists("port", $this->arrayIni["sgbd"])) {
                    $this->config_SGBD["port"] = $this->arrayIni["sgbd"]["port"];
                }
                if(array_key_exists("name", $this->arrayIni["sgbd"])) {
                    $this->config_SGBD["name"] = $this->arrayIni["sgbd"]["name"];
                }
                if(array_key_exists("user", $this->arrayIni["sgbd"])) {
                    $this->config_SGBD["user"] = $this->arrayIni["sgbd"]["user"];
                }
                if(array_key_exists("pass", $this->arrayIni["sgbd"])) {
                    $this->config_SGBD["pass"] = $this->sgbd_crypt->decrypt($this->arrayIni["sgbd"]["pass"]);
                }
                if(array_key_exists("prefix", $this->arrayIni["sgbd"])) {
                    $this->config_SGBD["prefix"] = $this->arrayIni["sgbd"]["prefix"];
                }
            }
            return $this;
        }

        /**
         * Recuperer les configurations de la base de donnees.
         */
        public function getConfig_SGBD():?array {
            return $this->config_SGBD;
        }
        
    }

}