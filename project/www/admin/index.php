<?php 
session_start();
$get_ind = "espace_user";
if(!empty($_GET['ind'])) {
    $get_ind = $_GET['ind'];
}
if(!isset($_SESSION['user'])) {
    header('Location: ./../?ind=login');
}

include __DIR__.'/../src/class/classSite/Config.php';
include __DIR__.'/../src/class/classMain/TemplatePage.php';
include __DIR__.'/../src/repository/UsersRepository.php';

$templateIndex = new TemplatePage(__DIR__.'/src/template/header_footer.html');
$templateMenuAdmin = new TemplatePage(__DIR__.'/src/template/menu_admin.html');
$no_session = new TemplatePage(__DIR__.'/src/template/session/no_session.html');
$one_session = new TemplatePage(__DIR__.'/src/template/session/one_session.html');
$menu_session = $no_session->html();
$js = "";
$css = "";
$contenu = "";
$add_menu_admin = "";

$usersRepository = new UsersRepository();
$user = $usersRepository->findAllId($_SESSION['utilisateur']['id']);
$id_role = intval($user["id_role"]);
$isAdmin = $id_role == 2;

$templateMenuAdmin->addFileCss("./src/css/style_admin.css");

if($isAdmin) {
    $add_admin_session = new TemplatePage(__DIR__.'/src/template/session/add_admin.html');
    $add_menu_admin = $add_admin_session->html();
}

if (isset($_SESSION['user'])) {
    $menu_session = $one_session->html();
}

/*
./?ind=espace_user">Mon compte</a></li>
            <li><a class="radio" href="./?ind=articles">Les articles</a></li>
            <li><a class="radio" href="./?ind=screens">Les screens</a></li>
            <li><a class="radio" href="./?ind=arm_fps">L'armement FPS</a></li>
            <li><a class="radio" href="./?ind=arm_vaiss">L'armement vaisseau</a></li>
            <li><a class="radio" href="./?ind=lieux">Lieux</a></li>
            <li><a class="radio" href="./?ind=especes">Espèces</a></li>
            <li><a class="radio" href="./?ind=construct">Constructeurs</a></li>
            <li><a class="radio" href="./?ind=transports">Transports</a></li>
            <li><a class="radio" href="./?ind=proprietaires">Propriétaires</a></li>
            <li><a class="radio" href="./?ind=services">Services</a></li>
            <li><a class="radio" href="./?ind=messages">Messages</a></li>
            <li><a class="radio" href="./?ind=utilisateurs
*/
if($get_ind == "acc") {
} else if($get_ind == "espace_user") {
    include __DIR__.'/src/pages/users/espace_user.php';
} else if($get_ind == "screens" || $get_ind == "screens_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "screens_all");
    include __DIR__.'/src/pages/gameplay/screens.php';
} else if($get_ind == "add_screen" || $get_ind == "mod_screen"){
    //$_GET["type"]=1;
    include __DIR__.'/src/pages/gameplay/add_mod_screens.php';
} else if($get_ind == "articles" || $get_ind == "articles_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "articles_all");
    include __DIR__.'/src/pages/gameplay/articles.php';
} else if($get_ind == "add_article" || $get_ind == "mod_article"){
    //$_GET["type"]=1;
    include __DIR__.'/src/pages/gameplay/add_mod_article.php';
} else if($get_ind == "arm_fps" || $get_ind == "arm_fps_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "arm_fps_all");
    include __DIR__.'/src/pages/objet/arm_fps.php';
} else if($get_ind == "arm_vaiss" || $get_ind == "arm_vaiss_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "arm_vaiss_all");
    include __DIR__.'/src/pages/objet/arm_vaiss.php';
} else if($get_ind == "lieux" || $get_ind == "lieux_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "lieux_all");
    include __DIR__.'/src/pages/objet/lieux.php';
} else if($get_ind == "construct" || $get_ind == "construct_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "construct_all");
    include __DIR__.'/src/pages/gameplay/construct.php';
} else if($get_ind == "add_construct" || $get_ind == "mod_construct"){
    //$_GET["type"]=1;
    include __DIR__.'/src/pages/gameplay/add_mod_construct.php';
} else if($get_ind == "transports" || $get_ind == "transports_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "transports_all");
    include __DIR__.'/src/pages/objet/transports.php';
} else if($get_ind == "especes" || $get_ind == "especes_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "especes_all");
    include __DIR__.'/src/pages/objet/especes.php';
} else if($get_ind == "proprietaires" || $get_ind == "proprietaires_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "proprietaires_all");
    include __DIR__.'/src/pages/objet/proprietaires.php';
} else if($get_ind == "services" || $get_ind == "services_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "services_all");
    include __DIR__.'/src/pages/objet/services.php';
} else if($get_ind == "messages" && $isAdmin) {
    include __DIR__.'/src/pages/users/messages.php';
} else if($get_ind == "utilisateurs" && $isAdmin) {
    include __DIR__.'/src/pages/users/users.php';
} else {
    include __DIR__.'/src/pages/users/espace_user.php';
}

if($get_ind != "connexion" && $get_ind != "inscription_traitement" && $get_ind != "deconnexion") {
    $templateMenuAdmin->addVarString("[#CITIZEN_INDEX_PAGE_ADMIN#]", $contenu);
    $contenu = $templateMenuAdmin->html();
    $templateIndex->addVarString("[#CITIZEN_INDEX_SESSION#]", $menu_session);
    $templateIndex->addVarString("[#CITIZEN_INDEX_CSS#]", $templateMenuAdmin->css().$css);
    $templateIndex->addVarString("[#CITIZEN_INDEX_PAGE#]", $contenu);
    $templateIndex->addVarString("[#CITIZEN_INDEX_JS#]", $templateMenuAdmin->js().$js);
    $templateIndex->addVarString("[#CITIZEN_INDEX_ADD_MENU_ADMIN#]", $add_menu_admin);
    echo $templateIndex->html();
}


/*
    if($get_ind == "acc") {
        include __DIR__.'/src/pages/acc.php';
    }

    / *equipements* /
    else if($get_ind == "equipements") {
        include __DIR__.'/src/pages/equipements/equipement.php';
    }
    else if($get_ind == "vaisseau") {
        include __DIR__.'/src/pages/equipements/vaisseau.php';
    }
    else if($get_ind == "vaisseau_ind"){
        include __DIR__.'/src/pages/equipements/vaisseau_ind.php';
    }
    else if($get_ind == "vaisseau_construct") {
        include __DIR__.'/src/pages/equipements/vaisseau_construct.php';
    }
    else if($get_ind == "vehicule"){
        include __DIR__.'/src/pages/equipements/vehicule.php';
    }
    else if($get_ind == "vehicule_ind"){
        include __DIR__.'/src/pages/equipements/vehicule_ind.php';
    }
    else if($get_ind == "vehicule_construct"){
        include __DIR__.'/src/pages/equipements/vehicule_construct.php';
    }
    else if($get_ind == "armes"){
        include __DIR__.'/src/pages/equipements/arme.php';
    } 
    else if($get_ind == "arme_ind") {
        include __DIR__.'/src/pages/equipements/arme_ind.php';
    }
    else if($get_ind == "verif_form") {
        include __DIR__.'/src/pages/equipements/verif-form.php';
    }
    / *fin equipements* /

    / * actu/patch* /
    else if($get_ind == "actualites"){
        include __DIR__.'/src/pages/actualites.php';
    }
    else if($get_ind == "actualite_ind"){
        include __DIR__.'/src/pages/actualite_ind.php';
    }
    else if($get_ind == "patch_note"){
        include __DIR__.'/src/pages/patch_note.php';
    }
    else if($get_ind == "patch_ind"){
        include __DIR__.'/src/pages/patch_note_ind.php';
    }
    / *fin actu/patch* /

    / *lieu* /
    else if($get_ind == "lieux"){
        include __DIR__.'/src/pages/lieux/lieu.php';
    }
    else if($get_ind == "systemes"){
        include __DIR__.'/src/pages/lieux/systemes.php';
    }
    else if($get_ind == "systeme_ind"){
        include __DIR__.'/src/pages/lieux/systeme_ind.php';
    }
    else if($get_ind == "planetes"){
        include __DIR__.'/src/pages/lieux/planetes.php';
    }
    else if($get_ind == "planete_ind"){
        include __DIR__.'/src/pages/lieux/planete_ind.php';
    }
    else if($get_ind == "station_spatiale"){
        include __DIR__.'/src/pages/lieux/station_spatiale.php';
    }
    else if($get_ind == "station_spatiale_ind"){
        include __DIR__.'/src/pages/lieux/station_spatiale_ind.php';
    }
    else if($get_ind == "lunes"){
        include __DIR__.'/src/pages/lieux/lunes.php';
    }
    else if($get_ind == "lune_ind"){
        include __DIR__.'/src/pages/lieux/lune_ind.php';
    }
    else if($get_ind == "villes") {
        include __DIR__.'/src/pages/lieux/ville.php';
    }
    else if($get_ind == "ville_ind") {
        include __DIR__.'/src/pages/lieux/ville_ind.php';
    }
    / *fin lieux* /

    / *especes* /
    else if($get_ind == "especes") {
        include __DIR__.'/src/pages/especes/civilisation.php';
    }
    / *fin especes* /


    / * streamers * /
    else if($get_ind == "gameplay"){
        include __DIR__.'/src/pages/gameplay/gameplay.php';
    }
    else if($get_ind == "streamer_ind"){
        include __DIR__.'/src/pages/gameplay/streamer_ind.php';
    }
    else if($get_ind == "streamer_a_propos_ind"){
        include __DIR__.'/src/pages/gameplay/streamer_a_propos_ind.php';
    }
    else if($get_ind == "articles"){
        include __DIR__.'/src/pages/gameplay/articles.php';
    }
    else if($get_ind == "article_streamer_ind"){
        include __DIR__.'/src/pages/gameplay/article_streamer_ind.php';
    }
    / *streamers* /

    / *début users* /
    else if($get_ind == "action") {
        include __DIR__.'/src/pages/action.php';
    }
    else if($get_ind == "connexion") {
        include __DIR__.'/src/pages/connexion.php';
    }
    else if($get_ind == "deconnexion") {
        include __DIR__.'/src/pages/deconnexion.php';
    }
    else if($get_ind == "espace_user") {
        include __DIR__.'/src/pages/users/espace_user.php';
    }
    else if($get_ind == "gestion_screen") {
        include __DIR__.'/src/pages/gestion_screen.php';
    }
    else if($get_ind == "inscription_traitement") {
        include __DIR__.'/src/pages/inscription_traitement.php';
    }
    else if($get_ind == "inscription") {
        include __DIR__.'/src/pages/inscription.php';
    }
    else if($get_ind == "login") {
        include __DIR__.'/../src/pages/login.php';
    }
    else if($get_ind == "partage_screen") {
        include __DIR__.'/src/pages/partage.php';
    }
    else if($get_ind == "reinitialisation_mdp") {
        include __DIR__.'/src/pages/reinitialisation_password.php';
    }
    / *fin users* /

    / *lien utile* /
    else if($get_ind == "squadron"){
        include __DIR__.'/src/pages/squadron.php';
    }
    / *fin lien* /

    else if($get_ind == "gallerie") {
        include __DIR__.'/src/pages/gallerie.php';
    }

    / *début rgpd* /
    else if($get_ind == "cgu") {
        include __DIR__.'/src/pages/rgpd/cgu.php';
    }
    else if($get_ind == "info_legale") {
        include __DIR__.'/src/pages/rgpd/info_legale.php';
    }
    else if($get_ind == "politique_confidentialite") {
        include __DIR__.'/src/pages/rgpd/politique_confi.php';
    }
    / *fin rgpd* /

    else if($get_ind == "contact") {
        include __DIR__.'/src/pages/contact.php';
    }
*/