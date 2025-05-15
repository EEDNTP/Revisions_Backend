<?php
// Définition des informations de connexion
const DBHOST = 'database';
const DBNAME = 'revisions_backend';
const DBUSER = 'nom_user';
const DBPASS = 'pass_user';

// Ne JAMAIS changer ce qui est ci-dessous
// try...catch pour intercepter les erreurs éventuelles
try{
    // On se connecte à la base de données
    // On écrit le DSN
    $dsn = 'mysql:host=' . DBHOST . ';dbname=' . DBNAME;

    // On crée une nouvelle instance de PDO
    $pdo = new PDO($dsn, DBUSER, DBPASS);

    // On configure les intéractions avec le serveur de base de données
    // On définit le jeu de caractères à UTF-8
    $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8mb4');

    // On définit le mode de récupération des fetch (Objet, colonnes numérotées, tableau associatif...)
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // On définit le mode de gestion des erreurs
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $exception){
    // Ce bloc s'exécute si on a une erreur dans le bloc "try"
    die('Message : ' . $exception->getMessage());
}