<?php
            
            include __DIR__.'/sgbd_connexion_new.php';
            
            //On essaie de se connecter
            try{
                $dbco_new = new PDO("mysql:host=$servername_new;dbname=$basename_new;charset=utf8", $username_new, $password_new);
                //On définit le mode d'erreur de PDO sur Exception
                $dbco_new->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            /*On capture les exceptions si une exception est lancée et on affiche
             *les informations relatives à celle-ci*/
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
