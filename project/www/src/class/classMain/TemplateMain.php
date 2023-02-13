<?php


if (!class_exists('TemplateMain')) {

    include_once dirname(__FILE__) . '/PathPhp.php';
    include_once dirname(__FILE__) . '/Error_Log.php';
    include_once dirname(__FILE__) . '/RouteMain.php';

    class TemplateMain
    {

        private $tableData;
        private $textPHP;
        private $textHtml;
        private $body;
        private $style;
        private $js;
        private $title;
        private $pathFile;
        private $final;
        private $nmError;
        private $is_error;
        private $isRoutage;
        private $errorFile;
        private $lienTemplate;
        private $tabIgnorePath;

        /**
         * constructeur par defaut.
         */
        public function __construct(bool $final = false)
        {
            $this->errorFile = new Error_Log();
            $this->nmError = 0;
            $this->is_error = false;
            $this->textPHP = "";
            $this->body = "";
            $this->style = "";
            $this->js = "";
            $this->title = "";
            $this->tableData = array();
            $this->tabIgnorePath = array();
            $this->final = $final;
            $this->isRoutage = true;
            $this->lienTemplate = "./";
            $this->textHtml = "";
        }

        /**
         * La mise en place d'un routage
         */
        public function setRoutage(bool $isRoutage): self
        {
            $this->isRoutage = $isRoutage;
            return $this;
        }

        /**
         * Les dossier de lien qui devront etre ignores
         */
        public function addIgnorePath(?string $name):self {
            array_push($this->tabIgnorePath, $name);
            return $this;
        }

        /**
         * Ajouter un tableau de variable
         */
        public function tabVar(?array $data = null): self
        {
            if(!empty($data)) {
                $this->tableData = array_merge($this->tableData, $data);
            }
            return $this;
        }

        /**
         * Ajouter un tableau de variable avec une clee, pour le recuperer.
         */
        public function tabVarName(?string $key, ?array $data = null): self
        {
            if (!empty($key) && !empty($data)) {
                $this->tableData[$key] = $data;
            } else if (!empty($key)) {
                $this->tableData[$key] = "";
            } else if (!empty($data)) {
                $this->tableData[] = $data;
            }
            return $this;
        }

        /**
         * Pour ajouter une variable a modifier sur la page
         *
         * @param string|null $key la clee de la variable
         * @param string|null $value la valeur de la variable
         * @return self
         */
        public function var(?string $key, ?string $value): self
        {
            if (!empty($key) && !empty($value)) {
                $this->tableData[$key] = $value;
            } else if (!empty($key)) {
                $this->tableData[$key] = "";
            } else if (!empty($value)) {
                $this->tableData[] = $value;
            }
            return $this;
        }

        /**
         * Ajouter un tableau de variable avec une clee, pour le recuperer.
         *
         * @param string|null $key la clee de la variable
         * @param string|null $value la valeur de la variable
         * @return self
         */
        public function varArray(?string $key, ?array $value = null): self
        {
            if (!empty($key) && !empty($value)) {
                $this->tableData[$key] = $value;
            } else if (!empty($key)) {
                $this->tableData[$key] = "";
            } else if (!empty($value)) {
                $this->tableData[] = $value;
            }
            return $this;
        }

        /**
         * mettre en place le rendu de la page html
         */
        public function render(?string $file, bool $isFile = true): self
        {
            $this->nmError = 0;
            $this->is_error = false;
            $this->textPHP = "";
            $this->textHtml = "";
            $this->pathFile = "";
            if($isFile) {
                $this->pathFile = PathPhp::path(dirname(__FILE__), $file);
                try {
                    if (is_file($this->pathFile)) {
                        $text = file_get_contents($this->pathFile, true);
                        if (!empty($text)) {
                            $this->textPHP = $text;
                            if($this->prohibitWords()) {
                                $this->htmlToPhp();
                            }
                        }
                    }
                } catch (PDOException $e) {
                    $this->is_error = true;
                    // en cas d'erreur de connexion, on place le message dans le fichier "errors.log".
                    $this->nmError = 1008000000;
                    $error_message = $e;
                    $this->errorFile->addError($error_message, $this->nmError);
                }
            } else {
                $this->textPHP = $file;
            }
            return $this;
        }

        /**
         * recuperer les erreurs
         */
        public function textErrorLast(): ?string
        {
            $textError = "";
            do {
                try {
                    $error = error_get_last();
                    $textError .= $error['message'] . "in " . $error['file'] . " on line " . $error['line'] . " (code error : " . $error['type'] . ")." . "\n";
                    error_clear_last();
                } catch (Exception $e) {
                    $this->is_error = true;
                    // en cas d'erreur de connexion, on place le message dans le fichier "errors.log".
                    $this->nmError = 1008000004;
                    $error_message = $e;
                    $this->errorFile->addError($error_message, $this->nmError);
                }
            } while (error_get_last() != null);
            return $textError;
        }

        /**
         * Les variables et fonction interdite
         */
        private function prohibitWords(): bool {
            try {
                $tabNoVar = ["GLOBALS", "_SERVER", "_GET", "_POST", "_FILES", "_COOKIE", 
                            "_SESSION", "_REQUEST", "_ENV"];
                foreach ($tabNoVar as $value) {
                    if(strpos($this->textPHP, "{".$value."}") !== false){
                        throw new Exception("Vous ne pouvez pas utiliser un Superglobale ($".$value." => {".$value."}) dans le fichier : ".$this->pathFile);
                    }
                }
                $tabNoFunction = ["phpinfo"];
                foreach ($tabNoFunction as $value) {
                    if(strpos($this->textPHP, "{#".$value."(") !== false || 
                        strpos($this->textPHP, "{# ".$value."(") !== false || 
                            strpos($this->textPHP, "{# ".$value." (") !== false || 
                                strpos($this->textPHP, "{#".$value." (") !== false){
                        throw new Exception("Vous ne pouvez pas utiliser la fonction ".$value."() => {#".$value."()#}) dans le fichier : ".$this->pathFile);
                    }
                }
            } catch (Exception $e) {
                $this->is_error = true;
                // en cas d'erreur de connexion, on place le message dans le fichier "errors.log".
                $this->nmError = 1008000003;
                $error_message = $e;
                $this->errorFile->addError($error_message, $this->nmError);
                return false;
            }
            return true;
        }

        /**
         * Pour creer la page html a afficher
         *
         * @return self Pour recupere la page html a afficher
         */
        public function createHTML(): self
        {
            $data = $this->tableData;
            $result_template = "";
            try {
                if($this->prohibitWords()) {
                    @eval($this->textPHP);
                    if (error_get_last()) {
                        throw new Exception($this->textErrorLast());
                    }
                }
            } catch (Exception $e) {
                $this->is_error = true;
                // en cas d'erreur de connexion, on place le message dans le fichier "errors.log".
                $this->nmError = 1008000001;
                $error_message = $e;
                $this->errorFile->addError($error_message, $this->nmError);
            } catch (ParseError $e) {
                $this->is_error = true;
                // en cas d'erreur de connexion, on place le message dans le fichier "errors.log".
                $this->nmError = 1008000002;
                $error_message = $e;
                $this->errorFile->addError($error_message, $this->nmError);
            }
            $this->textHtml = str_replace('\"', '"', $result_template);
            return $this;
        }

        /**
         * Pour recupere la page html a afficher
         *
         * @return string|null Pour recupere la page html a afficher
         */
        public function textHTML(): ?string
        {
            return $this->textHtml;
        }

        /**
         * Pour affichier le fichier php a executer
         *
         * @return string|null
         */
        public function textPHP(): ?string
        {
            return $this->textPHP;
        }

        /**
         * Conversion du html en php
         *
         * @param array|null $data
         * @return self
         */
        private function htmlToPhp(): self
        {
            $this->replaceMethode()->splitCodeText()->modifTextCode()->createCode()->recupBlock();
            $text = $this->textPHP;
            $this->textPHP = $text;
            return $this;
        }

        /**
         *  recuperer les methodes du code html
         */
        private function replaceMethode():self
        {
            $text = $this->textPHP;
            $text = str_replace("['", "[%", $text);
            $text = str_replace("']", "%]", $text);
            $text = str_replace('%}', '%}' . "\n", $text);
            $text = str_replace('{%', "\n" . '{%', $text);
            $tab = array();
            preg_match_all('/{\?([^(\?).]*?)\((.*?)\)\?}/sim', $text, $tab);
            for ($i=0; $i < count($tab[0]); $i++) {
                $lien = str_replace("'", "", str_replace('"', "", $tab[2][$i]));
                $value = "";
                if(strtolower($tab[1][$i]) == "includehtml") {
                    $value = $this->includeHtml($lien);
                } else if (strtolower($tab[1][$i]) == "path") {
                    $value = $this->path($lien);
                } else if (strtolower($tab[1][$i]) == "asset") {
                    $value = $this->asset($lien);
                }
                $text = str_replace($tab[0][$i], $value, $text);
            }
            $this->textPHP = $text;
            return $this;
        }

        /**
         * organiser le texte recupere du html
         *
         * @return self
         */
        private function splitCodeText(): self
        {
            $text = $this->textPHP;
            $text = str_replace('$', '\\$', $text);
            $text = str_replace('\t', ' ', $text);
            $text = '$result_template .= "' . str_replace('"', '\"', $text) . "\".\"\\n\";";
            $text = str_replace('{#', "\".\"\\n\"; \n" . '{#', $text);
            $text = str_replace('#}', '#}' . "\n" . '$result_template .= "', $text);
            //$text = str_replace('{#endforeach#}', '}'."\n"."}", $text);
            $text = preg_replace('/{#end([^#.]*?)#}/sim', '}', $text);
            $text = str_replace('{#else#}', '} else {', $text);
            while (preg_match_all('/{#([^#.]*?)[\n\r]([^#.]*?)#}/sim', $text) != false) {
                $text = preg_replace('/{#([^#.]*?)[\n\r]([^#.]*?)#}/sim', '{#$1$2#}', $text);
            }
            while (preg_match_all('/{%([^%.]*?)[\n\r]([^%.]*?)%}/sim', $text) != false) {
                $text = preg_replace('/{%([^%.]*?)[\n\r]([^%.]*?)%}/sim', '{%$1$2%}', $text);
            }
            while (preg_match_all('/{#([^#.]*?)[\n\r]([^#.]*?)#}/sim', $text) != false) {
                $text = preg_replace('/{#([^#.]*?)[\n\r]([^#.]*?)#}/sim', '{#$1$2#}', $text);
            }
            while (preg_match_all('/{%([^%.]*?)[\n\r]([^%.]*?)%}/sim', $text) != false) {
                $text = preg_replace('/{%([^%.]*?)[\n\r]([^%.]*?)%}/sim', '{%$1$2%}', $text);
            }
            while (preg_match('/  /sim', $text) != false) {
                $text = str_replace('  ', ' ', $text);
            }
            $this->textPHP = $text;
            return $this;
        }

        /**
         * placer le contenu html dans une chaine de caractere.
         */
        private function modifTextCode(): self
        {
            $text = $this->textPHP;
            $text = $this->clearSpace($text);
            $text = $this->clearSpace($text);
            $text = preg_replace('/\n\$result_template .= ""."\\\\n";/sim', '', $text);
            $text = str_replace('> <', ">\n<", $text);
            $this->textPHP = $text;
            return $this;
        }

        /**
         * Concevoir la partie du php.
         */
        private function createCode(): self
        {
            $text = $this->textPHP;
            $text = preg_replace('/{\?([^(\?).]*?)\((.*?)\)\?}/sim', '".$this->$1($2)."', $text);
            //$text = preg_replace('/{#foreach {([^#.]*?)} as {([^#.]*?)} => {([^#.]*?)}#}/sim', "if(!empty([#$1#])) {"."\n"."foreach([#$1#] as [#$2#] => [#$3#]) {", $text);
            //$text = preg_replace('/{#foreach {([^#.]*?)} as {([^#.]*?)}#}/sim', "if(!empty([#$1#])) {"."\n"."foreach([#$1#] as [#$2#]) {", $text);
            $text = preg_replace('/{#foreach {([^#.]*?)} as {([^#.]*?)} => {([^#.]*?)}#}/sim', "foreach([#$1#] as [#$2#] => [#$3#]) {", $text);
            $text = preg_replace('/{#foreach {([^#.]*?)} as {([^#.]*?)}#}/sim', "foreach([#$1#] as [#$2#]) {", $text);
            $text = preg_replace('/{#for {([^#.]*?)}=([^#.]*?); {([^#.]*?)}([^#.]*?); {([^#.]*?)}([^#.]*?)#}/sim', "for([#$1#]=$2; [#$3#]$4; [#$5#]$6) {", $text);
            $text = preg_replace('/{#if {([^#.]*?)}([^#.]*?){([^#.]*?)}#}/sim', "if([#$1#]$2[#$3#]) {", $text);
            $text = preg_replace('/{#if {([^#.]*?)}([^#.]*?)#}/sim', "if([#$1#]$2) {", $text);
            $text = preg_replace('/{#if {([^#.]*?)}#}/sim', "if([#$1#]) {", $text);
            $text = preg_replace('/{#([^#.]*?)#}/sim', "$1;", $text);
            $text = preg_replace('/{{(.*?)}}/sim', "\".[#$1#].\"", $text);
            foreach ($this->tableData as $key => $value) {
                $text = str_replace('[#' . $key . '#]', '$data["' . $key . '"]', $text);
                $text = str_replace('{{' . $key . '}}', '$data["' . $key . '"]', $text);
                $text = str_replace('{' . $key . '}', '$data["' . $key . '"]', $text);
            }
            $text = preg_replace('/\[#(.*?)#\]/sim', "$$1", $text);
            $text = str_replace("[%", "['" , $text);
            $text = str_replace("%]", "']", $text);
            $this->textPHP = $text;
            return $this;
        }

        /**
         * Recuperer les bloques (titre, body, css, js) et peut-etre les afficher.
         */
        private function recupBlock(): self
        {
            $out = array();
            preg_match_all('/{% block ([^%.]*?) %}(.*?){% endblock %}/sim', $this->textPHP, $out, PREG_PATTERN_ORDER);
            foreach ($out[1] as $key => $value) {
                if (strtolower($value) == "stylesheets") {
                    $this->style = trim($out[2][$key]) . "\n" . $this->style;
                    $this->style = trim($this->style, "\n");
                } else if (strtolower($value) == "body") {
                    $this->body = "\n" . trim($out[2][$key]) . "\n" . $this->body;
                    $this->body = trim($this->body, "\n");
                } else if (strtolower($value) == "javascripts") {
                    $this->js = "\n" . trim($out[2][$key]) . "\n" . $this->js;
                    $this->js = trim($this->js, "\n");
                } else if (strtolower($value) == "title") {
                    if (empty($this->title)) {
                        $this->title = trim(str_replace("\n", " ", $out[2][$key]));
                    }
                }
            }
            $text = $this->textPHP;
            if ($this->final) {
                $text = preg_replace('/{% block stylesheets %}(.*?){% endblock %}/sim', $this->style, $text);
                $text = preg_replace('/{% block body %}(.*?){% endblock %}/sim', str_replace('"', '\\\"', $this->body), $text);
                $text = preg_replace('/{% block javascripts %}(.*?){% endblock %}/sim', $this->js, $text);
                $text = preg_replace('/{% block title %}(.*?){% endblock %}/sim', "<title>" . $this->title . "</title>", $text);
            } else {
                $text = preg_replace('/{% block stylesheets %}(.*?){% endblock %}/sim', "", $text);
                $text = preg_replace('/{% block body %}(.*?){% endblock %}/sim', "", $text);
                $text = preg_replace('/{% block javascripts %}(.*?){% endblock %}/sim', "", $text);
                $text = preg_replace('/{% block title %}(.*?){% endblock %}/sim', "", $text);
            }
            $this->textPHP = $text;
            return $this;
        }

        /**
         * si on include une page html a partir du fichier html de la page
         *
         * @param string|null $text le lien vers le fichier html a inclure
         * @return string|null
         */
        private function includeHtml(?string $text): ?string
        {
            $path = PathPhp::path(PathPhp::pathParent($this->pathFile), $text);
            $page = new TemplateMain();
            $page->setLienTemplate($this->lienTemplate)
            ->setRoutage($this->isRoutage)
            ->tabVar($this->tableData)
            ->render($path);
            $this->body .= $page->getBody();
            $this->style .= $page->getStyle();
            $this->js .= $page->getJs();
            $this->title = $page->getTitle();
            return $page->createHTML()->textHTML();
        }

        /**
         * Recuperer le lien d'une page (ou image)
         */
        private function path(?string $text): ?string
        {
            $routeMain = new RouteMain($this->isRoutage);
            if(!empty($this->tabIgnorePath)) {
                foreach ($this->tabIgnorePath as $value) {
                    $routeMain->addIgnorePath($value);
                }
            }
            return $routeMain->path($text);
        }

        /**
         * Recuperer le lien d'une page (ou image) a partir du template
         */
        private function asset(?string $text): ?string
        {
            $routeMain = new RouteMain($this->isRoutage);
            $path_src = PathPhp::path($this->lienTemplate, $text);
            return PathPhp::path($routeMain->getCurrentDir(), $path_src);
        }

        /**
         * retirer les espaces
         */
        private function clearSpace(?string $text): ?string
        {
            while (preg_match('/\$result_template .= "[\n\r](.*?)"."\\\\n";/sim', $text) != false) {
                $text = preg_replace('/\$result_template .= "[\n\r](.*?)"."\\\\n";/sim', '$result_template .= "$1"."\\n";', $text);
            }
            while (preg_match('/\$result_template .= " (.*?)"."\\\\n";/sim', $text) != false) {
                $text = preg_replace('/\$result_template .= " (.*?)"."\\\\n";/sim', '$result_template .= "$1"."\\n";', $text);
            }
            while (preg_match('/\$result_template .= "(.*?)[\n\r]"."\\\\n";/sim', $text) != false) {
                $text = preg_replace('/\$result_template .= "(.*?)[\n\r]"."\\\\n";/sim', '$result_template .= "$1"."\\n";', $text);
            }
            while (preg_match('/\$result_template .= "(.*?) "."\\\\n";/sim', $text) != false) {
                $text = preg_replace('/\$result_template .= "(.*?) "."\\\\n";/sim', '$result_template .= "$1"."\\n";', $text);
            }
            return $text;
        }

        /**
         * afficher le tableau de donnees
         */
        public function getTableData():?array {
            return $this->tableData;
        }

        /**
         * recuperer le body
         */
        public function getBody(): ?string
        {
            return $this->body;
        }

        /**
         * entrer le body
         *
         * @return  self
         */
        public function setBody(?string $body): self
        {
            $this->body = $body;

            return $this;
        }

        /**
         * recuperer le style
         */
        public function getStyle(): ?string
        {
            return $this->style;
        }

        /**
         * entrer le style
         *
         * @return  self
         */
        public function setStyle(?string $style): self
        {
            $this->style = $style;

            return $this;
        }

        /**
         * recuperer le js
         */
        public function getJs(): ?string
        {
            return $this->js;
        }

        /**
         * entrer le js
         *
         * @return  self
         */
        public function setJs(?string $js): self
        {
            $this->js = $js;

            return $this;
        }

        /**
         * recuperer le titre
         */
        public function getTitle(): ?string
        {
            return $this->title;
        }

        /**
         * entrer le titre
         *
         * @return  self
         */
        public function setTitle(?string $title): self
        {
            if(empty($this->title)) {
                $this->title = $title;
            }
            return $this;
        }

        /**
         * Recuperer le numero d'erreur
         */
        public function getNumError(): int
        {
            return $this->nmError;
        }

        /**
         * verifier l'existance d'une erreur.
         */
        public function isError(): bool
        {
            return $this->is_error;
        }

        /**
         * Si c'est le template final
         */
        public function getFinal():bool
        {
            return $this->final;
        }
        
        /**
         * Ajouter le lien du template
         */
        public function setLienTemplate(string $lienTemplate): self
        {
            $this->lienTemplate = $lienTemplate;
            return $this;
        }
        /**
         * Signaler que c'est le template final
         */
        public function setFinal(bool $final): self
        {
                $this->final = $final;
                return $this;
        }
    }

        

        

}
