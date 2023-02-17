<?php 

/**
 * Pour lire les informations de l'entreprise.
 * numero d'error de la classe '1003XXXXXX'
 */

if (!class_exists('Page_contenu')) {
    
    /* en cas d'erreur sur la classe */
    include_once dirname(__FILE__) . '/../classMain/Error_Log.php';

    /**
     * Creation de la class pour la recuperation des informations de l'entreprise
     */
    class Page_contenu {

        private string $html;
        private array $css;
        private array $js;
        private array $variables;
        private $errorFile;

        /**
         * le constructeur par defaut
         */
        public function __construct(?string $file_html) {
            $this->errorFile = new Error_Log();
            try {
                if (is_file($this->$file_html)) {
                    $this->html = file_get_contents($this->$file_html, true);
                }
            } catch (PDOException $e) {
                // en cas d'erreur de connexion, on place le message dans le fichier "errors.log".
                $nmError = 1008000000;
                $error_message = $e;
                $this->errorFile->addError($error_message, $nmError);
            }
        }

        public function addVarArray(?string $name, ?array $value) : self {
            if(!empty($name)) {
                $this->variables[$name] = $value;
            } else {
                array_push($this->variables, $value);
            }
            return $this;
        }

        public function addVarString(?string $name, ?string $value) : self {
            if(!empty($name)) {
                $this->variables[$name] = $value;
            } else {
                array_push($this->variables, $value);
            }
            return $this;
        }

        public function addVarInt(?string $name, int $value) : self {
            if(!empty($name)) {
                $this->variables[$name] = $value;
            } else {
                array_push($this->variables, $value);
            }
            return $this;
        }

        public function addFileCss(?string $file) : self {
            array_push($this->css, $file);
            return $this;
        }

        public function addFileJs(?string $file) : self {
            array_push($this->js, $file);
            return $this;
        }

        public function addFileCssTab(?array $files) : self {
            if(!empty($files)){
                foreach ($files as $value) {
                    array_push($this->css, $value);
                }
            }
            return $this;
        }

        public function addFileJsTab(?array $files) : self {
            if(!empty($files)){
                foreach ($files as $value) {
                    array_push($this->js, $value);
                }
            }
            return $this;
        }



    }

}