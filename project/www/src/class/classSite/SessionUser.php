<?php 

/**
 * Pour lire les informations de l'entreprise.
 * numero d'error de la classe '1003XXXXXX'
 */

if (!class_exists('SessionUser')) {
        
    include_once dirname(__FILE__) . '/../../lelien-admin/src/repository/UserRepository.php';

    /**
     * Creation de la class pour la recuperation des informations de l'entreprise
     */
    class SessionUser {

        private $connected;
        private $is_error;

        /**
         * le constructeur par defaut
         */
        public function __construct(int $maxlifetime = 7200) {//10800
            $this->is_error = false;
            if(empty(session_id())) {
                try {
                    session_start();
                } catch (Exception $e) {}
            }
            if (!empty($_SESSION) && array_key_exists('maxlifetime', $_SESSION) && (time() - $_SESSION['maxlifetime'] > $maxlifetime)) {
                $this->deconnected();
            }
            if(!empty($_SESSION) && array_key_exists('lelien_id_user', $_SESSION) && array_key_exists('lelien_jeton', $_SESSION)) {
                $userRepository = new UserRepository();
                if(!$userRepository->userValid(intval($_SESSION['lelien_id_user']), $_SESSION['lelien_jeton'])) {
                    $this->deconnected();
                }
            }
            $_SESSION['maxlifetime'] = time();
            $this->connected = (!empty($_SESSION) && array_key_exists("lelien_id_user", $_SESSION) && 
            array_key_exists("lelien_id_type", $_SESSION) && 
            array_key_exists("lelien_nom", $_SESSION) && 
            array_key_exists("lelien_prenom", $_SESSION) && 
            array_key_exists("lelien_email", $_SESSION) && 
            array_key_exists("lelien_jeton", $_SESSION));
        }

        /**
         * verifier qu'on est bien admin
         */
        public function isAdmin():bool {
            $userRepository = new UserRepository();
            if(!empty($_SESSION) && !empty($_SESSION['lelien_id_user']) && $userRepository->isAdmin(intval($_SESSION['lelien_id_user']))) {
                return true;
            }
            return false;
        }

        /**
         * verifier qu'on est connecte
         */
        public function isConnected():bool {
            return $this->connected;
        }

        /**
         * se deconnecter
         */
        public function deconnected():self {
            /* vide la table de la section */
            session_unset();

            /* met fin a la section */
            try {
                session_destroy();
            } catch (Exception $e) {}
            return $this;
        }


        /**
         * visualiser l'id
         */ 
        public function getId():int
        {
            if(!$this->isConnected()) {
                return -1;
            }
            return $_SESSION['lelien_id_user'];
        }

        /**
         * recuperer l'id
         *
         * @return  self
         */ 
        public function setId(int $id):self
        {
            if(isset($_SESSION)) {
                $_SESSION['lelien_id_user'] = $id;
            }
            return $this;
        }


        /**
         * visualiser le jeton
         */ 
        public function getJeton():?string
        {
            if(!$this->isConnected()) {
                return "";
            }
            return $_SESSION['lelien_jeton'];
        }

        /**
         * recuperer le jeton
         *
         * @return  self
         */ 
        public function setJeton(?string $jeton):self
        {
            if(isset($_SESSION)) {
                $_SESSION['lelien_jeton'] = $jeton;
            }
            return $this;
        }


        /**
         * visualiser l'id du type
         */ 
        public function getId_type():int
        {
            if(!$this->isConnected()) {
                return -1;
            }
            return $_SESSION['lelien_id_type'];
        }

        /**
         * recuperer l'id du type
         *
         * @return  self
         */ 
        public function setId_type(int $id_type):self
        {
            if(isset($_SESSION)) {
                $_SESSION['lelien_id_type'] = $id_type;
            }
            return $this;
        }

        /**
         * visualiser le nom
         */ 
        public function getNom():?string
        {
            if(!$this->isConnected()) {
                return "";
            }
            return $_SESSION['lelien_nom'];
        }

        /**
         * recuperer le nom
         *
         * @return  self
         */ 
        public function setNom(?string $nom):self
        {
                if(isset($_SESSION)) {
                    $_SESSION['lelien_nom'] = $nom;
                }
                return $this;
        }

        /**
         * visualiser le prenom
         */ 
        public function getPrenom():?string
        {
            if(!$this->isConnected()) {
                return "";
            }
            return $_SESSION['lelien_prenom'];
        }

        /**
         * recuperer le prenom
         *
         * @return  self
         */ 
        public function setPrenom(?string $prenom):self
        {
                if(isset($_SESSION)) {
                    $_SESSION['lelien_prenom'] = $prenom;
                }

                return $this;
        }

        /**
         * visualiser l'email
         */ 
        public function getEmail():?string
        {
            if(!$this->isConnected()) {
                return "";
            }
                return $_SESSION['lelien_email'];
        }

        /**
         * recuperer l'email
         *
         * @return  self
         */ 
        public function setEmail(?string $email):self
        {
                if(isset($_SESSION)) {
                    $_SESSION['lelien_email'] = $email;
                }

                return $this;
        }

        /**
         * verifier l'existance d'une erreur
         */
        public function isError(): bool {
            return $this->is_error;
        }

    }
}
