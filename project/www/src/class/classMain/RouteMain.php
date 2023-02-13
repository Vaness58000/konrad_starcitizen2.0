<?php


if (!class_exists('RouteMain')) {

    /* en cas d'erreur sur la classe */
    include_once dirname(__FILE__) . '/PathPhp.php';

    class RouteMain {

        private $parentPath;
        private $index;
        private $isRoutage;
        private $currentDir;
        private $tabIgnore;

        /**
         * constructeur par defaut.
         */
        public function __construct(bool $isRoutage = true) {
            $this->tabIgnore = array("template", "default", "src", "img", "data");
            $this->isRoutage = $isRoutage;
            $this->parentPath = "./";
            $this->currentDir = "./";
            $this->index = array();
            if(!empty($_GET) && array_key_exists('url', $_GET) && $isRoutage) {
                $nbParentCurrentDirectory = substr_count(PathPhp::currentPath($_GET["url"]), '/');
                for ($i=0; $i < $nbParentCurrentDirectory; $i++) { 
                    $this->parentPath .= "../";
                    $this->currentDir .= "../";
                }

                $this->index = $this->createTabIndex($_GET["url"]);
            }
            if(!empty($_GET)) {
                foreach ($_GET as $key => $value) {
                    if(!array_key_exists($key, $this->index)) {
                        $this->index[$key] = $value;
                    }
                }
            }
        }

        /**
         * un dossier a ignorer sur l'emplacement du lien
         */
        public function addIgnorePath(?string $name):self {
            array_push($this->tabIgnore, $name);
            return $this;
        }

        /**
         * pas utilise.
         */
        private function php_self():?array {
            $php_self_tab = explode("/", $_SERVER['PHP_SELF']);
            $tab_value = array();
            if(!empty($php_self_tab)) {
                foreach ($php_self_tab as $value) {
                    if(!empty($value) && $value != "." && $value != ".." && !preg_match('/\.php$/i', $value)) {
                        array_push($tab_value, $value);
                    } 
                }
            }
            return $tab_value;
        }

        /**
         * Creation d'un tableau d'index.
         */
        private function createTabIndex(?string $path):?array {
            if(empty($path)) {
                return array();
            }
            $arrayIndex = array();
            $tabIndex = explode("/", trim($path, "/"));
            foreach ($tabIndex as $key => $value) {
                $arrayIndex["index".$key] = $value;
            }
            unset($tabIndex);
            return $arrayIndex;
        }

        /**
         * creer le dossier courant.
         */
        private function currentDirectory(?string $path):?string {
            if(empty($path)) {
                return "";
            }
            $pathOut = "";
            $explodeCurrentDirectory = explode("/", trim(explode("?", explode("#", PathPhp::currentPath($path), 2)[0], 2)[0], "/"));
            foreach ($explodeCurrentDirectory as $value) {
                if($value == "..") {
                    $pathOut .= "../";
                }
            }
            return $pathOut;
        }

        /**
         * creation du lien.
         */
        public function path(?string $path):?string {
            if(!$this->isRoutage) {
                $pathGetIndex = "./";
                foreach($this->tabIgnore as $value) {
                    try{
                        if(preg_match("/".$value."/", $path)) {
                            $pathGetIndex .= $value."/";
                            $path = str_replace($value."/", "", $path);
                        }
                    } catch (Exception $e) {}
                    
                }
                $explodePath = explode("#", PathPhp::currentPath($path), 2);
                $explodePathGet = explode("?", $explodePath[0], 2);
                $pathGetIndex .= $this->currentDirectory($path);
                
                $tabIndex = $this->createTabIndex($explodePathGet[0]);
                if(count($tabIndex) > 0) {
                    $pathGetIndex .= "?";
                }
                foreach ($tabIndex as $key => $value) {
                    $pathGetIndex .= $key . "=" .$value . "&";
                }
                $pathGetIndex = trim($pathGetIndex, "&");
                if(count($explodePathGet) > 1) {
                    if(count($tabIndex) > 0) {
                        $pathGetIndex .= "&" . $explodePathGet[1];
                    } else {
                        $pathGetIndex .= "?" . $explodePathGet[1];
                    }
                }
                if(count($explodePath) > 1) {
                    $pathGetIndex .= "#" . $explodePath[1];
                }
                $path = $pathGetIndex;
            }
            return PathPhp::path($this->parentPath, $path);
        }

        /**
         * le tableau des index.
         */
        public function tabGetIndPg():?array {
            return  $this->index;
        }

        /**
         * recuperer le dossier courant
         */
        public function getCurrentDir():?string
        {
            return $this->currentDir;
        }

    }

}