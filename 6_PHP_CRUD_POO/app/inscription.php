<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>M'inscrire</h1>
    </header>
    <main>
        <form action="traitement-inscription.php" method="post" novalidate>
            <div>
                <label for="username">Nom d'utilisateur</label>
                <input type="text" name="username" id="username">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </div>
            <div>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password">
            </div>
            <div>
                <input type="checkbox" name="gpdr" id="gpdr">
                <label for="gpdr">J'accepte la collecte de mes données...</label>
            </div>
            <button type="submit">M'inscrire</button>
        </form>
    </main>
</body>
</html>