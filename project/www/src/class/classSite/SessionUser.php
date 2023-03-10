<?php 

/**
 * Pour lire les informations de l'entreprise.
 * numero d'error de la classe '1003XXXXXX'
 */

if (!class_exists('SessionUser')) {
        
    include_once dirname(__FILE__) . '/../../repository/UsersRepository.php';

    /**
     * Creation de la class pour la recuperation des informations de l'entreprise
     */
    class SessionUser {

        private bool $connected;
        private bool $admin;
        private int $role;
        private int $id;
        private string $pseudo;
        private string $email;

        /**
         * le constructeur par defaut
         */
        public function __construct(int $maxlifetime = 7200) {//10800
            if(empty(session_id())) {
                try {
                    session_start();
                } catch (Exception $e) {}
            }

            $this->pseudo = "";
            $this->id = 0;
            $this->role = 0;
            $this->admin = false;

            $this->connected = (!empty($_SESSION) && array_key_exists('utilisateur', $_SESSION) && !empty($_SESSION['utilisateur']) && 
                array_key_exists('id', $_SESSION['utilisateur']) && !empty($_SESSION['utilisateur']['id']));
            if($this->connected) {
                $usersRepository = new UsersRepository();
                $user = $usersRepository->findAllId($_SESSION['utilisateur']['id']);

                if(!empty($user)) {
                    $this->pseudo = $user['pseudo'];
                    $this->id = intval($user["idUser"]);
                    $this->role = intval($user["id_role"]);
                    $this->admin = $this->role == 2;
                    $this->email = $user['email'];
                }
            }
            /*if (!empty($_SESSION) && array_key_exists('maxlifetime', $_SESSION) && (time() - $_SESSION['maxlifetime'] > $maxlifetime)) {
                $this->deconnected();
            }
            if(!empty($_SESSION) && array_key_exists('lelien_id_user', $_SESSION) && array_key_exists('lelien_jeton', $_SESSION)) {
                $usersRepository = new UsersRepository();
                if(!$usersRepository->userValid(intval($_SESSION['lelien_id_user']), $_SESSION['lelien_jeton'])) {
                    $this->deconnected();
                }
            }
            $_SESSION['maxlifetime'] = time();
            $this->connected = (!empty($_SESSION) && array_key_exists("lelien_id_user", $_SESSION) && 
            array_key_exists("lelien_id_type", $_SESSION) && 
            array_key_exists("lelien_nom", $_SESSION) && 
            array_key_exists("lelien_prenom", $_SESSION) && 
            array_key_exists("lelien_email", $_SESSION) && 
            array_key_exists("lelien_jeton", $_SESSION));*/
        }

        public function isConnected(): bool {
            return $this->connected;
        }

        /**
         * Get the value of admin
         */
        public function isAdmin(): bool
        {
                return $this->admin;
        }

        /**
         * Get the value of role
         */
        public function getRole(): int
        {
                return $this->role;
        }

        /**
         * Get the value of pseudo
         */
        public function getPseudo(): string
        {
                return $this->pseudo;
        }

        /**
         * Get the value of id
         */
        public function getId(): int
        {
                return $this->id;
        }

        /**
         * Get the value of email
         */
        public function getEmail(): string
        {
                return $this->email;
        }

        /*

        / **
         * verifier qu'on est bien admin
         * /
        public function isAdmin():bool {
            / *$userRepository = new UsersRepository();
            if(!empty($_SESSION) && !empty($_SESSION['lelien_id_user']) && $userRepository->isAdmin(intval($_SESSION['lelien_id_user']))) {
                return true;
            }* /
            return false;
        }

        / **
         * verifier qu'on est connecte
         * /
        public function isConnected():bool {
            return $this->connected;
        }

        / **
         * se deconnecter
         * /
        public function deconnected():self {
            / * vide la table de la section * /
            session_unset();

            / * met fin a la section * /
            try {
                session_destroy();
            } catch (Exception $e) {}
            return $this;
        }


        / **
         * visualiser l'id
         * / 
        public function getId():int
        {
            if(!$this->isConnected()) {
                return -1;
            }
            return $_SESSION['lelien_id_user'];
        }

        / **
         * recuperer l'id
         *
         * @return  self
         * / 
        public function setId(int $id):self
        {
            if(isset($_SESSION)) {
                $_SESSION['lelien_id_user'] = $id;
            }
            return $this;
        }


        / **
         * visualiser le jeton
         * / 
        public function getJeton():?string
        {
            if(!$this->isConnected()) {
                return "";
            }
            return $_SESSION['lelien_jeton'];
        }

        / **
         * recuperer le jeton
         *
         * @return  self
         * / 
        public function setJeton(?string $jeton):self
        {
            if(isset($_SESSION)) {
                $_SESSION['lelien_jeton'] = $jeton;
            }
            return $this;
        }


        / **
         * visualiser l'id du type
         * / 
        public function getId_type():int
        {
            if(!$this->isConnected()) {
                return -1;
            }
            return $_SESSION['lelien_id_type'];
        }

        / **
         * recuperer l'id du type
         *
         * @return  self
         * / 
        public function setId_type(int $id_type):self
        {
            if(isset($_SESSION)) {
                $_SESSION['lelien_id_type'] = $id_type;
            }
            return $this;
        }

        / **
         * visualiser le nom
         * / 
        public function getPseudo():?string
        {
            if(!$this->isConnected()) {
                return "";
            }
            return $_SESSION['lelien_nom'];
        }

        / **
         * recuperer le nom
         *
         * @return  self
         * / 
        public function setPseudo(?string $nom):self
        {
                if(isset($_SESSION)) {
                    $_SESSION['lelien_nom'] = $nom;
                }
                return $this;
        }

        / **
         * visualiser le prenom
         * /  
        public function getPrenom():?string
        {
            if(!$this->isConnected()) {
                return "";
            }
            return $_SESSION['lelien_prenom'];
        }

        / **
         * recuperer le prenom
         *
         * @return  self
         * / 
        public function setPrenom(?string $prenom):self
        {
                if(isset($_SESSION)) {
                    $_SESSION['lelien_prenom'] = $prenom;
                }

                return $this;
        }

        / **
         * visualiser l'email
         * / 
        public function getEmail():?string
        {
            if(!$this->isConnected()) {
                return "";
            }
                return $_SESSION['lelien_email'];
        }

        / **
         * recuperer l'email
         *
         * @return  self
         * / 
        public function setEmail(?string $email):self
        {
                if(isset($_SESSION)) {
                    $_SESSION['lelien_email'] = $email;
                }

                return $this;
        }

        / **
         * verifier l'existance d'une erreur
         * /
        public function isError(): bool {
            return $this->is_error;
        }*/

    }

}
