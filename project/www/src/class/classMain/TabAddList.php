<?php
/**
 * numero d'error de la classe '1006XXXXXX'
 */
if (!class_exists('TabAddList')) {
    
    /* en cas d'erreur sur la classe */
    include_once dirname(__FILE__) . '/Error_Log.php';

    class TabAddList {
        
        private array $tab_list;

        /**
         * constructeur par defaut.
         */
        public function __construct(?array $post = null, ?string $nameKeyRecup = null) {
            $this->tab_list = [];
            if(!empty($post) && !empty($nameKeyRecup)) {
                foreach ($post as $key => $value) {
                    if (str_contains(strtolower($key), strtolower($nameKeyRecup))) {
                        array_push($this->tab_list, json_decode($value, true));
                    }
                }
            }
        }

        /**
         * Get the value of tab_list
         */
        public function getTabList(): ?array
        {
                return $this->tab_list;
        }
        
    }
}