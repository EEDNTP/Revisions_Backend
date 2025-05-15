<?php
// On vérifie la méthode (POST)
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // On vérifie que le formulaire est complet
    if(empty($_POST['email']) || empty($_POST['password'])){
        die('Formulaire incomplet');
    }

    // Le formulaire est complet
    // On récupère et on sécurise (XSS)
    $email = $_POST['email'];
    $password = $_POST['password'];

    // On vérifie chaque champ (que email)
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        die('L\'email n\'est pas valide');
    }

    // L'e-mail est correct (c'est un email)
    // On se connecte à la base
    require_once 'includes/dbconnect.php';

    // On récupère un utilisateur (ou pas) qui possède l'email fourni
    $sql = 'SELECT * FROM users WHERE email = :email;';

    // On prépare la requête (injections SQL)
    $stmt = $pdo->prepare($sql);

    // On attache les valeurs
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);

    // On exécute la requête
    $exec = $stmt->execute();

    if($exec){
        // L'exécution s'est bien terminée
        // On récupère l'utilisateur
        $user = $stmt->fetch();

        // Si on n'a pas d'utilisateur
        if(!$user){
            die('Email et/ou mot de passe incorrect');
        }

        // On a un utilisateur
        // On vérifie le mot de passe
        if(!password_verify($password, $user['password'])){
            die('Email et/ou mot de passe incorrect');
        }

        // Le mot de passe est bon
        // On crée la session utilisateur
        session_start();

        $_SESSION['user'] = [
            'id' => $user['id'],
            'email' => $user['email'],
            'username' => $user['username']
        ];

        // On stocke le last_login
        $sql = 'UPDATE users SET last_login = NOW() WHERE id = ' . $user['id'];

        $exec = $pdo->query($sql);

        if($exec){
            header('Location: index.php');
            exit;
        }

    }

    die('Une erreur est survenue');

}else{
    http_response_code(405);
    die('Méthode incorrecte');
}