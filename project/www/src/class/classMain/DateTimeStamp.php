<?php
/**
 * 
 */
if (!class_exists('DateTimeStamp')) {

    /**
     * Pour l'affichage de la date
     */
    class DateTimeStamp {

        // valeur en timestamp Unix
        private $time;

        /**
         * Undocumented function
         *
         * @param integer $time timestamp Unix
         */
        public function __construct(int $time = -1) {
            if($time > 0) {
                $this->time = $time;
            } else {
                $this->time = strtotime("now");
            }
        }

        /**
         * retourne la valeur du timestamp Unix
         *
         * @return integer timestamp Unix
         */
        public function getTime():int {
                return $this->time;
        }

        /**
         * Entrer la date sous le format de la SGBD Mysql
         *
         * @param string|null $date La date sous le format de la SGBD Mysql
         * @return self
         */
        public function setSGBD(?string $date):self {
            $this->time = strtotime($date);
            return $this;
        }

        /**
         * Recuperer la date sous le format de la SGBD Mysql
         *
         * @return string|null La date sous le format de la SGBD Mysql
         */
        public function getSGBD():?string {
            return date('Y-m-d H:i:s', $this->time);
        }

        /**
         * Entrer la date sous le format HTML
         *
         * @param string|null $date la date sous le format HTML
         * @return self
         */
        public function setHTML(?string $date):self {
            $this->time = strtotime($date);
            return $this;
        }

        /**
         * Recuperer la date sous le format HTML
         *
         * @return string|null la date sous le format HTML
         */
        public function getHTML():?string {
            return date('Y-m-d\TH:i:s', $this->time);
        }

        /**
         * Recuperer l'annee
         *
         * @return integer recuperer l'annee
         */
        public function getYTear():int {
            return intval(date('Y', $this->time));
        }

    }
}
