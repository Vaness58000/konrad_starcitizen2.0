<?php
/**
 * Pour lire les informations de l'entreprise.
 * numero d'error de la classe '1003XXXXXX'
 */

if (!class_exists('MessageEmailTxt')) {
    
    /* en cas d'erreur sur la classe */
    include_once dirname(__FILE__) . '/../classMain/Error_Log.php';
    include_once dirname(__FILE__) . '/Config.php';

    /**
     * Creation de la class pour la recuperation des informations de l'entreprise
     */
    class MessageEmailTxt {

        private $object;
        private $message;
        private $errorFile;
        private $lien_message;
        private $lien_modif_pass;
        private $lien_create_pass;

        /**
         * Le contenu du fichier ini
         *
         * @var array du contenu du fichier ini
         */
        private $arrayIni;

        private $nmError;
        private $is_error;
        private $config;

        private $code;
        private $valide_code;

        /**
         * le constructeur par defaut
         */
        public function __construct(?string $file_message = null) {
            $this->nmError = 0;
            $this->is_error = false;
            $this->errorFile = new Error_Log();
            $this->object = "";
            $this->message = "";
            $this->code = "";
            $this->valide_code = "";
            $this->lien_message = "";
            $this->lien_modif_pass = "";
            $this->lien_create_pass = "";
            $this->config = new Config();
            if(empty($file_message)) {
                $file_message = $this->config->getFile_messages();
            }
            if(!empty($file_message) && !empty(trim($file_message))) {
                $file_message = trim($file_message);
                if(!file_exists($file_message)) {
                    $file_message .= ".example";
                }
                if(!file_exists($file_message)) {
                    try {
                        throw new Exception("Impossible de trouver le fichier.\n");
                    } catch (Exception $e) {
                        $this->is_error = true;
                        $this->nmError = 2003000001;
                        $error_message = $e;
                        $this->errorFile->addError($error_message, $this->nmError, $file_message);
                    }
                } else {
                    try {
                        $this->arrayIni = parse_ini_file($file_message, true);
                    } catch (Exception $e) {
                        $this->is_error = true;
                        $this->nmError = 2003000002;
                        $error_message = $e;
                        $this->errorFile->addError($error_message, $this->nmError);
                    }
                }
            } else {
                try {
                    throw new Exception("Il n'y a pas de nom de fichier dans la configuration (pour les messages)\n");
                } catch (Exception $e) {
                    $this->is_error = true;
                    $this->nmError = 2003000000;
                    $error_message = $e;
                    $this->errorFile->addError($error_message, $this->nmError);
                }
            }
            $this->setLien_message($this->config->getLien_message());
            $this->setLien_modif_pass($this->config->getLien_modif_pass());
            $this->setLien_create_pass($this->config->getLienCreatePass());
        }

        /**
         * recuperer le message.
         */
        public function recupeMessage(?string $title):self {
            $this->object = "";
            $this->message = "";
            $this->code = "";
            $this->valide_code = "";
            $this->lien_message = "";
            $this->lien_modif_pass = "";
            $this->lien_create_pass = "";
            $this->setLien_message($this->config->getLien_message());
            $this->setLien_modif_pass($this->config->getLien_modif_pass());
            $this->setLien_create_pass($this->config->getLienCreatePass());
            if(!empty($this->arrayIni) && array_key_exists($title, $this->arrayIni)) {
                if(array_key_exists("object", $this->arrayIni[$title]) && array_key_exists("message", $this->arrayIni[$title])) {
                    $this->object = $this->arrayIni[$title]["object"];
                    $this->message = $this->arrayIni[$title]["message"];
                }
            }
            return $this;
        }

        /**
         * le numero d'erreur
         */ 
        public function getNmError():int
        {
                return $this->nmError;
        }

        /**
         * vifier l'existance d'une erreur
         */ 
        public function getIs_error():bool
        {
                return $this->is_error;
        }

        /**
         * ajouter un code
         *
         * @return  self
         */ 
        public function setCode(?string $code):self
        {
            if(!empty($code)) {
                $this->code = $code;
            } else {
                $this->code = "";
            }
            return $this;
        }

        /**
         * ajouter un code de validation
         *
         * @return  self
         */ 
        public function setValide_code(?string $valide_code):self
        {
            if(!empty($valide_code)) {
                $this->valide_code = $valide_code;
            } else {
                $this->valide_code = "";
            }
            return $this;
        }

        /**
         * modifier le lien pour envoyer un message.
         *
         * @return  self
         */ 
        public function setLien_message(?string $lien_message):self
        {
            if(!empty($lien_message)) {
                $this->lien_message = $lien_message;
            } else {
                $this->lien_message = "";
            }
            return $this;
        }

        /**
         * modifier le lien pour modifier le mot de passe.
         *
         * @return  self
         */ 
        public function setLien_modif_pass(?string $lien_modif_pass):self
        {
            if(!empty($lien_modif_pass)) {
                $this->lien_modif_pass = $lien_modif_pass;
            } else {
                $this->lien_modif_pass = "";
            }
            return $this;
        }

        /**
         * modifier le lien de la creation du mot de passe.
         *
         * @return  self
         */ 
        public function setLien_create_pass(?string $lien_create_pass):self
        {
            if(!empty($lien_create_pass)) {
                $this->lien_create_pass = $lien_create_pass;
            } else {
                $this->lien_create_pass = "";
            }
            return $this;
        }

        /**
         * remplacer les variables dans les messages.
         */
        private function modifText(?string $text):?string {
            if(empty($text)) {
                return "";
            }
            $lien_msg = str_replace("/./", "/", $this->config->lien_page().$this->lien_message);
            $lien_modif_pass = str_replace("/./", "/", $this->config->lien_page()."lelien-admin/".$this->lien_modif_pass);
            $lien_create_pass = str_replace("/./", "/", $this->config->lien_page()."lelien-admin/".$this->lien_create_pass);
            $text = str_replace("{{NAME_SITE}}", $this->config->name_site(), $text);
            $text = str_replace(strtolower("{{NAME_SITE}}"), $this->config->name_site(), $text);
            $text = str_replace("{{LIEN_SITE}}", $this->config->lien_page(), $text);
            $text = str_replace(strtolower("{{LIEN_SITE}}"), $this->config->lien_page(), $text);
            $text = str_replace("{{LIEN_MSG}}", $lien_msg, $text);
            $text = str_replace(strtolower("{{LIEN_MSG}}"), $lien_msg, $text);
            $text = str_replace("{{LIEN_MODIF_PASS}}", $lien_modif_pass, $text);
            $text = str_replace(strtolower("{{LIEN_MODIF_PASS}}"), $lien_modif_pass, $text);
            $text = str_replace("{{LIEN_CREATE_PASS}}", $lien_create_pass, $text);
            $text = str_replace(strtolower("{{LIEN_CREATE_PASS}}"), $lien_create_pass, $text);
            $text = str_replace("{{DATE_VALIDE}}", $this->valide_code, $text);
            $text = str_replace(strtolower("{{DATE_VALIDE}}"), $this->valide_code, $text);
            $text = str_replace("{{CODE}}", $this->code, $text);
            $text = str_replace(strtolower("{{CODE}}"), $this->code, $text);
            $text = str_replace("{{DUREE_VALIDE}}", "2h", $text);
            $text = str_replace(strtolower("{{DUREE_VALIDE}}"), "2h", $text);
            return $text;
        }

        /**
         * recuperer le message.
         */ 
        public function getMessage():?string
        {
                return $this->modifText($this->message);
        }

        /**
         * recuperer l'objet du message
         */ 
        public function getObject():?string
        {
                return $this->modifText($this->object);
        }

    }

}