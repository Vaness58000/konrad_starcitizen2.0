<?php
// Démarrage de la session 
session_start();
include __DIR__.'/../../../../src/class/classMain/TemplatePage.php';
include __DIR__.'/../../../../src/repository/ArmeVaissRepository.php';
include __DIR__.'/../../function/table-admin.php';
include __DIR__.'/../../../../src/repository/UsersRepository.php';
include __DIR__.'/../../../../src/repository/ConstructeurRepository.php';
include __DIR__.'/../../../../src/repository/categories/CatTailleRepository.php';
// si la session existe pas soit si l'on est pas connecté on redirige
if (!(!empty($_SESSION) && array_key_exists('utilisateur', $_SESSION) && !empty($_SESSION['utilisateur']) && 
    array_key_exists('id', $_SESSION['utilisateur']) && !empty($_SESSION['utilisateur']['id']))) {
    die("Merci de vous connecter.");
} else {
    echo "add_mod_arm_vaiss";
}
