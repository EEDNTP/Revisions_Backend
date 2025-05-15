<?php
session_start();

// On vérifie si la session utilisateur existe
if(!empty($_SESSION['user'])){
    unset($_SESSION['user']);
}

header('Location: index.php');