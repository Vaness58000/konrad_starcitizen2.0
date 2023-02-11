<?php
            
$servername1 = 'testdiscord_mariadb';
$username1 = 'root';
$password1 = 'secret';
$basename1 = "citizen";
            
            //On essaie de se connecter
            try{
                $dbco1 = new PDO("mysql:host=$servername1;dbname=$basename1;charset=utf8", $username1, $password1);
                //On définit le mode d'erreur de PDO sur Exception
                $dbco1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            /*On capture les exceptions si une exception est lancée et on affiche
             *les informations relatives à celle-ci*/
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
