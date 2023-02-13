<?php
/**
 * Pour la recuperation d'image(s)
 */

if (!class_exists('AllImage')) {

    include_once dirname(__FILE__) . '/../classSite/Config.php';
    include_once dirname(__FILE__) . '/PathPhp.php';

    /**
     * Pour la recuperation d'image(s)
     */
    class AllImage {

        // les variables
        private $tabImg;
        private $config;
        private $errorFile;
        private $nmError;
        private $is_error;
        
        /**
         * Constructeur par defaut
         */
        public function __construct() {
            $this->config = new Config();
            $this->tabImg = array();
            $this->nmError = 0;
            $this->is_error = false;
            $this->errorFile = new Error_Log();
        }

        /**
         * Recuperer une liste d'image sur le post.
         */
        public function postImg():self {
            if(!empty($_POST)) {
                foreach ($_POST as $key => $value) {
                    if(strpos($key, "file_" ) === 0){
                        $this->tabImg[] = json_decode($value);
                    }
                }
            }
            return $this;
        }

        /**
         * retourne le tableau avec les images
         */ 
        public function getTabImg():?array
        {
            return $this->tabImg;
        }

        /**
         * Creation d'un nom de fichier unique
         */
        static public function fileUniqid(?string $nameFile):?string {
            if(empty($nameFile)) {
                return "";
            }
            return uniqid() . '.' . (new SplFileInfo($nameFile))->getExtension();
        }

        /**
         * Sauver les images sur le serveur (a partir de la liste).
         */
        public function saveImgs():?array {
            $tabImgSrc = array();
            if(!empty($this->tabImg)) {
                foreach ($this->tabImg as $value) {
                    $img = $value->src; //base64 string
                    $data = file_get_contents($img);
                    $file = AllImage::fileUniqid($value->name);
                    $tabImgSrc[] = $file;
                    $pathMain = PathPhp::path($this->config->pathParent(), $this->config->getFolder_img());
                    $pathFile = PathPhp::path($pathMain, $file);
                    try {
                        if (!file_put_contents($pathFile, $data)) {
                            throw new Exception('Could not move file.');
                        }
                    } catch (Exception $e) {
                        $this->is_error = true;
                        $this->nmError = 1009000001;
                        $error_message = $e;
                        $this->errorFile->addError($error_message, $this->nmError);
                        die ('File did not upload.');
                    }
                }
            }
            return $tabImgSrc;
        }

        /**
         * Placer une image sur le serveur a partir de file.
         */
        public function move_img_uniqid(?string $file_tmp, ?string $file_name):?string {
            $file = "";
            if(!empty($file_tmp) && !empty($file_name)) {
                $file = AllImage::fileUniqid($file_name);
                $pathMain = PathPhp::path($this->config->pathParent(), $this->config->getFolder_img());
                $pathFile = PathPhp::path($pathMain, $file);
                try {
                    if (!move_uploaded_file($file_tmp, $pathFile)) {
                        throw new Exception('Could not move file.');
                    }
                } catch (Exception $e) {
                    $this->is_error = true;
                    $this->nmError = 1009000002;
                    $error_message = $e;
                    $this->errorFile->addError($error_message, $this->nmError);
                    die ('File did not upload.');
                }
            }
            return $file;
        }

        /**
         * Supprimer une image.
         */
        public function supprimer_img(?string $file_name):self {
            if(!empty($file_name)) {
                $pathMain = PathPhp::path($this->config->pathParent(), $this->config->getFolder_img());
                $pathFile = PathPhp::path($pathMain, $file_name);
                if(file_exists($pathFile)) {
                    try {
                        if (!unlink($pathFile)) {
                            throw new Exception('Unable to Delete the File.');
                        }
                    } catch (Exception $e) {
                        $this->is_error = true;
                        $this->nmError = 1009000003;
                        $error_message = $e;
                        $this->errorFile->addError($error_message, $this->nmError);
                        die ('File did not upload.');
                    }
                }
            }
            return $this;
        }

        /**
         * numero d'erreur
         */
        public function getNumError():int {
            return $this->nmError;
        }

        /**
         * Si il y a eu une erreur.
         */
        public function isError(): bool {
            return $this->is_error;
        }


    }

}