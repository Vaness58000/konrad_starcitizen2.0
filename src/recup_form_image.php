<?php
session_start();
include "../back/connexion.php";
   
if(isset($_POST['submit'])) {
  
    // Count total files
    $countfiles = count($_FILES['files']['name']);

    function valid_donnees($donnees){
        $donnees = trim($donnees);
        $donnees = stripslashes($donnees);
        $donnees = htmlspecialchars($donnees);
        $donnees = strip_tags($donnees);
        return $donnees;
    }
    
    $id_client = $_SESSION["utilisateur"]["id"];

    // Prepared statement
    $query = "INSERT INTO images (id_client,name,image) VALUES(:id_client,:name,:image)";
  
    $statement = $dbco->prepare($query);
    $statement->bindParam(':id_client',$id_client);

    // Loop all files
    for($i = 0; $i < $countfiles; $i++) {
  
        // File name
        $filename = $_FILES['files']['name'][$i];
      
        // Location
        $target_file = '../upload/'.$filename;
      
        // file extension
        $file_extension = pathinfo(
            $target_file, PATHINFO_EXTENSION);
             
        $file_extension = strtolower($file_extension);
      
        // Valid image extension
        $valid_extension = array("png","jpeg","jpg");
      
        if(in_array($file_extension, $valid_extension)) {
  
            // Upload file
            if(move_uploaded_file(
                $_FILES['files']['tmp_name'][$i],
                $target_file)
            ) {
 
                // Execute query
                $statement->bindParam(':name',valid_donnees($filename));
                $statement->bindParam(':image',valid_donnees($target_file));
                $statement->execute();
            }
        }
    }
     
    header("Location:../gestion_screen.php");
}
