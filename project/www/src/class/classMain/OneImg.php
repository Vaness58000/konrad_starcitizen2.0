<?php
/**
 * Pour la recuperation d'image(s)
 */

if (!class_exists('OneImg')) {

    include_once dirname(__FILE__) . '/../classSite/Config.php';
    include_once dirname(__FILE__) . '/PathPhp.php';

    /**
     * Pour la recuperation d'image(s)
     */
    class OneImg {

        // les variables
        private $config;
        private $errorFile;
        private $folder;
        private $keyFile;
        
        /**
         * Constructeur par defaut
         */
        public function __construct(?string $folder) {
            $this->config = new Config();
            $this->folder = PathPhp::path(__DIR__, $this->config->getFolder_img());
            if(!empty($folder)) {
                $this->folder = PathPhp::path(PathPhp::path(__DIR__, $this->config->getFolder_img()), $folder);
            }
            $this->errorFile = new Error_Log();
        }

        public static function isMainImg(?string $keyNameFile, ?string $keyNameMain): bool {
            if(empty($keyNameFile) || empty($keyNameMain)) {
                return false;
            }
            return (strtolower($keyNameFile) == strtolower($keyNameMain));
        }

        public function keyFile(?string $key):self {
            $this->keyFile = $key;
            return $this;
        }

        public function isGlobFile(): bool {
            return (!empty($_FILES) && !empty($this->keyFile) && array_key_exists($this->keyFile, $_FILES) && !empty($_FILES[$this->keyFile]) && 
            array_key_exists("name", $_FILES[$this->keyFile]) && !empty($_FILES[$this->keyFile]['name']));
        }

        /**
         * Placer une image sur le serveur a partir de file.
         */
        public function saveDataImg_uniqid(?array $dataImg, ?string $prefix = null):?string {
            $thePrefix = "";
            if(!empty($prefix)) {
                $thePrefix = $prefix."_";
            }
            $nameImg = "";
            if(!empty($dataImg)) {
                if(!file_exists($this->folder)) {
                    mkdir($this->folder, 0777, true);
                }
                $nameImg = str_replace(".", "_", uniqid($thePrefix, true)).".".strrev(explode(".", strrev($dataImg['name']))[0]);
                $img = $dataImg['src']; //base64 string
                $data = file_get_contents($img);
                $file = PathPhp::path($this->folder, $nameImg);
                try {
                    if (!file_put_contents($file, $data)) {
                        throw new Exception('Could not move file.');
                    }
                } catch (Exception $e) {
                    $error_message = $e;
                    $this->errorFile->addError($error_message, 1009000001);
                }
            }
            return $nameImg;
        }

        /**
         * Placer une image sur le serveur a partir de file.
         */
        public function move_img_uniqid(?string $prefix = null):?string {
            $thePrefix = "";
            if(!empty($prefix)) {
                $thePrefix = $prefix."_";
            }
            $nameImg = "";
            if($this->isGlobFile()) {
                if(!file_exists($this->folder)) {
                    mkdir($this->folder, 0777, true);
                }
                $nameImg = str_replace(".", "_", uniqid($thePrefix, true)).".".strrev(explode(".", strrev($_FILES[$this->keyFile]['name']))[0]);
                $file = PathPhp::path($this->folder, $nameImg);
                try {
                    if (!move_uploaded_file($_FILES[$this->keyFile]['tmp_name'], $file)) {
                        throw new Exception("Possible file upload attack!");
                    }
                } catch (Exception $e) {
                    $error_message = $e;
                    $this->errorFile->addError($error_message, 1009000008);
                }
            }
            return $nameImg;
        }

        /**
         * Supprimer une image.
         */
        public function supprimer(?string $file_name):self {
            if(!empty($file_name)) {
                $pathFile = PathPhp::path($this->folder, $file_name);
                if(is_file($pathFile)) {
                    try {
                        if (!unlink($pathFile)) {
                            throw new Exception('Unable to Delete the File.');
                        }
                    } catch (Exception $e) {
                        $error_message = $e;
                        $this->errorFile->addError($error_message, 1009000003);
                    }
                }
            }
            return $this;
        }

    }

}