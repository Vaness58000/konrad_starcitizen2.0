<?php

/**
 * Pour lire les configurations du site.
 * numero d'error de la classe '1002XXXXXX'
 */

if (!class_exists('Config')) {

    /* pour lire le fichier ini */
    include_once dirname(__FILE__) . '/../classMain/PathPhp.php';
    include_once dirname(__FILE__) . '/../classMain/ConfigIni.php';

    /**
     * Creation de la class pour la recuperation des configurations
     */
    class Config extends ConfigIni
    {

        private $file_info;
        private $file_messages;
        private $lien_template;
        private $style_template;
        private $folder_img;
        private $lien_img;
        private $routage;
        private $lien_template_admin;
        private $style_template_admin;
        private $lien_message;
        private $lien_modif_pass;
        private $lien_create_pass;
        private $emails;
        private $emailsContact;
        private $emailsDev;

        /**
         * le constructeur par defaut
         */
        public function __construct(?string $file_config = null)
        {
            parent::__construct($file_config);
            $this->emails = array();
            $this->emailsContact = "";
            $this->emailsDev = "";
            $this->file_info = "";
            $this->file_messages = "";
            $this->lien_img = "../img/";
            $this->folder_img = "./../img/";
            $this->lien_template = "./template/{style_template}/";
            $this->lien_template_admin = "./template/{style_template}/";
            $this->style_template = "default";
            $this->style_template_admin = "default";
            $this->lien_message = "./#contact";
            $this->lien_modif_pass = "./connexion/modifpasse/?code={{CODE}}";
            $this->lien_create_pass = "./connexion/createpasse/?code={{CODE}}";
            $this->routage = true;
            // emplacement par defaut du fichier
            if (array_key_exists("configDefault", $this->arrayIni) && $this->nmError === 0) {
                if (array_key_exists("file_json_info_entreprise", $this->arrayIni["configDefault"])) {
                    $this->file_info = $this->arrayIni["configDefault"]["file_json_info_entreprise"];
                    $this->initConfigInfo();
                }
                if (array_key_exists("email_text", $this->arrayIni["configDefault"])) {
                    $this->file_messages = $this->arrayIni["configDefault"]["email_text"];
                    $this->initConfigMessages();
                }
                if (array_key_exists("style_template", $this->arrayIni["configDefault"])) {
                    $this->style_template = $this->arrayIni["configDefault"]["style_template"];
                }
                
                if (array_key_exists("style_template_admin", $this->arrayIni["configDefault"])) {
                    $this->style_template_admin = $this->arrayIni["configDefault"]["style_template_admin"];
                }
                if (array_key_exists("routage", $this->arrayIni["configDefault"])) {
                    $this->routage = strtolower($this->arrayIni["configDefault"]["routage"]) == "true";
                }
                if (array_key_exists("folder_img", $this->arrayIni["configDefault"])) {
                    $this->folder_img = strtolower($this->arrayIni["configDefault"]["folder_img"]);
                }
                if (array_key_exists("lien_img", $this->arrayIni["configDefault"])) {
                    $this->lien_img = strtolower($this->arrayIni["configDefault"]["lien_img"]);
                }
                if (array_key_exists("lien_message", $this->arrayIni["configDefault"])) {
                    $this->lien_message = strtolower($this->arrayIni["configDefault"]["lien_message"]);
                }
                if (array_key_exists("lien_modif_pass", $this->arrayIni["configDefault"])) {
                    $this->lien_modif_pass = strtolower($this->arrayIni["configDefault"]["lien_modif_pass"]);
                }
                if (array_key_exists("lien_create_pass", $this->arrayIni["configDefault"])) {
                    $this->lien_create_pass = strtolower($this->arrayIni["configDefault"]["lien_create_pass"]);
                }
                if (array_key_exists("emails", $this->arrayIni["configDefault"])) {
                    $tab = explode(";", strtolower($this->arrayIni["configDefault"]["emails"]));
                    foreach ($tab as $value) {
                        if(!empty($value)) {
                            $this->emails[] = $value;
                        }
                    }
                }
                if (array_key_exists("emailsContact", $this->arrayIni["configDefault"])) {
                    $this->emailsContact = strtolower($this->arrayIni["configDefault"]["emailsContact"]);
                }
                if (array_key_exists("emailsDev", $this->arrayIni["configDefault"])) {
                    $this->emailsDev = strtolower($this->arrayIni["configDefault"]["emailsDev"]);
                }
            }
            $this->lien_template = str_replace("{style_template}", $this->style_template, $this->lien_template);
            $this->lien_template_admin = str_replace("{style_template}", $this->style_template_admin, $this->lien_template_admin);
        }

        /**
         * initialiser les configurations.
         */
        private function initConfigInfo():self
        {
            if (!empty($this->file_info) && !empty(trim($this->file_info))) {
                $this->file_info = trim($this->file_info);
                if (stripos($this->file_info, '../')  === 0) {
                    $this->file_info = $this->pathParent() . $this->file_info;
                }
                if (stripos($this->file_info, './')  === 0) {
                    $this->file_info = $this->pathParent() . PathPhp::currentPath($this->file_info);
                }
            } else {
                try {
                    throw new Exception("Il n'y a pas de nom de fichier dans la configuration (pour les informations)\n");
                } catch (Exception $e) {
                    $this->is_error = true;
                    $this->nmError = 1002000000;
                    $error_message = $e;
                    $this->errorFile->addError($error_message, $this->nmError);
                }
            }
            return $this;
        }

        /**
         * initialiser les messages.
         */
        private function initConfigMessages():self
        {
            if (!empty($this->file_messages) && !empty(trim($this->file_messages))) {
                $this->file_messages = trim($this->file_messages);
                if (stripos($this->file_messages, '../')  === 0) {
                    $this->file_messages = $this->pathParent() . $this->file_messages;
                }
                if (stripos($this->file_messages, './')  === 0) {
                    $this->file_messages = $this->pathParent() . PathPhp::currentPath($this->file_messages);
                }
            } else {
                try {
                    throw new Exception("Il n'y a pas de nom de fichier dans la configuration (pour les messages)\n");
                } catch (Exception $e) {
                    $this->is_error = true;
                    $this->nmError = 1002000001;
                    $error_message = $e;
                    $this->errorFile->addError($error_message, $this->nmError);
                }
            }
            return $this;
        }

        /**
         * recuperer le nom du site (le nom de domaine)
         */
        public function name_site():?string
        {
            if(!array_key_exists('HTTP_HOST', $_SERVER)) {
                return "";
            }
            return $_SERVER['HTTP_HOST'];
        }

        /**
         * recuperer le lien du site
         */
        public function lien_page():?string
        {
            if(!array_key_exists('REQUEST_SCHEME', $_SERVER) || !array_key_exists('HTTP_HOST', $_SERVER)) {
                return "";
            }
            return $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].'/';
        }

        /**
         * recuperer le lien des images
         */
        public function getLien_img(): ?string
        {
            return $this->lien_img;
        }

        /**
         * recuperer le dossier des images
         */
        public function getFolder_img(): ?string
        {
            return $this->folder_img;
        }

        /**
         * recuperer le fichier d'information.
         */
        public function getFile_info(): ?string
        {
            return $this->file_info;
        }

        /**
         * Recuperer le lien du template.
         */
        public function getLienTemplate(): ?string
        {
            return $this->lien_template;
        }

        /**
         * recuperer le style du template
         */
        public function getStyleTemplate(): ?string
        {
            return $this->style_template;
        }

        /**
         * Recuperer le lien du template admin.
         */
        public function getLienTemplateAdmin(): ?string
        {
            return $this->lien_template_admin;
        }

        /**
         * recuperer le style du template admin
         */
        public function getStyleTemplateAdmin(): ?string
        {
            return $this->style_template_admin;
        }

        /**
         * recuperer le routage des pages
         */
        public function getRoutage():bool
        {
            return $this->routage;
        }

        /**
         * recuperer le fichier des messages
         */ 
        public function getFile_messages():?string
        {
            return $this->file_messages;
        }

        /**
         * recuperer le lien des messages
         */ 
        public function getLien_message():?string
        {
            return $this->lien_message;
        }

        /**
         * le lien pour modifier le mot de passe
         */ 
        public function getLien_modif_pass():?string
        {
            return $this->lien_modif_pass;
        }

        /**
         * le lien pour creer le mot de passe
         */
        public function getLienCreatePass():?string
        {
            return $this->lien_create_pass;
        }

        /**
         * adresse email de l'entreprise.
         */
        public function getEmails():?array
        {
                return $this->emails;
        }

        /**
         * adresse email de contact
         */
        public function getEmailsContact():?string
        {
                return $this->emailsContact;
        }

        /**
         * adresse email du developpeur.
         */
        public function getEmailsDev():?string
        {
                return $this->emailsDev;
        }
}
    }
