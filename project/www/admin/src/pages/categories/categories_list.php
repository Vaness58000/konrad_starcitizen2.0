<?php
if(!empty($nom_pg)) {
    $templatePage = new TemplatePage(__DIR__.'/../../template/categories/categories_list.html');

    $templatePage->addVarString("[#CITIZEN_CAT_LIST_NAME#]", $nom_pg);
    $templatePage->addVarString("[#CITIZEN_CAT_LIST_NBPG#]", $count);
    $templatePage->addVarString("[#CITIZEN_CAT_LIST_NMPG#]", $page);
    $templatePage->addVarString("[#CITIZEN_CAT_LIST_ALL#]", $list_cat);

    if(!empty($tabJS)) {
        foreach ($tabJS as $value) {
            $templatePage->addFileJs($value);
        }
    }
    if(!empty($tabCSS)) {
        foreach ($tabCSS as $value) {
            $templatePage->addFileJs($value);
        }
    }
    /*$templatePage->addFileJs("./src/js/tab_display_all.js");*/
    $templatePage->addFileJs("./src/js/pagination.js");
    $templatePage->addFileCss("./src/css/pagination.css");

}
