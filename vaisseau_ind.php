<?php
session_start();
require("back/connexion.php");
include 'header.php';
$id = strip_tags($_GET["id"]);
$sth = $dbco->prepare(" 
SELECT * 
FROM vaisseau WHERE id=:id");
$sth->bindValue(":id", $id, PDO::PARAM_INT);
$sth->execute();
/*Retourne un tableau associatif pour chaque entrée de notre table
*avec le nom des colonnes sélectionnées en clefs*/
$vaisseaux = $sth->fetchAll(PDO::FETCH_ASSOC);

?>

<section class="page_ville">
  <?php foreach ($vaisseaux as $vaisseau) { ?>

    <div class="info_ville">
      <h1><?= $vaisseau['nom_vaisseau']; ?></h1>
      <img src="img/<?= $vaisseau['image_vaisseau']; ?>" alt="vaisseau<? $vaisseau['nom_vaisseau']; ?>">
      <p><?= $vaisseau['description']; ?></p>
      <table>
        <tr>
          <th>constructeur</th>
          <th><?= $vaisseau['constructeur']; ?></th>
        </tr>
        <tr>
          <td>Prix</td>
          <td><?= $vaisseau['prix']; ?></td>
        </tr>
        <tr>
          <td>Disponibilité</td>
          <td><?= $vaisseau['disponibilite']; ?></td>
        </tr>
        <tr>
          <td>Equipage</td>
          <td><?= $vaisseau['equipage']; ?></td>
        </tr>
        <tr>
          <td>Taille</td>
          <td><?= $vaisseau['taille']; ?></td>
        </tr>
        <tr>
          <td>Poids</td>
          <td><?= $vaisseau['poids']; ?></td>
        </tr>
        <tr>
          <td>Vitesse maximum</td>
          <td><?= $vaisseau['vitesse_max']; ?></td>
        </tr>
        <tr>
          <td>Capacité cargo</td>
          <td><?= $vaisseau['capacite']; ?></td>
        </tr>
        <tr>
          <td>Forces</td>
          <td><?= $vaisseau['forces']; ?></td>
        </tr>
        <tr>
          <td>Faiblesses</td>
          <td><?= $vaisseau['faiblesses']; ?></td>
        </tr>
      </table>
    </div>

  <?php
  }
  ?>


  <?php
  include 'footer.php';
  ?>