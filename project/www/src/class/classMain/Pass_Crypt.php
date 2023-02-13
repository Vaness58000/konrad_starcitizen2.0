<?php
/**
 * Pour crypter le mot de passe ou verifier la validiter d'un mot de passe.
 * numero d'error de la classe '1004XXXXXX'
 */
if (!class_exists('Pass_Crypt')) {

    /* inclure des fonctionnalites à la page */
    include_once dirname(__FILE__) . '/Error_Log.php';

    /**
     * Creation de la classe de cryptage ou verifier un mot de passe utilisateur.
     */
    class Pass_Crypt {

        /**
         * Le debut du mot de passe crypter, pour connetre son cryptage (retirer du mot de passe crypter pour des raison de securite).
         */
        private const START_PASS = '$argon2i$v=19$m=65536,t=4,p=1$';

        /**
         * Ce code va tester votre serveur pour déterminer quel serait le meilleur "cost".
         * Vous souhaitez définir le "cost" le plus élevé possible sans trop ralentir votre serveur.
         * 8-10 est une bonne base, mais une valeur plus élevée est aussi un bon choix à partir
         * du moment où votre serveur est suffisament rapide ! Le code suivant espère un temps
         * ≤ à 50 millisecondes, ce qui est une bonne base pour les systèmes gérants les identifications
         * intéractivement.
         * @return integer le meilleur "cost".
         */
        public static function test_Cost():int {
            $error_log = new Error_Log();
            $timeTarget = 0.05; // 50 millisecondes

            $cost = 8;
            /* se proteger des erreurs (pour ne pas afficher l'erreur a l'ecran) */
            try {
                do {
                    $cost++;
                    $start = microtime(true);
                    password_hash("test", PASSWORD_ARGON2I, ["cost" => $cost]);
                    $end = microtime(true);
                } while (($end - $start) < $timeTarget);
            } catch (Exception $e) {
                /* sauvegarde le message d'erreur dans le fichier "errors.log" */
                $error_log = new Error_Log();
                $error_code = 1004000000;
                $error_message = $e;
                $error_log->addError($error_message, $error_code);
            }
            return $cost;

        }
        
        /**
         * Crypter le mot de passe.
         * @param string|null $pass : le mot de passe a crypter.
         * @return string|null retourne le mot de passe crypte.
         */
        public static function password(?string $pass):?string {
            $error_log = new Error_Log();
            /* se proteger des erreurs (pour ne pas afficher l'erreur a l'ecran) */
            try {
                $options = [
                    'cost' => Pass_Crypt::test_Cost(),
                ];
                return str_replace(Pass_Crypt::START_PASS, '', password_hash($pass, PASSWORD_ARGON2I, $options));
            } catch (Exception $e) {
                /* sauvegarde le message d'erreur dans le fichier "errors.log" */
                $error_log = new Error_Log();
                $error_code = 1004000001;
                $error_message = $e;
                $error_log->addError($error_message, $error_code);
            }
            return "";
        }

        /**
         * 
         * @param string|null $pass : le mot de passe a tester.
         * @param string|null $hash : le mot de passe crypter a tester.
         * @return boolean retourne true, si le mot de passe est valide.
         */
        public static function verify(?string $pass, ?string $hash):bool {
            $error_log = new Error_Log();
            /* se proteger des erreurs (pour ne pas afficher l'erreur a l'ecran) */
            try {
                return password_verify($pass, Pass_Crypt::START_PASS.$hash);
            } catch (Exception $e) {
                /* sauvegarde le message d'erreur dans le fichier "errors.log" */
                $error_log = new Error_Log();
                $error_code = 1004000002;
                $error_message = $e;
                $error_log->addError($error_message, $error_code);
            }
            return false;
        }

        /**
         * Verifier la validitee du mot de passe.
         */
        public static function validPass(?string $pass):?bool {
            if(!empty($pass)) {
                $regexPassMinuscule = '/[a-z]/';
                $regexPassMajuscule = '/[A-Z]/';
                $regexPassChiffre = '/[0-9]/';
                $regexPassSpecial = '/[$@\/\[\]_\-!%*\\\#&\(\)]/';
                $passLength = 12;

                return preg_match($regexPassMinuscule,$pass) && preg_match($regexPassMajuscule,$pass) && 
                    preg_match($regexPassChiffre,$pass) && preg_match($regexPassSpecial,$pass) && 
                    (strlen($pass) >= $passLength);
            }
            return false;
        }

        /**
         * Verifier que le mot de passe a bien ete entree.
         */
        public static function passAndRepeatValid(?string $pass, ?string $passRepeat):bool {
            if(!empty($pass) && !empty($passRepeat)) {
                if(Pass_Crypt::validPass($pass)) {
                    if($pass == $passRepeat) {
                        return "true";
                    } else {
                        return "Les deux mots de passe ne sont pas identiques.";
                    }
                } else {
                    return "Le mot de passe n'est pas valide.";
                }
            }
            return "merci d'entrer les informations dans le formulaire.";
        }

    }
}
