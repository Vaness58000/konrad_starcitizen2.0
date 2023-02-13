<?php
if (!class_exists('Controller')) {

    include_once dirname(__FILE__) . '/../classMain/PathPhp.php';
    include_once dirname(__FILE__) . '/../classMain/Error_Log.php';
    include_once dirname(__FILE__) . '/../classMain/RouteMain.php';
    include_once dirname(__FILE__) . '/../classMain/TemplateMain.php';
    include_once dirname(__FILE__) . '/../classSite/Config.php';
    include_once dirname(__FILE__) . '/../classSite/InfoEntreprise.php';
    include_once dirname(__FILE__) . '/../classSite/SessionUser.php';

    class Controller
    {
        protected $config;
        protected $template;
        protected $info_Entreprise;
        protected $lien_page;
        protected $errorPage;
        protected $sessionUser;
        protected $displayTemplate;

        /**
         * Constructeur par defaut.
         */
        public function __construct()
        {
            $this->sessionUser = new SessionUser();
            $this->errorPage = false;
            $this->lien_page = new RouteMain();
            $this->config = new Config();
            $this->template = new TemplateMain(false);
            $this->displayTemplate = new TemplateMain(false);
            $this->template->setLienTemplate($this->config->getLienTemplate());
            $this->template->setRoutage($this->config->getRoutage());
            $this->info_Entreprise = new InfoEntreprise($this->config->getFile_info());
            $this->routing();
        }

        /**
         * dossier du template
         */
        protected function folderTemplateSite(?string $text):?string {
            if(!empty($text)) {
                return '/../../template/'.$this->config->getStyleTemplate().'/pages/'.$text;
            }
            return "";
        }

        /**
         * dossier du template admin
         */
        protected function folderTemplateAdmin(?string $text):?string {
            if(!empty($text)) {
                return '/../../template/'.$this->config->getStyleTemplateAdmin().'/pages/'.$text;
            }
            return "";
        }

        /**
         * verifier l'utilisation d'un post.
         */
        protected function isPost():bool {
            return !empty($_POST);
        }

        /**
         * Recuperer l'id a partir d'un get.
         */
        protected function isGetId():int {
            if(!empty($_GET) && array_key_exists("id", $_GET)) {
                if(is_numeric($_GET['id'])) {
                    return intval($_GET['id']);
                }
            }
            return -1;
        }

        /**
         * pour une erreur d'email.
         */
        protected function emailError():self {
            return $this;
        }

        /**
         * recuperer le template.
         */
        public function getTemplate():?TemplateMain {
            return $this->template;
        }

        /**
         * pour le routage
         */
        protected function routing():self
        {
            return $this;
        }

        /**
         * afficher la page
         */
        public function display():self
        {
            if(!empty($this->template)) {
                if($this->template) {

                }
            }
            return $this;
        }

        /**
         * Message d'erreur a afficher sur la page
         */
        public function messageError():?string {
            return "Désolé, une erreur c'est produit sur la page. Merci de ré-essayer.";
        }

        /**
         * Pour l'utilisatation d'un bbcode dans du texte.
         */
        private function bbcode(?string $chaine):?string
        {
            if(empty($chaine)) {
                return "";
            }
            $chaine = str_replace("[b]", "<b>", $chaine);
            $chaine = str_replace("[/b]", "</b>", $chaine);

            $chaine = str_replace("[em]", "<em>", $chaine);
            $chaine = str_replace("[/em]", "</em>", $chaine);

            $chaine = str_replace("[br/]", "<br/>", $chaine);
            $chaine = str_replace("[br]", "<br/>", $chaine);
        
            $chaine = str_replace("[i]", "<em>", $chaine);
            $chaine = str_replace("[/i]", "</em>", $chaine);
        
            $chaine = str_replace("[u]", "<u>", $chaine);
            $chaine = str_replace("[/u]", "</u>", $chaine);
        
        
            $chaine = str_replace("[code]", "<pre><code>", $chaine);
            $chaine = str_replace("[/code]", "</code></pre>", $chaine);            
                
            $chaine = preg_replace("#\[\*\]?([^\[]*) ?#", "<li>\\1</li>", $chaine);
            $chaine = str_replace(array('[list]','[/list]'), array('<ul>','</ul>'), 
                $chaine);
            
            $chaine = preg_replace("#\[url\]((ht|f)tp://)([^\r\n\t<\"]*?)\[/url\]#i",
                "'<a href=\"\\1' . str_replace(' ', '%20', '\\3') . '\">\\1\\3</a>'", $chaine);
            $chaine = preg_replace("/\[url=(.+?)\](.+?)\[\/url\]/", 
                "<a href=\"$1\">$2</a>", $chaine);

            $chaine = preg_replace("#\[email\] ?([^\[]*) ?\[/email\]#",
                "<a href=\"mailto:\\1\">\\1</a>", $chaine);
            $chaine = preg_replace("#\[email ?=([^\[]*) ?] ?([^]]*) ?\[/email\]#",
                "<a href=\"mailto:\\1\">\\2</a>", $chaine);
        
            $chaine = preg_replace("#\[img\] ?([^\[]*) ?\[/img\]#",
                "<img src=\"\\1\" alt=\"\" />", $chaine);
            $chaine = preg_replace("#\[img ?= ?([^\[]*) ?\]#",
                "<img src=\"\\1\" alt=\"\" />", $chaine);
        
            return $chaine;
        }

        /**
         * Pour l'utilisatation d'un mini-bbcode dans du texte (ne pas utiliser).
         */
        protected function descriptionHtml(?string $text):?string {
            if(empty($text)) {
                return "";
            }

            $text = str_replace("[", "<", $text);
            $text = str_replace("]", ">", $text);
            $text = str_replace("\n", "<br />", $this->bbcode($text));
            return $text;
        }

        /**
         * verifier une erreur sur la page
         */
        public function getErrorPage():bool
        {
                return $this->errorPage;
        }

        /**
         * recuperer une erreur sur la page
         */
        protected function setErrorPage(bool $errorPage): self
        {
            if($errorPage) {
                $this->errorPage = $errorPage;
            }
            return $this;
        }

        /**
         * Afficher la page ou un message d'erreur.
         * 
         * @param TemplateMain|null le template a afficher
         * @return self
         */
        protected function displayTemplate(?TemplateMain $templateMain):self {
            if(!empty($templateMain)) {
                $this->displayTemplate = $templateMain;
            }
            if(!empty($this->displayTemplate) && $this->displayTemplate->getFinal() && !Error_Log::isError()) {
                echo $this->displayTemplate->textHTML();
            } else if(Error_Log::isError()) {
                header("Status: 500");
            }
            return $this;
        }
    }
}
