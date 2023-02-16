<?php
require __DIR__ . '/../../../back/connexion.php';

$id = strip_tags($_GET["id"]);
$sth = $dbco->prepare(" 
SELECT * 
FROM arme WHERE id=:id");
$sth->bindValue(":id", $id, PDO::PARAM_INT);
$sth->execute();
/*Retourne un tableau associatif pour chaque entrée de notre table
*avec le nom des colonnes sélectionnées en clefs*/
$armes = $sth->fetchAll(PDO::FETCH_ASSOC);

?>

<section class="page_ville">
    <?php foreach ($armes as $arme) { ?>

        <div class="info_ville">

            <h1><?= $arme['nom']; ?></h1>
            <img src="img/<?= $arme["image"] ?>" alt="" class="image" />
            <p><?= $arme['paragraphe']; ?></p>
            <p><?= $arme['paragraphe2']; ?></p>
            <div class="bouton">
                <a class="btn_actus" href="#"><span>Pledge Store</span></a>
            </div>
</section>

<table>
    <tr>
        <th>Catégorie</th>
        <th>???</th>
    </tr>
    <tr>
        <td>Prix</td>
        <td>???</td>
    </tr>
    <tr>
        <td>Disponibilité</td>
        <td>???</td>
    </tr>
    <tr>
        <td>Equipage</td>
        <td>???</td>
    </tr>
    <tr>
        <td>Taille</td>
        <td>???</td>
    </tr>
    <tr>
        <td>Poids</td>
        <td>???</td>
    </tr>
    <tr>
        <td>Vitesse maximum</td>
        <td>???</td>
    </tr>

</table>


<?php
    }
?>