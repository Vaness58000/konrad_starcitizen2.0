<?php
include __DIR__.'/connexion.php';
include __DIR__.'/connexion_new.php';

// recup 01
$sth_users_old = $dbco->prepare("SELECT * FROM utilisateurs");
$sth_users_old->execute();
$users_old = $sth_users_old->fetchAll(PDO::FETCH_ASSOC);

foreach ($users_old as $construct) {
    $sth_users_new = $dbco_new->prepare("INSERT INTO ". 
                            "utilisateurs(pseudo, email, password, ip, token, date_inscription, id_role) ".
                                   "VALUES (:pseudo,:email,:password,:ip,:token,:date_inscription,2)");
    $sth_users_new->execute([":pseudo" => $construct["pseudo"],
                             ":email" => $construct["email"],
                             ":password" => $construct["password"],
                             ":ip" => $construct["ip"],
                             ":token" => $construct["token"],
                             ":date_inscription" => $construct["date_inscription"]]);
}

$sth_users_new = $dbco_new->prepare("INSERT INTO `objet_type` (`id`, `nom`, `id_user`, `date`) VALUES (1, 'armement', 2, '2023-02-10 09:22:50')");
$sth_users_new->execute();

$sth_users_new = $dbco_new->prepare("INSERT INTO `objet_type` (`id`, `nom`, `id_user`, `date`) VALUES (2, 'transport', 2, '2023-02-10 09:22:50')");
$sth_users_new->execute();

$sth_users_new = $dbco_new->prepare("INSERT INTO `objet_type` (`id`, `nom`, `id_user`, `date`) VALUES (3, 'Lieux', 2, '2023-02-10 09:22:50')");
$sth_users_new->execute();

$sth_users_new = $dbco_new->prepare("INSERT INTO `objet_type` (`id`, `nom`, `id_user`, `date`) VALUES (4, 'espèces', 2, '2023-02-10 09:22:50')");
$sth_users_new->execute();

// recup 02
$sth_users_pass_old = $dbco->prepare("SELECT * FROM password_recover");
$sth_users_pass_old->execute();
$users_pass_old = $sth_users_pass_old->fetchAll(PDO::FETCH_ASSOC);

foreach ($users_pass_old as $construct) {
    $sth_users_pass_new = $dbco_new->prepare("INSERT INTO ".
                        "password_recover(token_user, token, date_recover, date_validite, validite) ".
                                 "VALUES (:token_user, :token, :date_recover, :date_validite, 1)");
    $sth_users_pass_new->execute([":token_user" => $construct["token_user"],
                             ":token" => $construct["token"],
                             ":date_recover" => $construct["date_recover"],
                             ":date_validite" => $construct["date_recover"]]);
}

// recup 04
$sth_screens_old = $dbco->prepare("SELECT * FROM images");
$sth_screens_old->execute();
$screens_old = $sth_screens_old->fetchAll(PDO::FETCH_ASSOC);

foreach ($screens_old as $construct) {
    $sth_screens_new = $dbco_new->prepare("INSERT INTO ".
                                "screens(id_user, name, image, alt) ".
                                "VALUES (:id_user, :name, :image, :alt)");
    $sth_screens_new->execute([":id_user" => $construct["id_client"],
                             ":name" => $construct["name"],
                             ":image" => $construct["name"],
                             ":alt" => $construct["name"]]);
}

// recup 05
$sth_articles_old = $dbco->prepare("SELECT * FROM actus");
$sth_articles_old->execute();
$articles_old = $sth_articles_old->fetchAll(PDO::FETCH_ASSOC);

foreach ($articles_old as $construct) {
    $text = $construct["paragraphe1"]."\n\n".
            $construct["paragraphe2"]."\n\n".
            $construct["paragraphe3"]."\n\n".
            $construct["paragraphe4"]."\n\n".
            $construct["paragraphe5"]."\n\n".
            $construct["paragraphe6"]."\n\n".
            $construct["paragraphe7"];
    $sth_articles_new = $dbco_new->prepare("INSERT INTO ".
    "articles(id_user, titre, date, contenu, id_categorie_article, validation, resume) ".
    "VALUES (:id_user, :titre, :date, :contenu, :id_categorie_article, :validation, :resume)");
    $sth_articles_new->execute([":id_user" => 2,
                             ":titre" => $construct["titre"],
                             ":contenu" => $text,
                             ":date" => $construct["date"],
                             ":id_categorie_article" => 1,
                             ":validation" => 1,
                             ":resume" => $construct["resume"]]);
    $id = $dbco_new->lastInsertId();
    $sth_articles_img1_new = $dbco_new->prepare("INSERT INTO ".
                        "articles_image(name, src, alt, id_article) ".
                        "VALUES (:name, :src, :alt, :id_article)");
    $sth_articles_img1_new->execute([":name" => $construct["image1"],
                             ":src" => $construct["image1"],
                             ":alt" => $construct["image1"],
                             ":id_article" => $id]);
    $sth_articles_img2_new = $dbco_new->prepare("INSERT INTO ".
                             "articles_image(name, src, alt, id_article) ".
                             "VALUES (:name, :src, :alt, :id_article)");
    $sth_articles_img2_new->execute([":name" => $construct["image2"],
                            ":src" => $construct["image2"],
                            ":alt" => $construct["image2"],
                            ":id_article" => $id]);
}

// recup 06
$sth_constructeur_old = $dbco->prepare("SELECT * FROM constructeur");
$sth_constructeur_old->execute();
$constructeur_old = $sth_constructeur_old->fetchAll(PDO::FETCH_ASSOC);

foreach ($constructeur_old as $construct) {
    $text = $construct["paragraphe1"]."\n\n".
            $construct["paragraphe2"]."\n\n".
            $construct["paragraphe3"]."\n\n".
            $construct["paragraphe4"]."\n\n".
            $construct["paragraphe5"]."\n\n".
            $construct["paragraphe6"]."\n\n".
            $construct["paragraphe7"];
    $sth_constructeur_new = $dbco_new->prepare("INSERT INTO ".
    "constructeur (nom, logo, image, contenu, id_user) ".
    "VALUES (:nom, :logo, :image, :contenu, 2)");
    $sth_constructeur_new->execute([":nom" => $construct["nom"],
                             ":logo" => $construct["logo"],
                             ":image" => $construct["image"],
                             ":contenu" => $text]);
}

// recup 07
$sth_arme_old = $dbco->prepare("SELECT * FROM arme");
$sth_arme_old->execute();
$arme_old = $sth_arme_old->fetchAll(PDO::FETCH_ASSOC);

foreach ($arme_old as $construct) {
    $text = $construct["paragraphe"]."\n\n".
            $construct["paragraphe2"];
    $sth_arme_obj_new = $dbco_new->prepare("INSERT INTO ".
    "objet(nom, contenu, id_user, id_objet_type, validation) ".
    "VALUES (:nom, :contenu, :id_user, :id_objet_type, :validation)");
    $sth_arme_obj_new->execute([":nom" => $construct["nom"],
                             ":contenu" => $text,
                             ":id_user" => 2,
                             ":id_objet_type" => 1,
                             ":validation" => 1]);
    $id_obj = $dbco_new->lastInsertId();
    $sth_arme_obj_img_new = $dbco_new->prepare("INSERT INTO ".
    "images_objet(name, src, alt, id_objet) ".
    "VALUES (:name, :src, :alt, :id_objet)");
    $sth_arme_obj_img_new->execute([":name" => $construct["image"],
                             ":src" => $construct["image"],
                             ":alt" => $construct["image"],
                             ":id_objet" => $id_obj]);
    $sth_arme_new = $dbco_new->prepare("INSERT INTO ".
            "equipements_armement(id_objet, id_type) ".
            "VALUES (:id_objet, :id_type)");
    $sth_arme_new->execute([":id_objet" => $id_obj,
                             ":id_type" => 1]);
    $id_arm = $dbco_new->lastInsertId();
    $sth_arme_cat_new = $dbco_new->prepare("SELECT id_categ_arme FROM categorie_arm_fps WHERE nom=:nom");
    $sth_arme_cat_new->execute([":nom" => $construct["categorie"]]);
    $arme_id_cat = $sth_arme_cat_new->fetch(PDO::FETCH_ASSOC)["id_categ_arme"];
    $sth_arme_fps_new = $dbco_new->prepare("INSERT INTO arm_fps(id_arm, id_cat) VALUES (:id_arm, :id_cat)");
    $sth_arme_fps_new->execute([":id_arm" => $id_arm,
                             ":id_cat" => $arme_id_cat]);
}

// recup 08
$sth_lieux_old = $dbco->prepare("SELECT * FROM lieux");
$sth_lieux_old->execute();
$lieux_old = $sth_lieux_old->fetchAll(PDO::FETCH_ASSOC);

foreach ($lieux_old as $construct) {
    $text = $construct["paragraphe1"]."\n\n".
            $construct["paragraphe2"]."\n\n".
            $construct["paragraphe3"]."\n\n".
            $construct["paragraphe4"]."\n\n".
            $construct["paragraphe5"]."\n\n".
            $construct["paragraphe6"];
    $sth_lieux_obj_new = $dbco_new->prepare("INSERT INTO ".
    "objet(nom, contenu, id_user, id_objet_type, validation) ".
    "VALUES (:nom, :contenu, :id_user, :id_objet_type, :validation)");
    $sth_lieux_obj_new->execute([":nom" => $construct["nom"],
                             ":contenu" => $text,
                             ":id_user" => 2,
                             ":id_objet_type" => 3,
                             ":validation" => 1]);
    $id_obj = $dbco_new->lastInsertId();
    $sth_lieux_obj_img_new = $dbco_new->prepare("INSERT INTO ".
                            "images_objet(name, src, alt, id_objet) ".
                            "VALUES (:name, :src, :alt, :id_objet)");
    $sth_lieux_obj_img_new->execute([":name" => $construct["image"],
                             ":src" => $construct["image"],
                             ":alt" => $construct["image"],
                             ":id_objet" => $id_obj]);
    $sth_lieux_obj_img_new = $dbco_new->prepare("INSERT INTO ".
                             "images_objet(name, src, alt, id_objet, img_principal) ".
                             "VALUES (:name, :src, :alt, :id_objet, :img_principal)");
    $sth_lieux_obj_img_new->execute([":name" => $construct["imageprincipale"],
                            ":src" => $construct["imageprincipale"],
                            ":alt" => $construct["imageprincipale"],
                            ":id_objet" => $id_obj,
                            ":img_principal" => 1]);
    for ($i=1; $i < 6; $i++) { 
        $sth_lieux_obj_img_new = $dbco_new->prepare("INSERT INTO ".
                            "images_objet(name, src, alt, id_objet) ".
                            "VALUES (:name, :src, :alt, :id_objet)");
        $sth_lieux_obj_img_new->execute([":name" => $construct["image".$i],
                            ":src" => $construct["image".$i],
                            ":alt" => $construct["image".$i],
                            ":id_objet" => $id_obj]);
    }

    $sth_lieux_new = $dbco_new->prepare("INSERT INTO ".
    "lieux(id_objet, id_categ_lieu, validation, Habitable) ".
    "VALUES (:id_objet, :id_categ_lieu, :validation, :Habitable)");
    $sth_lieux_new->execute([":id_objet" => $id_obj,
                             ":id_categ_lieu" => 6,
                             ":validation" => 1,
                             ":Habitable" => 1]);

    $id_lieu = $dbco_new->lastInsertId();

    for ($i=1; $i < 5; $i++) { 
        $sth_lieux_info_new = $dbco_new->prepare("INSERT INTO ".
                            "info_objet(id_objet, nom, info) ".
                            "VALUES (:id_objet, :nom, :info)");
        $sth_lieux_info_new->execute([":nom" => "nomSatellite".$i,
                            ":info" => $construct["nomSatellite".$i],
                            ":id_objet" => $id_obj]);

        $id_obj_info = $dbco_new->lastInsertId();
        $sth_lieux_info_ing_new = $dbco_new->prepare("INSERT INTO ".
                            "images_info_objet(name, src, alt, id_info_objet) ".
                            "VALUES (:name, :src, :alt, :id_info_objet)");
        $sth_lieux_info_ing_new->execute([":name" => $construct["imagesatellite".$i],
                            ":src" => $construct["imagesatellite".$i],
                            ":alt" => $construct["imagesatellite".$i],
                            ":id_info_objet" => $id_obj_info]);
    }


    $sth_lieux_info_new = $dbco_new->prepare("INSERT INTO ".
    "info_objet(id_objet, nom, info) ".
    "VALUES (:id_objet, :nom, :info)");
$sth_lieux_info_new->execute([":nom" => "astre",
    ":info" => $construct["astre"],
    ":id_objet" => $id_obj]);


    $sth_lieux_info_new = $dbco_new->prepare("INSERT INTO ".
    "info_objet(id_objet, nom, info) ".
    "VALUES (:id_objet, :nom, :info)");
$sth_lieux_info_new->execute([":nom" => "juridiction",
    ":info" => $construct["juridiction"],
    ":id_objet" => $id_obj]);


    $sth_lieux_info_new = $dbco_new->prepare("INSERT INTO ".
    "info_objet(id_objet, nom, info) ".
    "VALUES (:id_objet, :nom, :info)");
$sth_lieux_info_new->execute([":nom" => "rayon",
    ":info" => $construct["rayon"],
    ":id_objet" => $id_obj]);


    $sth_lieux_info_new = $dbco_new->prepare("INSERT INTO ".
    "info_objet(id_objet, nom, info) ".
    "VALUES (:id_objet, :nom, :info)");
$sth_lieux_info_new->execute([":nom" => "atmosphere",
    ":info" => $construct["atmosphere"],
    ":id_objet" => $id_obj]);


    $sth_lieux_info_new = $dbco_new->prepare("INSERT INTO ".
    "info_objet(id_objet, nom, info) ".
    "VALUES (:id_objet, :nom, :info)");
$sth_lieux_info_new->execute([":nom" => "satellites_naturels",
    ":info" => $construct["satellites_naturels"],
    ":id_objet" => $id_obj]);


    $sth_lieux_info_new = $dbco_new->prepare("INSERT INTO ".
    "info_objet(id_objet, nom, info) ".
    "VALUES (:id_objet, :nom, :info)");
$sth_lieux_info_new->execute([":nom" => "satellites_artificiels",
    ":info" => $construct["satellites_artificiels"],
    ":id_objet" => $id_obj]);


    $sth_lieux_info_new = $dbco_new->prepare("INSERT INTO ".
    "info_objet(id_objet, nom, info) ".
    "VALUES (:id_objet, :nom, :info)");
$sth_lieux_info_new->execute([":nom" => "biomes",
    ":info" => $construct["biomes"],
    ":id_objet" => $id_obj]);


    $sth_lieux_info_new = $dbco_new->prepare("INSERT INTO ".
    "info_objet(id_objet, nom, info) ".
    "VALUES (:id_objet, :nom, :info)");
$sth_lieux_info_new->execute([":nom" => "avant_postes",
    ":info" => $construct["avant_postes"],
    ":id_objet" => $id_obj]);


    $sth_lieux_info_new = $dbco_new->prepare("INSERT INTO ".
    "info_objet(id_objet, nom, info) ".
    "VALUES (:id_objet, :nom, :info)");
$sth_lieux_info_new->execute([":nom" => "usines",
    ":info" => $construct["usines"],
    ":id_objet" => $id_obj]);
    
}

// recup 09
$sth_lunes_old = $dbco->prepare("SELECT * FROM lunes");
$sth_lunes_old->execute();
$lunes_old = $sth_lunes_old->fetchAll(PDO::FETCH_ASSOC);

foreach ($lunes_old as $construct) {
    $text = $construct["paragraphe1"]."\n\n".
            $construct["paragraphe2"]."\n\n".
            $construct["paragraphe3"];
    $sth_lunes_obj_new = $dbco_new->prepare("INSERT INTO ".
    "objet(nom, contenu, id_user, id_objet_type, validation) ".
    "VALUES (:nom, :contenu, :id_user, :id_objet_type, :validation)");
    $sth_lunes_obj_new->execute([":nom" => $construct["nom"],
                             ":contenu" => $text,
                             ":id_user" => 2,
                             ":id_objet_type" => 3,
                             ":validation" => 1]);
    $id_obj = $dbco_new->lastInsertId();
    $sth_lunes_obj_img_new = $dbco_new->prepare("INSERT INTO ".
                            "images_objet(name, src, alt, id_objet) ".
                            "VALUES (:name, :src, :alt, :id_objet)");
    $sth_lunes_obj_img_new->execute([":name" => $construct["image"],
                             ":src" => $construct["image"],
                             ":alt" => $construct["image"],
                             ":id_objet" => $id_obj]);
    for ($i=1; $i < 2; $i++) { 
        $sth_lunes_obj_img_new = $dbco_new->prepare("INSERT INTO ".
                            "images_objet(name, src, alt, id_objet) ".
                            "VALUES (:name, :src, :alt, :id_objet)");
        $sth_lunes_obj_img_new->execute([":name" => $construct["image".$i],
                            ":src" => $construct["image".$i],
                            ":alt" => $construct["image".$i],
                            ":id_objet" => $id_obj]);
    }

    $sth_lunes_new = $dbco_new->prepare("INSERT INTO ".
    "lieux(id_objet, id_categ_lieu, validation, Habitable) ".
    "VALUES (:id_objet, :id_categ_lieu, :validation, :Habitable)");
    $sth_lunes_new->execute([":id_objet" => $id_obj,
                             ":id_categ_lieu" => 4,
                             ":validation" => 1,
                             ":Habitable" => 1]);

    $id_lieu = $dbco_new->lastInsertId();


    $sth_lunes_info_new = $dbco_new->prepare("INSERT INTO ".
    "info_objet(id_objet, nom, info) ".
    "VALUES (:id_objet, :nom, :info)");
$sth_lunes_info_new->execute([":nom" => "orbite",
    ":info" => $construct["orbite"],
    ":id_objet" => $id_obj]);


    $sth_lunes_info_new = $dbco_new->prepare("INSERT INTO ".
    "info_objet(id_objet, nom, info) ".
    "VALUES (:id_objet, :nom, :info)");
$sth_lunes_info_new->execute([":nom" => "affiliation",
    ":info" => $construct["affiliation"],
    ":id_objet" => $id_obj]);


    $sth_lunes_info_new = $dbco_new->prepare("INSERT INTO ".
    "info_objet(id_objet, nom, info) ".
    "VALUES (:id_objet, :nom, :info)");
$sth_lunes_info_new->execute([":nom" => "rayon",
    ":info" => $construct["rayon"],
    ":id_objet" => $id_obj]);


    $sth_lunes_info_new = $dbco_new->prepare("INSERT INTO ".
    "info_objet(id_objet, nom, info) ".
    "VALUES (:id_objet, :nom, :info)");
$sth_lunes_info_new->execute([":nom" => "gravite",
    ":info" => $construct["gravite"],
    ":id_objet" => $id_obj]);


    $sth_lunes_info_new = $dbco_new->prepare("INSERT INTO ".
    "info_objet(id_objet, nom, info) ".
    "VALUES (:id_objet, :nom, :info)");
$sth_lunes_info_new->execute([":nom" => "air",
    ":info" => $construct["air"],
    ":id_objet" => $id_obj]);


    $sth_lunes_info_new = $dbco_new->prepare("INSERT INTO ".
    "info_objet(id_objet, nom, info) ".
    "VALUES (:id_objet, :nom, :info)");
$sth_lunes_info_new->execute([":nom" => "altitude",
    ":info" => $construct["altitude"],
    ":id_objet" => $id_obj]);


    $sth_lunes_info_new = $dbco_new->prepare("INSERT INTO ".
    "info_objet(id_objet, nom, info) ".
    "VALUES (:id_objet, :nom, :info)");
$sth_lunes_info_new->execute([":nom" => "atmosphere",
    ":info" => $construct["atmosphere"],
    ":id_objet" => $id_obj]);


    $sth_lunes_info_new = $dbco_new->prepare("INSERT INTO ".
    "info_objet(id_objet, nom, info) ".
    "VALUES (:id_objet, :nom, :info)");
$sth_lunes_info_new->execute([":nom" => "rotation",
    ":info" => $construct["rotation"],
    ":id_objet" => $id_obj]);


    $sth_lunes_info_new = $dbco_new->prepare("INSERT INTO ".
    "info_objet(id_objet, nom, info) ".
    "VALUES (:id_objet, :nom, :info)");
$sth_lunes_info_new->execute([":nom" => "revolution",
    ":info" => $construct["revolution"],
    ":id_objet" => $id_obj]);


    $sth_lunes_info_new = $dbco_new->prepare("INSERT INTO ".
    "info_objet(id_objet, nom, info) ".
    "VALUES (:id_objet, :nom, :info)");
$sth_lunes_info_new->execute([":nom" => "satellite",
    ":info" => $construct["satellite"],
    ":id_objet" => $id_obj]);

    
}

// recup 10
$sth_villes_old = $dbco->prepare("SELECT * FROM ville");
$sth_villes_old->execute();
$villes_old = $sth_villes_old->fetchAll(PDO::FETCH_ASSOC);

foreach ($villes_old as $construct) {
    $text = "[h1]".$construct["titre1"]."[\h1]";
    for ($i=2; $i < 6; $i++) { 
        $text .= "\n\n"."[h1]".$construct["titre".$i]."[\h1]";
    }
    for ($i=1; $i < 10; $i++) { 
        $text .= "\n\n".$construct["paragraphe".$i];
    }
    for ($i=13; $i < 15; $i++) { 
        $text .= "\n\n".$construct["paragraphe".$i];
    }
    $sth_villes_obj_new = $dbco_new->prepare("INSERT INTO ".
    "objet(nom, contenu, id_user, id_objet_type, validation) ".
    "VALUES (:nom, :contenu, :id_user, :id_objet_type, :validation)");
    $sth_villes_obj_new->execute([":nom" => $construct["nom"],
                             ":contenu" => $text,
                             ":id_user" => 2,
                             ":id_objet_type" => 3,
                             ":validation" => 1]);
    $id_obj = $dbco_new->lastInsertId();
    $sth_villes_obj_img_new = $dbco_new->prepare("INSERT INTO ".
                            "images_objet(name, src, alt, id_objet) ".
                            "VALUES (:name, :src, :alt, :id_objet)");
    $sth_villes_obj_img_new->execute([":name" => $construct["image"],
                             ":src" => $construct["image"],
                             ":alt" => $construct["image"],
                             ":id_objet" => $id_obj]);
    for ($i=2; $i < 9; $i++) { 
        $sth_villes_obj_img_new = $dbco_new->prepare("INSERT INTO ".
                            "images_objet(name, src, alt, id_objet) ".
                            "VALUES (:name, :src, :alt, :id_objet)");
        $sth_villes_obj_img_new->execute([":name" => $construct["image".$i],
                            ":src" => $construct["image".$i],
                            ":alt" => $construct["image".$i],
                            ":id_objet" => $id_obj]);
    }
    $sth_villes_new = $dbco_new->prepare("INSERT INTO ".
    "lieux(id_objet, id_categ_lieu, validation, Habitable) ".
    "VALUES (:id_objet, :id_categ_lieu, :validation, :Habitable)");
    $sth_villes_new->execute([":id_objet" => $id_obj,
                             ":id_categ_lieu" => 5,
                             ":validation" => 1,
                             ":Habitable" => 1]);

}

// recup 11
$sth_vaisseau_old = $dbco->prepare("SELECT * FROM vaisseau");
$sth_vaisseau_old->execute();
$vaisseau_old = $sth_vaisseau_old->fetchAll(PDO::FETCH_ASSOC);

foreach ($vaisseau_old as $construct) {
    $sth_vaisseau_obj_new = $dbco_new->prepare("INSERT INTO ".
    "objet(nom, contenu, id_user, id_objet_type, validation) ".
    "VALUES (:nom, :contenu, :id_user, :id_objet_type, :validation)");
    $sth_vaisseau_obj_new->execute([":nom" => $construct["nom_vaisseau"],
                             ":contenu" => $construct["description"],
                             ":id_user" => 2,
                             ":id_objet_type" => 2,
                             ":validation" => 1]);
    $id_obj = $dbco_new->lastInsertId();
    $sth_vaisseau_obj_img_new = $dbco_new->prepare("INSERT INTO ".
                            "images_objet(name, src, alt, id_objet, img_principal) ".
                            "VALUES (:name, :src, :alt, :id_objet, :img_principal)");
    $sth_vaisseau_obj_img_new->execute([":name" => $construct["image_vaisseau"],
                             ":src" => $construct["image_vaisseau"],
                             ":alt" => $construct["image_vaisseau"],
                             ":id_objet" => $id_obj,
                             ":img_principal" => 1]);
    if (!empty($construct["idConstructeur"])) {
        $sth_vaisseau_const_old = $dbco->prepare("SELECT nom FROM constructeur WHERE idConstructeur=:idConstructeur");
        $sth_vaisseau_const_old->execute([":idConstructeur" => $construct["idConstructeur"]]);
        $nom_vaisseau_const = $sth_vaisseau_const_old->fetch(PDO::FETCH_ASSOC)["nom"];

        if(!empty($nom_vaisseau_const)) {
            $sth_vaisseau_const_new = $dbco_new->prepare("SELECT id_constructeur FROM constructeur WHERE nom=:nom");
            $sth_vaisseau_const_new->execute([":nom" => $nom_vaisseau_const]);
            $vaisseau_const_id = $sth_vaisseau_const_new->fetch(PDO::FETCH_ASSOC)["id_constructeur"];

        }
    }

    $sth_vaisseau_cat_new = $dbco_new->prepare("SELECT id_transport FROM categorie_transport WHERE nom=:nom");
    $sth_vaisseau_cat_new->execute([":nom" => $construct["categorie"]]);
    $vaisseau_cat_id = $sth_vaisseau_cat_new->fetch(PDO::FETCH_ASSOC)["id_transport"];

    $sth_vaisseau_new = $dbco_new->prepare("INSERT INTO ".
    "equipements_transports(id_objet, prix, equipage, taille, poids, vitesse_max, capacite, categorie, type, id_disponible) ".
    "VALUES (:id_objet, :prix, :equipage, :taille, :poids, :vitesse_max, :capacite, :categorie, :type, :id_disponible)");
    $sth_vaisseau_new->execute([":id_objet" => $id_obj,
                            ":prix" => $construct["prix"],
                            ":equipage" => $construct["equipage"],
                            ":taille" => $construct["taille"],
                            ":poids" => $construct["poids"],
                            ":vitesse_max" => $construct["vitesse_max"],
                            ":capacite" => $construct["capacite"],
                            ":categorie" => $vaisseau_cat_id,
                            ":type" => $vaisseau_cat_id,
                            ":id_disponible" => 1]);
    $id_transp = $dbco_new->lastInsertId();

    if(!empty($nom_vaisseau_const)) {
        $sth_vaisseau_const_add_new = $dbco_new->prepare("INSERT INTO ".
        "construct_transp(id_construct, id_transp) ".
        "VALUES (:id_construct, :id_transp)");
        $sth_vaisseau_const_add_new->execute([":id_construct" => $vaisseau_const_id,
                                ":id_transp" => $id_transp]);
    }
    $sth_vaisseau_info_new = $dbco_new->prepare("INSERT INTO ".
    "info_objet(id_objet, nom, info) ".
    "VALUES (:id_objet, :nom, :info)");
    $sth_vaisseau_info_new->execute([":id_objet" => $id_obj,
                            ":nom" => "forces",
                            ":info" => $construct["forces"]]);
    $sth_vaisseau_info_new = $dbco_new->prepare("INSERT INTO ".
                            "info_objet(id_objet, nom, info) ".
                            "VALUES (:id_objet, :nom, :info)");
    $sth_vaisseau_info_new->execute([":id_objet" => $id_obj,
                            ":nom" => "faiblesses",
                            ":info" => $construct["faiblesses"]]);

}
