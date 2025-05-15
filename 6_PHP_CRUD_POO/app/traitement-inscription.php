<?php
// On vérifie que le formulaire a été envoyé (méthode POST)
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // La méthode est correcte
    // On vérifie si le formulaire est bien rempli (tous les champs obligatoires ne sont pas vides)
    if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['gpdr'])){
        die('Le formulaire est incomplet');
    }

    // Le formulaire est complet
    // On récupère et on sécurise les données (XSS)
    $username = htmlspecialchars(trim($_POST['username']));
    $email = $_POST['email'];

    // On vérifie chaque champ
    if(strlen($username) > 50){
        die('Le nom d\'utilisateur est trop long (50 caractères max)');
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        die('L\'email n\'est pas valide');
    }

    // Tous les champs sont corrects, on peut stocker dans la base
    // On hashe le mot de passe
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // On se connecte
    require_once 'includes/dbconnect.php';

    // On écrit la requête
    $sql = 'INSERT INTO users (username, email, password) VALUES (:username, :email, :password);';

    // On prépare la requête (Injections SQL)
    $stmt = $pdo->prepare($sql);

    // On attache les valeurs
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);

    // On exécute la requête
    $exec = $stmt->execute();

    if($exec){
        die('Utilisateur créé');
    }

    die('Une erreur est survenue');

}else{
    http_response_code(405);
    die('Méthode incorrecte');
}