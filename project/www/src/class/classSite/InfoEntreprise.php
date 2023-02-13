<?php 

/**
 * Pour lire les informations de l'entreprise.
 * numero d'error de la classe '1003XXXXXX'
 */

if (!class_exists('InfoEntreprise')) {
    
    /* en cas d'erreur sur la classe */
    include_once dirname(__FILE__) . '/../classMain/Error_Log.php';

    /**
     * Creation de la class pour la recuperation des informations de l'entreprise
     */
    class InfoEntreprise {

        private $phone;
        private $address;
        private $address_min;
        private $clock;
        private $site_emploi;
        private $errorFile;
        private $nmError;

        private $is_error;

        /**
         * le constructeur par defaut
         */
        public function __construct(?string $file_info) {
            $this->nmError = 0;
            $this->is_error = false;
            $this->errorFile = new Error_Log();
            $this->phone = "";
            $this->address = "";
            $this->address_min = "";
            $this->clock = "";
            $this->site_emploi = "";
            if(!empty($file_info) && !empty(trim($file_info))) {
                $file_info = trim($file_info);
                if(!file_exists($file_info)) {
                    $file_info .= ".example";
                }
                if(!file_exists($file_info)) {
                    try {
                        throw new Exception("Impossible de trouver le fichier.\n");
                    } catch (Exception $e) {
                        $this->is_error = true;
                        $this->nmError = 1003000001;
                        $error_message = $e;
                        $this->errorFile->addError($error_message, $this->nmError, $file_info);
                    }
                } else {
                    try {
                        $this->tab_info = json_decode(file_get_contents($file_info, true), true);
                        if(array_key_exists("phone", $this->tab_info)) {
                            $this->phone = $this->tab_info["phone"];
                        }
                        if(array_key_exists("address", $this->tab_info)) {
                            $this->address = $this->tab_info["address"];
                        }
                        if(array_key_exists("address_min", $this->tab_info)) {
                            $this->address_min = $this->tab_info["address_min"];
                        }
                        if(array_key_exists("clock", $this->tab_info)) {
                            $this->clock = $this->tab_info["clock"];
                        }
                        if(array_key_exists("site_emploi", $this->tab_info)) {
                            $this->site_emploi = $this->tab_info["site_emploi"];
                        }
                    } catch (Exception $e) {
                        $this->is_error = true;
                        $this->nmError = 1003000002;
                        $error_message = $e;
                        $this->errorFile->addError($error_message, $this->nmError);
                    }
                }
            } else {
                try {
                    throw new Exception("Il n'y a pas de nom de fichier dans la configuration (pour les informations)\n");
                } catch (Exception $e) {
                    $this->is_error = true;
                    $this->nmError = 1003000000;
                    $error_message = $e;
                    $this->errorFile->addError($error_message, $this->nmError);
                }
            }
        }

        /**
         * recuperer le numero de telephone
         */
        public function getPhone():?string {
            return $this->phone;
        }

        /**
         * recuperer l'adresse
         */
        public function getAddress():?string {
            return $this->address;
        }

        /**
         * recuperer le minimum de l'adresse
         */
        public function getAddress_min():?string {
            return $this->address_min;
        }

        /**
         * recuperer les horaires
         */
        public function getClock():?string {
            return $this->clock;
        }

        /**
         * recuperer le lien vers le site de l'emploi.
         */
        public function getSite_emploi():?string {
            return $this->site_emploi;
        }

        /**
         * recuperer le numero d'erreur
         */
        public function getNumError():int {
            return $this->nmError;
        }

        /**
         * savoir si il y a eu une erreur.
         */
        public function isError(): bool {
            return $this->is_error;
        }

    }

}