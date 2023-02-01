<?php
session_start();
require("back/connexion.php");
include 'header.php';
$id = strip_tags($_GET["id"]);
$sth = $dbco->prepare(" 
SELECT * 
FROM lunes WHERE id=:id");
$sth->bindValue(":id", $id, PDO::PARAM_INT);
$sth->execute();
/*Retourne un tableau associatif pour chaque entrée de notre table
*avec le nom des colonnes sélectionnées en clefs*/
$vaisseaux = $sth->fetchAll(PDO::FETCH_ASSOC);

?>


<div class="block">
<section class="page_ville">
        <?php foreach ($vaisseaux as $vaisseau) { ?>
            <div class="info_ville">
            <h1><?= $vaisseau['nom']; ?></h1>
            <div class="description_vaisseau">

                <img src="img/<?= $vaisseau['image']; ?>" alt="vaisseau<? $vaisseau['nom']; ?>">
                <div class="description">
                <p><?= $vaisseau['paragraphe1']; ?></p>
                <p><?= $vaisseau['paragraphe2']; ?></p>
                <p><?= $vaisseau['paragraphe3']; ?></p>
            </div>
            </div>
            <div class="caracteristique">
                <table>
                    <tr>
                        <th>Orbite autour de </th>
                        <th><?= $vaisseau['orbite']; ?></th>
                    </tr>
                    <tr>
                        <td>Affiliation</td>
                        <td><?= $vaisseau['affiliation']; ?></td>
                    </tr>
                    <tr>
                        <td>Rayon</td>
                        <td><?= $vaisseau['rayon']; ?></td>
                    </tr>
                    <tr>
                        <td>Gravité</td>
                        <td><?= $vaisseau['gravite']; ?></td>
                    </tr>
                    <tr>
                        <td>Air respirable</td>
                        <td><?= $vaisseau['air']; ?></td>
                    </tr>
                    <tr>
                        <td>Altitude de l'atmosphère</td>
                        <td><?= $vaisseau['altitude']; ?></td>
                    </tr>
                    <tr>
                        <td>Composition de l'atmosphère</td>
                        <td><?= $vaisseau['atmosphere']; ?></td>
                    </tr>
                    <tr>
                        <td>Période de rotation</td>
                        <td><?= $vaisseau['rotation']; ?></td>
                    </tr>
                    <tr>
                        <td>Période de révolution</td>
                        <td><?= $vaisseau['revolution']; ?></td>
                    </tr>
                    <tr>
                        <td>Nombre de satellites artificiels</td>
                        <td><?= $vaisseau['satellite']; ?></td>
                    </tr>
                </table>

            </div>
            <div class="gallery_planete">
                <img src="img/<?= $vaisseau['image1']; ?>">
                <img src="img/<?= $vaisseau['image2']; ?>">

            </div>
        <?php
        }
        ?>
    </div>
</div>

<?php
include 'footer.php';
?>