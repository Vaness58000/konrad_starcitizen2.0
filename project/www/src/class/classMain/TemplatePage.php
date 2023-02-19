<?php 

/**
 * Pour lire les informations de l'entreprise.
 * numero d'error de la classe '1003XXXXXX'
 */

if (!class_exists('TemplatePage')) {
    
    /* en cas d'erreur sur la classe */
    include_once dirname(__FILE__) . '/Error_Log.php';

    /**
     * Creation de la class pour la recuperation des informations de l'entreprise
     */
    class TemplatePage {

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
            $this->variables = array();
            $this->js = array();
            $this->css = array();
            $this->html = "";
            try {
                if (is_file($file_html)) {
                    $this->html = file_get_contents($file_html, true);
                } else {
                    // en cas d'erreur de connexion, on place le message dans le fichier "errors.log".
                    $nmError = 1008000008;
                    $error_message = "error file : ".$file_html;
                    $this->errorFile->addError($error_message, $nmError);
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

        public function html(): ?string {
            $html = $this->html;
            if(!empty($this->variables)) {
                foreach ($this->variables as $key => $value) {
                    $html = str_replace($key, $value, $html);
                }
            }
            return $html;
        }

        public function css(): ?string {
            $css = "";
            if(!empty($this->css)) {
                foreach ($this->css as $value) {
                    $css .= "\n" . '<link rel="stylesheet" href="'.$value.'">';
                }
            }
            return $css;
        }

        public function js(): ?string {
            $js = "";
            if(!empty($this->js)) {
                foreach ($this->js as $value) {
                    $js .= "\n" . '<script src="'.$value.'"></script>';
                }
            }
            return $js;
        }

    }

}