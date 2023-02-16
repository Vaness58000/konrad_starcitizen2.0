<?php
/**
 * numero d'error de la classe '1006XXXXXX'
 */
if (!class_exists('SGBD_crypt')) {
    
    /* en cas d'erreur sur la classe */
    include_once dirname(__FILE__) . '/Error_Log.php';

    class SGBD_crypt {
        
        private $first_method;
        private $second_method;
        private $first_Key;
        private $second_key;
        private $error_log;
        private $error_text;
        private $nmError;
        private $is_error;

        /**
         * constructeur par defaut.
         */
        public function __construct(?string $first_key = null, ?string $second_key = null) {
            $this->error_text = "";
            $this->nmError = 0;
            $this->is_error = false;
            $this->error_log = new Error_Log();
            $this->first_method = "aes-256-cbc";
            $this->second_method = 'sha3-512';
            $this->first_Key = $first_key;
            $this->second_key = $second_key;
        }
        
        /**
         * Message d'erreur
         * 
         * @return string|null Message d'erreur
         */
        public function error_text(): ?string {
            return $this->error_text;
        }

        /**
         * Code erreur
         * 
         * @return int Code erreur
         */
        public function getNumError(): int {
            return $this->nmError;
        }

        /**
         * crypter le mot de passe.
         */
        public function encrypt(?string $input):string {
            if(empty($input)){
                return "";
            }
            try {
                $first_key = base64_decode($this->first_Key);
                $second_key = base64_decode($this->second_key);   
                
                $method = $this->first_method;   
                $iv_length = openssl_cipher_iv_length($method);
                $iv = openssl_random_pseudo_bytes($iv_length);
                    
                $first_encrypted = openssl_encrypt($input,$method,$first_key, OPENSSL_RAW_DATA ,$iv);   
                $second_encrypted = hash_hmac($this->second_method, $first_encrypted, $second_key, TRUE);
                        
                $output = base64_encode($iv.$second_encrypted.$first_encrypted); 
                $all_error = "";
                while ($msg = openssl_error_string()) {
                    $all_error = "error : ".$msg . "\n";
                }
                if(!empty($all_error)) {
                    try {
                        throw new Exception($all_error);
                    } catch (Exception $e) {
                        $this->is_error = true;
                        $this->nmError = 1006000000;
                        $error_message = $e;
                        $this->error_log->addError($error_message, $this->nmError);
                    }
                }
                return $output;   
            } catch (Exception $e) {
                $this->is_error = true;
                $this->nmError = 1006000001;
                $error_message = $e;
                $this->error_log->addError($error_message, $this->nmError);
            }
            return "";       
        }

        /**
         * decrypter le mot de passe.
         */
        public function decrypt(?string $input):?string {
            if(empty($input)){
                return "";
            }
            try {
                $first_key = base64_decode($this->first_Key);
                $second_key = base64_decode($this->second_key);           
                $mix = base64_decode($input);
                    
                $method = $this->first_method;   
                $iv_length = openssl_cipher_iv_length($method);
                        
                $iv = substr($mix,0,$iv_length);
                $second_encrypted = substr($mix,$iv_length,64);
                $first_encrypted = substr($mix,$iv_length+64);
                        
                $data = openssl_decrypt($first_encrypted, $method, $first_key, OPENSSL_RAW_DATA, $iv);
                $second_encrypted_new = hash_hmac($this->second_method, $first_encrypted, $second_key, TRUE);
                
                if (hash_equals($second_encrypted,$second_encrypted_new)) {
                    return $data; 
                }
                
                $all_error = "";
                while ($msg = openssl_error_string()) {
                    $all_error = "error : ".$msg . "\n";
                }
                if(!empty($all_error)) {
                    try {
                        throw new Exception($all_error);
                    } catch (Exception $e) {
                        $this->is_error = true;
                        $this->nmError = 1006000002;
                        $error_message = $e;
                        $this->error_log->addError($error_message, $this->nmError);
                    }
                }
            } catch (Exception $e) {
                $this->is_error = true;
                $this->nmError = 1006000003;
                $error_message = $e;
                $this->error_log->addError($error_message, $this->nmError);
            }
            
            return "";
        }

        /**
         * verifier l'existance d'une erreur.
         */
        public function isError(): bool {
            return $this->is_error;
        }

        /**
         * creation des clees.
         */
        public static function createKey():?array {
            return ["first_Key" => base64_encode(openssl_random_pseudo_bytes(32)),
                    "second_key" => base64_encode(openssl_random_pseudo_bytes(64))];
        }

        public static function createKey_pass(?string $pass):?array {
            $allkey = SGBD_crypt::createKey();
            $recup_pass_crypt = new SGBD_crypt($allkey["first_Key"], $allkey["second_key"]);
            $allkey["pass"] = $recup_pass_crypt->encrypt($pass);
            return $allkey;
        }

    }
}
