<?php
session_start();

echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
?>
<a href="connexion.php">Me connecter</a>
<a href="deconnexion.php">Me déconnecter</a>