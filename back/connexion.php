<?php
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            //On essaie de se connecter
            try{
                $dbco = new PDO("mysql:host=$servername;dbname=star_citizen;charset=utf8", $username, $password);
                //On définit le mode d'erreur de PDO sur Exception
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            /*On capture les exceptions si une exception est lancée et on affiche
             *les informations relatives à celle-ci*/
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }
