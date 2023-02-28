<?php
/**
 * Pour la creation d'un fichier "errors.log" avec les messages d'erreurs rencontres.
 */
if (!class_exists('Error_Log')) {

    /* recuperer l'emplacement du fichier de configuration */
    if (!defined('ERROR_LOG') && file_exists(dirname(__FILE__) . '/../../config/config.php')) {
        include dirname(__FILE__) . '/../../config/config.php';
    } else if (!defined('ERROR_LOG') && !file_exists(dirname(__FILE__) . '/../../config/config.php')) {
        define("ERROR_LOG", dirname(__FILE__)."/../../../errors.log");
    }

    $_POST['is_error'] = false;

    /**
     * Pour les contenir tous les logs rencontres dans les pages.
     */
    class Error_Log {

        private static $separeError = "------------------------------------------------------------------------------------\n";

        // les variable de la classe
        private $logFile;

        /**
         * constructeur par defaut.
         */
        public function __construct() {
            $this->logFile = ERROR_LOG;
        }

        /**
         * Creation ou modification du fichier d'erreur, avec l'erreur rencontre.
         *
         * @param string|null ($message) : Le message d'erreur.
         * @return void ne retourne rien.
         */
        public function addError(?string $message, int $nmerror = 0, ?string $file = null): self {
            $_POST['is_error'] = true;
            if(empty($message)) {
                $message = "{EMPTY}";
            }
            $ligne = Error_Log::$separeError;
            $ligne .= ";##;date : " . date('Y-m-d H:i:s') . "\n";
            if(!empty($nmerror)) {
                $ligne .= ";##;nmerror : " . $nmerror . "\n";
            }
            if(!empty($file)) {
                $ligne .= ";##;file : " . $file . "\n";
            }
            $ligne .= ";##;lien : " . $this->lienPage() . "\n";
            $ligne .= ";##;global : " . $this->tabGlobal() . "\n";
            $ligne .= ";##;message : " . $message . "\n";
            error_log($ligne, 3, $this->logFile);
            return $this;
        }

        /**
         * recuperer le lien de la page
         */
        private function lienPage():?string {
            if(array_key_exists('HTTP_HOST', $_SERVER) && array_key_exists('REQUEST_URI', $_SERVER)) {
                return $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            }
            return "";
        }

        /**
         * recuperer la table global
         */
        private function tabGlobal():?string {
            $server = $_SERVER;
            if(array_key_exists('REMOTE_ADDR', $server)) {
                unset($server['REMOTE_ADDR']);
            }
            if(array_key_exists('SERVER_ADDR', $server)) {
                unset($server['SERVER_ADDR']);
            }
            if(array_key_exists('SERVER_PORT', $server)) {
                unset($server['SERVER_PORT']);
            }
            $globalsValue = [
                "_GET" => $_GET,
                "_POST" => $_POST,
                "_COOKIE" => $_COOKIE,
                "_FILES" => $_FILES,
                "_ENV" => $_ENV,
                "_REQUEST" => $_REQUEST,
                "_SERVER" => $server
                ];
            if(!empty($_SESSION)) {
                $globalsValue["_SESSION"] = $_SESSION;
            }
            return json_encode($globalsValue, true);
        }

        /**
         * recupere les erreurs contenu dans la fichier du fichier.
         */
        public static function load():?array {
            if(is_file(ERROR_LOG)) {
                $contenu = array_reverse(explode(Error_Log::$separeError, file_get_contents(ERROR_LOG, true)));
                for($i = count($contenu)-1; $i >= 0; $i--) {
                    if(empty(trim($contenu[$i]))) {
                        unset($contenu[$i]);
                    } else {
                        $infosError = array();
                        $oneErro = explode(";##;", $contenu[$i]);
                        for($j = 0; $j < count($oneErro); $j++) {
                            if(!empty(trim($oneErro[$j]))) {
                                $infoErro = explode(" : ", $oneErro[$j], 2);
                                if($infoErro[0] === "global") {
                                    $infosError[$infoErro[0]] = json_decode($infoErro[1], true);
                                } else {
                                    $infosError[$infoErro[0]] = $infoErro[1];
                                }
                            }
                        }
                        $contenu[$i] = $infosError;
                    }
                }
                return array_values($contenu);
            }
            return array();
        }

        /**
         * Verifier si il y a eu une erreur.
         */
        public static function isError():bool {
            return $_POST['is_error'];
        }

    }
}
