<?php
session_start();

include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/class/classMain/Error_Log.php';
include __DIR__.'/../../../../src/repository/UsersRepository.php';
include __DIR__.'/../../../../src/repository/LieuxRepository.php';
include __DIR__.'/../../../../src/repository/categories/CatCouleurRepository.php';
include __DIR__.'/../../function/table-admin.php';
// si la session existe pas soit si l'on est pas connecté on redirige
if (!(!empty($_SESSION) && array_key_exists('utilisateur', $_SESSION) && !empty($_SESSION['utilisateur']) && 
    array_key_exists('id', $_SESSION['utilisateur']) && !empty($_SESSION['utilisateur']['id']))) {
    die("Merci de vous connecter.");
} else {
    echo "add_mod_lieuTransp";
}
