<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<style>
    :root {
        --nav-bg-color: #e5e5e5;
    }
    .nav-tabs {
        background-color: #ffffc0;
    }
    .div_nav {
        padding: 15px;
        display: none;
    }
    #actus:checked ~ .nav-tabs .actus {
        background-color: --nav-bg-color;
        border: gray 1px solid;
    }
    #actus:checked ~ .actus {
        display: unset;
    }
    #arme:checked ~ .nav-tabs .arme {
        background-color: --nav-bg-color;
        border: gray 1px solid;
    }
    #arme:checked ~ .arme {
        display: unset;
    }
    #constructeur:checked ~ .nav-tabs .constructeur {
        background-color: --nav-bg-color;
        border: gray 1px solid;
    }
    #constructeur:checked ~ .constructeur {
        display: unset;
    }
    #images:checked ~ .nav-tabs .images {
        background-color: --nav-bg-color;
        border: gray 1px solid;
    }
    #images:checked ~ .images {
        display: unset;
    }
    #lieux:checked ~ .nav-tabs .lieux {
        background-color: --nav-bg-color;
        border: gray 1px solid;
    }
    #lieux:checked ~ .lieux {
        display: unset;
    }
    #lunes:checked ~ .nav-tabs .lunes {
        background-color: --nav-bg-color;
        border: gray 1px solid;
    }
    #lunes:checked ~ .lunes {
        display: unset;
    }
    #vaisseau:checked ~ .nav-tabs .vaisseau {
        background-color: --nav-bg-color;
        border: gray 1px solid;
    }
    #vaisseau:checked ~ .vaisseau {
        display: unset;
    }
    #ville:checked ~ .nav-tabs .ville {
        background-color: --nav-bg-color;
        border: gray 1px solid;
    }
    #ville:checked ~ .ville {
        display: unset;
    }
    .radio_none {
        display: none;
    }
    table {
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid;
    }
    .td_text {
        padding: 10px;
        max-height: 200px;
        overflow-y:auto;
        box-sizing: border-box;
    }
    td, th {
        padding: 10px;
    }
    .td_text_pad {
        padding: unset;
    }
    th {
        background-color: #e5e5e5;
    }
</style>
</head>
<body>
<input type="radio" name="drone" id="actus" class="radio_none" checked>
<input type="radio" name="drone" id="arme" class="radio_none">
<input type="radio" name="drone" id="constructeur" class="radio_none">
<input type="radio" name="drone" id="images" class="radio_none">
<input type="radio" name="drone" id="lieux" class="radio_none">
<input type="radio" name="drone" id="lunes" class="radio_none">
<input type="radio" name="drone" id="vaisseau" class="radio_none">
<input type="radio" name="drone" id="ville" class="radio_none">
<ul class="nav nav-tabs">
  <li class="nav-item actus">
    <a class="nav-link" href="#"><label for="actus">actus</label></a>
  </li>
  <li class="nav-item arme">
    <a class="nav-link" href="#"><label for="arme">arme</label></a>
  </li>
  <li class="nav-item constructeur">
    <a class="nav-link" href="#"><label for="constructeur">constructeur</label></a>
  </li>
  <li class="nav-item images">
    <a class="nav-link" href="#"><label for="images">images</label></a>
  </li>
  <li class="nav-item lieux">
    <a class="nav-link" href="#"><label for="lieux">lieux</label></a>
  </li>
  <li class="nav-item lunes">
    <a class="nav-link" href="#"><label for="lunes">lunes</label></a>
  </li>
  <li class="nav-item vaisseau">
    <a class="nav-link" href="#"><label for="vaisseau">vaisseau</label></a>
  </li>
  <li class="nav-item ville">
    <a class="nav-link" href="#"><label for="ville">ville</label></a>
  </li>
</ul>
<div class="div_nav actus">
<?php
include __DIR__.'/table_actu.php';
?>
  </div>
  <div class="div_nav arme">arme
  </div>
  <div class="div_nav constructeur">
<?php
include __DIR__.'/table_constructeur.php';
?>
  </div>
  <div class="div_nav images">
<?php
include __DIR__.'/table_image.php';
?>
  </div>
  <div class="div_nav lieux">lieux
  </div>
  <div class="div_nav lunes">lunes
  </div>
  <div class="div_nav vaisseau">vaisseau
  </div>
  <div class="div_nav ville">ville
  </div>
</body>
</html>