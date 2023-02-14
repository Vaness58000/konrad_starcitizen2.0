<?php
include __DIR__ . '/../../back/connexion_new.php';
try {
    $folder_img_main = __DIR__ . "/../../img/";
    $folder_upload_main = __DIR__ . "/../../upload/";

    if (!is_dir($folder_upload_main)) {
        mkdir($folder_upload_main, 0755, true);
    }

    /*$scandir = scandir($folder_img_main);
foreach($scandir as $fichier){
    echo "$fichier<br/>";
}

$scandir = scandir($folder_upload_main);
foreach($scandir as $fichier){
    echo "$fichier<br/>";
}*/

    function move_img(?string $folder_old, ?string $folder, ?string $image)
    {
        if (!is_dir($folder)) {
            mkdir($folder, 0755, true);
        }
        if (file_exists($folder_old . "/" . $image)) {
            copy($folder_old . "/" . $image, $folder . "/" . $image);
            unlink($folder_old . "/" . $image);
        }
    }

    function enleveaccents($chaine)
    {
        return strtr(
            $chaine,
            "ÀÁÂàÄÅàáâàäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ",
            "aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn"
        );
    }

    function display_tab(?array $tab)
    {
        /*echo "<br/><br/><pre>";
    print_r($tab);
    echo "</pre>";*/
    }

    $sth_img_screen = $dbco_new->prepare("SELECT * FROM screens");
    $sth_img_screen->execute();
    $img_screen = $sth_img_screen->fetchAll(PDO::FETCH_ASSOC);
    $folder = $folder_upload_main . "screen/";
    display_tab($img_screen);
    foreach ($img_screen as $construct) {
        $sth_users_new = $dbco_new->prepare("UPDATE screens SET src=:src WHERE id_screen=:id_screen");
        $sth_users_new->execute([
            ":src" => $construct["name"],
            ":id_screen" => $construct["id_screen"]
        ]);
        if (!empty($construct["name"])) {
            if (file_exists($folder_img_main . $construct["name"])) {
                move_img($folder_img_main, $folder, $construct["name"]);
            } else if (file_exists($folder_upload_main . $construct["name"])) {
                move_img($folder_upload_main, $folder, $construct["name"]);
            }
        }
    }

    $sth_img_article = $dbco_new->prepare("SELECT * FROM articles_image");
    $sth_img_article->execute();
    $img_article = $sth_img_article->fetchAll(PDO::FETCH_ASSOC);
    $folder = $folder_upload_main . "articles/";
    display_tab($img_article);
    foreach ($img_article as $construct) {
        if (!empty($construct["src"])) {
            if (file_exists($folder_img_main . $construct["src"])) {
                move_img($folder_img_main, $folder, $construct["src"]);
            } else if (file_exists($folder_upload_main . $construct["src"])) {
                move_img($folder_upload_main, $folder, $construct["src"]);
            }
        }
    }

    $sth_img_constructeur = $dbco_new->prepare("SELECT * FROM constructeur");
    $sth_img_constructeur->execute();
    $img_constructeur = $sth_img_constructeur->fetchAll(PDO::FETCH_ASSOC);
    $folder = $folder_upload_main . "constructeurs/";
    $folder_logo = $folder_upload_main . "constructeurs_logo/";
    display_tab($img_constructeur);
    foreach ($img_constructeur as $construct) {
        if (!empty($construct["image"])) {
            if (file_exists($folder_img_main . $construct["image"])) {
                move_img($folder_img_main, $folder, $construct["image"]);
            } else if (file_exists($folder_upload_main . $construct["image"])) {
                move_img($folder_upload_main, $folder, $construct["image"]);
            }
        }
        if (!empty($construct["logo"])) {
            if (file_exists($folder_img_main . $construct["logo"])) {
                move_img($folder_img_main, $folder_logo, $construct["logo"]);
            } else if (file_exists($folder_upload_main . $construct["logo"])) {
                move_img($folder_upload_main, $folder_logo, $construct["logo"]);
            }
        }
    }

    $sth_img_obj = $dbco_new->prepare("SELECT *, objet_type.nom AS nom_type, images_info_objet.src AS img_src FROM  objet INNER JOIN objet_type ON objet.id_objet_type = objet_type.id INNER JOIN info_objet ON objet.id = info_objet.id_objet INNER JOIN images_info_objet ON info_objet.id = images_info_objet.id_info_objet");
    $sth_img_obj->execute();
    $img_obj = $sth_img_obj->fetchAll(PDO::FETCH_ASSOC);
    display_tab($img_obj);
    foreach ($img_obj as $construct) {
        $folder = $folder_upload_main . strtolower(enleveaccents($construct["nom_type"])) . "/";
        if (!empty($construct["img_src"])) {
            if (file_exists($folder_img_main . $construct["img_src"])) {
                move_img($folder_img_main, $folder, $construct["img_src"]);
            } else if (file_exists($folder_upload_main . $construct["img_src"])) {
                move_img($folder_upload_main, $folder, $construct["img_src"]);
            }
        }
    }

    $sth_img_obj_info = $dbco_new->prepare("SELECT *, objet_type.nom AS nom_type, images_objet.src AS img_src FROM  objet INNER JOIN objet_type ON objet.id_objet_type = objet_type.id INNER JOIN images_objet ON objet.id = images_objet.id_image_obj");
    $sth_img_obj_info->execute();
    $img_obj_info = $sth_img_obj_info->fetchAll(PDO::FETCH_ASSOC);
    display_tab($img_obj_info);
    foreach ($img_obj_info as $construct) {
        $folder = $folder_upload_main . strtolower(enleveaccents($construct["nom_type"])) . "/";
        if (!empty($construct["img_src"])) {
            if (file_exists($folder_img_main . $construct["img_src"])) {
                move_img($folder_img_main, $folder, $construct["img_src"]);
            } else if (file_exists($folder_upload_main . $construct["img_src"])) {
                move_img($folder_upload_main, $folder, $construct["img_src"]);
            }
        }
    }
} catch (Exception $e) {
    echo "<br/>" . $e;
} catch (ParseError $e) {
    echo "<br/>" . $e;
}
