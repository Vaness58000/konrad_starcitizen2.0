<?php

if(!(isset($_SESSION['user']) && !empty($get_ind))) {
    header('Location: ./../?ind=login');
}

/* utilisateurs */
if($get_ind == "espace_user") {
    include __DIR__.'/../users/espace_user.php';
} else if($get_ind == "utilisateurs" && $isAdmin) {
    include __DIR__.'/../users/users.php';
}
/* screens */
if($get_ind == "screens" || $get_ind == "screens_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "screens_all");
    include __DIR__.'/../gameplay/screens.php';
} else if($get_ind == "add_screen" || $get_ind == "mod_screen"){
    //$_GET["type"]=1;
    include __DIR__.'/../gameplay/add_mod_screens.php';
}
/* articles */
if($get_ind == "articles" || $get_ind == "articles_all"){
    //$_GET["type"]=1;
    $_GET["tab_all"]=($get_ind == "articles_all");
    include __DIR__.'/../gameplay/articles.php';
} else if($get_ind == "add_article" || $get_ind == "mod_article"){
    //$_GET["type"]=1;
    include __DIR__.'/../gameplay/add_mod_article.php';
}
/* messages */
if($get_ind == "messages" && $isAdmin) {
    include __DIR__.'/../users/messages.php';
}
/* errors */
if($get_ind == "error_list" && $isAdmin) {
    include __DIR__.'/../errors/list.php';
} else if($get_ind == "error_msg" && $isAdmin) {
    include __DIR__.'/../errors/message.php';
}