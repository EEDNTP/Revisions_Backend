<?php
session_start();

echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
?>
<a href="connexion.php">Me connecter</a>
<a href="deconnexion.php">Me déconnecter</a>
<p></p>

<?php

require_once 'Chien.php';

$chien = new Chien('Chien', 4);

var_dump($chien);

$chien->setCri('Ouaf');

//var_dump($chien);

echo $chien->getCri();

$chien->setPattes(2);

var_dump($chien);
