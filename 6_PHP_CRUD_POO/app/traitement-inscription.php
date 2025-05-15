<?php
// On vérifie que le formulaire a été envoyé (méthode POST)
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // La méthode est correcte
    // On vérifie si le formulaire est bien rempli (tous les champs obligatoires ne sont pas vides)
    if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['gpdr']) || $_FILES['avatar']['error'] !== 0){
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

    // On gère l'image
    // On vérifie qu'on a bien une image
    $isImage = getimagesize($_FILES['avatar']['tmp_name']);

    if(!$isImage){
        die('Ce n\'est pas une image');
    }

    // On vérifie le type MIME
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $_FILES['avatar']['tmp_name']);
    finfo_close($finfo);

    // On liste les types MIME autorisés
    $allowedMime = ['image/png', 'image/jpeg', 'image/webp'];
    if(!in_array($mime, $allowedMime)){
        die('Seuls les types PNG, JPG et WEBP son autorisés');
    }

    // On vérifie les dimensions, le poids... (tout dépend du cahier des charges)

    // On génère un nouveau nom unique
    $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $filename = bin2hex(random_bytes(12)) . '.' . $extension;

    // On définit le chemin de destination
    $path = __DIR__ . '/uploads/';

    // On vérifie si le fichier existe
    if(file_exists($path . $filename)){
        die('Le fichier existe');
    }

    // On déplace l'image dans la destination
    if(!move_uploaded_file($_FILES['avatar']['tmp_name'], $path . $filename)){
        die('Echec d\'envoi du fichier');
    }

    // Tous les champs sont corrects, on peut stocker dans la base
    // On hashe le mot de passe
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // On se connecte
    require_once 'includes/dbconnect.php';

    // On écrit la requête
    $sql = 'INSERT INTO users (username, email, password, avatar) VALUES (:username, :email, :password, :avatar);';

    // On prépare la requête (Injections SQL)
    $stmt = $pdo->prepare($sql);

    // On attache les valeurs
    $stmt->bindValue(':username', $username, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $stmt->bindValue(':avatar', $filename, PDO::PARAM_STR);

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