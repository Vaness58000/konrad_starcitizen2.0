<?php
/**
 * Pour se connecter a la base de donner a partir du fichier "sgbd_config.php".
 * Pouvoir avoir une connexion a la base de donnees differentes.
 * numero d'error de la classe '1005XXXXXX'
 */

// verifier qu'on n'a pas deja creer la fonction
if (!function_exists('EmailSend')) {

    // fonction pour faire la connexion a la base de donnes
    class EmailSend {

        /**
         * Pour envoyer un message html (si le message ne peut pas etre lut en html, il sera affiche en texte).
         * Si le message texte est vide, il sera remplacer par le htlm (sans les balises).
         * 
         * @param type (string) $mail email de reception.
         * @param type (string) $mail_from email d'envoi.
         * @param type (string) $objet l'objet du message.
         * @param type (string) $messageHTML le message en html.
         * @param type (string) $messageText le message en format texte.
         */
        public function message_email(?string $mail, ?string $mail_from, ?string $objet, ?string $messageHTML, ?string $messageText = null):self {
            $this->message_email_charset($mail, $mail_from, "UTF-8", $objet, $messageHTML, $messageText);
            return $this;
        }

        /**
         * Pour envoyer un message html (si le message ne peut pas etre lut en html, il sera affiche en texte).
         * Si le message texte est vide, il sera remplacer par le htlm (sans les balises).
         * 
         * @param type (string) $mail email de reception.
         * @param type (string) $mail_from email d'envoi.
         * @param type (string) $charset l'encodage du texte ("UTF-8" ou "ISO-8859-1" ou ...).
         * @param type (string) $objet l'objet du message.
         * @param type (string) $messageHTML le message en html.
         * @param type (string) $messageText le message en format texte.
         */
        public function message_email_charset(?string $mail, ?string $mail_from, ?string $charset, ?string $objet, ?string $messageHTML, ?string $messageText = null):self {
            $passage_ligne = "\n";
            if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) { // On filtre les serveurs qui rencontrent des bogues.
                $passage_ligne = "\r\n";
            }
            if(empty($messageText)) {
                $messageText = strip_tags(str_replace("<br />", "\n", $messageHTML));
            }
            //Creation de la boundary
            $boundary = "-----=" . md5(rand());
            //Creation du header de l'e-mail.
            $header = "From: \"" . $mail_from . "\" <" . $mail_from . ">" . $passage_ligne;
            $header .= "MIME-Version: 1.0" . $passage_ligne;
            $header .= "Content-Type: multipart/alternative;" . $passage_ligne . " boundary=\"$boundary\"" . $passage_ligne;
            //Creation du message.
            $message = $passage_ligne . "--" . $boundary . $passage_ligne;
            //Ajout du message au format texte.
            $message .= "Content-Type: text/plain; charset=\"".$charset."\"" . $passage_ligne;
            $message .= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
            $message .= $passage_ligne . $messageText . $passage_ligne;
            //Separateur html et text
            $message .= $passage_ligne . "--" . $boundary . $passage_ligne;
            //Ajout du message au format HTML
            $message .= "Content-Type: text/html; charset=\"".$charset."\"" . $passage_ligne;
            $message .= "Content-Transfer-Encoding: 8bit" . $passage_ligne;
            $message .= $passage_ligne . $messageHTML . $passage_ligne;
            //Fin du message
            $message .= $passage_ligne . "--" . $boundary . "--" . $passage_ligne;
            $message .= $passage_ligne . "--" . $boundary . "--" . $passage_ligne;
            //Envoi de l'e-mail.
            mail($mail, html_entity_decode($objet), html_entity_decode($message), $header);
            return $this;
        }

        /**
         * Verifier la validite du nom.
         */
        public static function validName(?string $name):bool {
            return !empty($name) && preg_match("/^.{3,}$/",$name);
        }

        /**
         * Verifier la validite de l'email.
         */
        public static function validEmail(?string $email):bool {
            $regexEmailValide = "/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/";
            return !empty($email) && preg_match($regexEmailValide,$email);
        }

        /**
         * Verifier la validite de l'objet du message.
         */
        public static function validObject(?string $object):bool {
            return !empty($object) && preg_match("/^.{3,255}$/",$object);
        }

        /**
         * Verifier la validite du message.
         */
        public static function validMessage(?string $message):bool {
            return !empty($message) && preg_match("/^.{8,}$/",$message);
        }
        
    }
}