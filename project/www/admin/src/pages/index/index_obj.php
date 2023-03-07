<?php

include __DIR__.'/../../../../src/class/classSite/SessionUser.php';
$sessionUser = new SessionUser();
// si la session existe pas soit si l'on est pas connecté on redirige

$get_ind = "espace_user";
if(!empty($_GET['ind'])) {
    $get_ind = $_GET['ind'];
}
if(!$sessionUser->isConnected()) {
    header('Location: ./../?ind=login');
}

/* armements fps */
if($get_ind == "arm_fps" || $get_ind == "arm_fps_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "arm_fps_all");
    include __DIR__.'/../objet/arm_fps.php';
} else if($get_ind == "add_arm_fps" || $get_ind == "mod_arm_fps"){
    //$_GET["type"]=1;
    include __DIR__.'/../objet/add_mod_arm_fps.php';
}
/* armements vaisseau */
if($get_ind == "arm_vaiss" || $get_ind == "arm_vaiss_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "arm_vaiss_all");
    include __DIR__.'/../objet/arm_vaiss.php';
} else if($get_ind == "add_arm_vaiss" || $get_ind == "mod_arm_vaiss"){
    //$_GET["type"]=1;
    include __DIR__.'/../objet/add_mod_arm_vaiss.php';
}
/* lieux */
if($get_ind == "lieux" || $get_ind == "lieux_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "lieux_all");
    include __DIR__.'/../objet/lieux.php';
} else if($get_ind == "add_lieu" || $get_ind == "mod_lieu"){
    //$_GET["type"]=1;
    include __DIR__.'/../objet/add_mod_lieux.php';
}
/* matieres premieres */
if($get_ind == "mat_prem" || $get_ind == "mat_prem_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "mat_prem_all");
    include __DIR__.'/../objet/mat_prem.php';
} else if($get_ind == "add_mat_prem" || $get_ind == "mod_mat_prem"){
    //$_GET["type"]=1;
    include __DIR__.'/../objet/add_mod_mat_prem.php';
}
/* constructeurs */
if($get_ind == "construct" || $get_ind == "construct_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "construct_all");
    include __DIR__.'/../gameplay/construct.php';
} else if($get_ind == "add_construct" || $get_ind == "mod_construct"){
    //$_GET["type"]=1;
    include __DIR__.'/../gameplay/add_mod_construct.php';
}
/* transports */
if($get_ind == "transports" || $get_ind == "transports_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "transports_all");
    include __DIR__.'/../objet/transports.php';
} else if($get_ind == "add_transports" || $get_ind == "mod_transports"){
    //$_GET["type"]=1;
    include __DIR__.'/../objet/add_mod_transp.php';
}
/* especes */
if($get_ind == "especes" || $get_ind == "especes_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "especes_all");
    include __DIR__.'/../objet/especes.php';
} else if($get_ind == "add_especes" || $get_ind == "mod_especes"){
    //$_GET["type"]=1;
    include __DIR__.'/../objet/add_mod_especes.php';
}
/* proprieteres */
if($get_ind == "proprietaires" || $get_ind == "proprietaires_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "proprietaires_all");
    include __DIR__.'/../objet/proprietaires.php';
} else if($get_ind == "add_proprietaires" || $get_ind == "mod_proprietaires"){
    //$_GET["type"]=1;
    include __DIR__.'/../objet/add_mod_proprietaires.php';
}
/* services */
if($get_ind == "services" || $get_ind == "services_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "services_all");
    include __DIR__.'/../objet/services.php';
} else if($get_ind == "add_service" || $get_ind == "mod_service"){
    //$_GET["type"]=1;
    include __DIR__.'/../objet/add_mod_services.php';
}
