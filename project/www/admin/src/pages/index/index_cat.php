<?php

if(!(isset($_SESSION['user']) && !empty($get_ind))) {
    header('Location: ./../?ind=login');
}

/* armements */
if($get_ind == "cat_arm" || $get_ind == "cat_arm_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "cat_arm_all");
    include __DIR__.'/../categories/cat_arm.php';
} else if($get_ind == "add_cat_arm" || $get_ind == "mod_cat_arm"){
    //$_GET["type"]=1;
    include __DIR__.'/../categories/add_mod_cat_arm.php';
}
/* especes */
if($get_ind == "cat_especes" || $get_ind == "cat_especes_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "cat_especes_all");
    include __DIR__.'/../categories/cat_especes.php';
} else if($get_ind == "add_cat_especes" || $get_ind == "mod_cat_especes"){
    //$_GET["type"]=1;
    include __DIR__.'/../categories/add_mod_cat_especes.php';
}
/* lieux */
if($get_ind == "cat_lieux" || $get_ind == "cat_lieux_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "cat_lieux_all");
    include __DIR__.'/../categories/cat_lieux.php';
} else if($get_ind == "add_cat_lieux" || $get_ind == "mod_cat_lieux"){
    //$_GET["type"]=1;
    include __DIR__.'/../categories/add_mod_cat_lieux.php';
}
/* transports */
if($get_ind == "cat_transp" || $get_ind == "cat_transp_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "cat_transp_all");
    include __DIR__.'/../categories/cat_transp.php';
} else if($get_ind == "add_cat_transp" || $get_ind == "mod_cat_transp"){
    //$_GET["type"]=1;
    include __DIR__.'/../categories/add_mod_cat_transp.php';
}
/* couleurs */
if($get_ind == "cat_couleur" || $get_ind == "cat_couleur_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "cat_couleur_all");
    include __DIR__.'/../categories/cat_couleur.php';
} else if($get_ind == "add_cat_couleur" || $get_ind == "mod_cat_couleur"){
    //$_GET["type"]=1;
    include __DIR__.'/../categories/add_mod_cat_couleur.php';
}
/* disponible */
if($get_ind == "cat_disp" || $get_ind == "cat_disp_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "cat_disp_all");
    include __DIR__.'/../categories/cat_disp.php';
} else if($get_ind == "add_cat_disp" || $get_ind == "mod_cat_disp"){
    //$_GET["type"]=1;
    include __DIR__.'/../categories/add_mod_cat_disp.php';
}
/* equipements */
if($get_ind == "cat_equipem" || $get_ind == "cat_equipem_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "cat_equipem_all");
    include __DIR__.'/../categories/cat_equipem.php';
} else if($get_ind == "add_cat_equipem" || $get_ind == "mod_cat_equipem"){
    //$_GET["type"]=1;
    include __DIR__.'/../categories/add_mod_cat_equipem.php';
}
/* faiblesses */
if($get_ind == "cat_faibl" || $get_ind == "cat_faibl_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "cat_faibl_all");
    include __DIR__.'/../categories/cat_faibl.php';
} else if($get_ind == "add_cat_faibl" || $get_ind == "mod_cat_faibl"){
    //$_GET["type"]=1;
    include __DIR__.'/../categories/add_mod_cat_faibl.php';
}
/* forces */
if($get_ind == "cat_forces" || $get_ind == "cat_forces_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "cat_forces_all");
    include __DIR__.'/../categories/cat_forces.php';
} else if($get_ind == "add_cat_forces" || $get_ind == "mod_cat_forces"){
    //$_GET["type"]=1;
    include __DIR__.'/../categories/add_mod_cat_forces.php';
}
/* tailles */
if($get_ind == "cat_taille" || $get_ind == "cat_taille_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "cat_taille_all");
    include __DIR__.'/../categories/cat_taille.php';
} else if($get_ind == "add_cat_taille" || $get_ind == "mod_cat_taille"){
    //$_GET["type"]=1;
    include __DIR__.'/../categories/add_mod_cat_taille.php';
}
/* risques */
if($get_ind == "cat_risque" || $get_ind == "cat_risque_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "cat_risque_all");
    include __DIR__.'/../categories/cat_risque.php';
} else if($get_ind == "add_cat_risque" || $get_ind == "mod_cat_risque"){
    //$_GET["type"]=1;
    include __DIR__.'/../categories/add_mod_cat_risque.php';
}
