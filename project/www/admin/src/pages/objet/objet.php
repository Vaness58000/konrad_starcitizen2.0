<?php

if(isset($objets) && isset($templatePage) && isset($count_obj) && isset($page)) {
    $tab_all = "";
    if(!empty($objets)) {
        foreach ($objets as $objet) {
            $tab_all .= "\n".addTdMain($objet['id_objet'], $objet['nom_obj'], intval($objet['validation'])==1, $isAdmin, $isAll);
        }
    }


    $templatePage->addVarString("[#CITIZEN_TAB_ALL#]", $tab_all);
    $templatePage->addVarString("[#CITIZEN_TAB_NBPG#]", $count_obj);
    $templatePage->addVarString("[#CITIZEN_TAB_NMPG#]", ($page+1));
    $templatePage->addVarString("[#CITIZEN_TAB_CHOICE#]", $choix_tab);
    $templatePage->addVarString("[#CITIZEN_TAB_NAME#]", $nom_pg);
    $templatePage->addVarString("[#CITIZEN_FOLDER_IMG#]", $folder_img);

    $templatePage->addFileJs("./src/js/pagination.js");
    $templatePage->addFileCss("./src/css/pagination.css");

    /*$js = $templatePage->js();
    $css = $templatePage->css();
    $contenu = $templatePage->html();*/
}