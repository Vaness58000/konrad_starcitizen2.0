<?php
if(!empty($nom_pg)) {
    $modif_ispro = ($isProprietaire) ? " checked" : "";

    $templatePage = new TemplatePage(__DIR__.'/../../template/categories/categorie.html');

    $templatePage->addVarString("[#CITIZEN_CAT_ID#]", $id_cat);
    $templatePage->addVarString("[#CITIZEN_CAT_ISPRO#]", $modif_ispro);
    $templatePage->addVarString("[#CITIZEN_CAT_NOM#]", $nom_cat);
    $templatePage->addVarString("[#CITIZEN_CAT_TITLE#]", $nom_pg);

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


}