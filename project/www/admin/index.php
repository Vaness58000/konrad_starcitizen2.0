<?php 
session_start();
$get_ind = "acc";
if(!empty($_GET['ind'])) {
    $get_ind = $_GET['ind'];
}
if(!isset($_SESSION['user'])) {
    header('Location: ./../?ind=login');
}
if($get_ind != "connexion" && $get_ind != "inscription_traitement" && $get_ind != "deconnexion") {
    include __DIR__.'/src/pages/header.php';
}

?>

    <?php 
    
    if($get_ind == "acc") {
        include __DIR__.'/src/pages/acc.php';
    }

    /*equipements*/
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
    /*fin equipements*/

    /* actu/patch*/
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
    /*fin actu/patch*/

    /*lieu*/
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
    /*fin lieux*/

    /*especes*/
    else if($get_ind == "especes") {
        include __DIR__.'/src/pages/especes/civilisation.php';
    }
    /*fin especes*/


    /* streamers */
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
    /*streamers*/

    /*début users*/
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
    /*fin users*/

    /*lien utile*/
    else if($get_ind == "squadron"){
        include __DIR__.'/src/pages/squadron.php';
    }
    /*fin lien*/

    else if($get_ind == "gallerie") {
        include __DIR__.'/src/pages/gallerie.php';
    }

    /*début rgpd*/
    else if($get_ind == "cgu") {
        include __DIR__.'/src/pages/rgpd/cgu.php';
    }
    else if($get_ind == "info_legale") {
        include __DIR__.'/src/pages/rgpd/info_legale.php';
    }
    else if($get_ind == "politique_confidentialite") {
        include __DIR__.'/src/pages/rgpd/politique_confi.php';
    }
    /*fin rgpd*/

    else if($get_ind == "contact") {
        include __DIR__.'/src/pages/contact.php';
    }

    ?>
<?php
if($get_ind != "connexion" && $get_ind != "inscription_traitement" && $get_ind != "deconnexion") {
    include __DIR__.'/src/pages/footer.php';
}
?>