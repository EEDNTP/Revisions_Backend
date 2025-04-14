<?php
echo '<p>Bonjour Christophe !</p>'; // Affiche le texte dans la page

// Créer des variables contenant un prénom, un nom et un âge
$prenom = 'Adilet';
$nom = 'Nisharapov';
$age = 18;

// Afficher une phrase contenant les variables précédentes
echo "<p>Je m'appelle $prenom $nom et j'ai $age ans</p>";
echo '<p>Je m\'appelle ' . $prenom . ' ' . $nom . ' et j\'ai ' . $age . ' ans</p>';


// J'ai un score, j'affiche "Excellent" à partir de 90, "Bien" à partir de 70 et "A améliorer" en dessous
$score = 95;

if ($score >= 90) {
    echo '<p>Excellent</p>';
} elseif ($score >= 70) {
    echo '<p>Bien</p>';
} else {
    echo '<p>A améliorer</p>';
}

// J'ai un booléen qui dit si l'utilisateur est connecté
// Afficher "Connecté" ou "Déconnecté" en fonction de ce booléen
$connecte = true;

if ($connecte) {
    echo '<p>Connecté</p>';
} else {
    echo '<p>Déconnecté</p>';
}

// Version ternaire
echo $connecte ? '<p>Connecté</p>' : '<p>Déconnecté</p>';

// Afficher les nombres de 1 à 10 (inclus), chacun sur une ligne.
for ($compteur = 1; $compteur <= 10; $compteur++) {
    echo "<p>$compteur</p>";
}

// J'ai un tableau avec 3 fruits
// Afficher chaque fruit en majuscules
$fruits = ['Pomme', 'Banane', 'Cerise'];

foreach ($fruits as $fruit) {
    $majuscules = strtoupper($fruit);
    echo "<p>$majuscules</p>";
}

// Crée une fonction qui prend un prénom en paramètre et retourne "Salut [prénom] !"
// Appelle la fonction avec ton prénom.

/**
 * Renvoie "Salut [prénom]!"
 * @param mixed $prenom
 * @return string
 */
function saluer($prenom)
{
    return "<p>Salut $prenom!</p>";
}

echo saluer('ton prénom');

// Crée une chaîne : "PHP est amusant"
// Affiche sa longueur, remplace "amusant" par "génial", et convertis tout en majuscules.
$chaine = 'PHP est amusant';

// Affiche sa longueur
echo strlen($chaine);

// Remplace "amusant" par "génial"
$nouvelleChaine = str_replace('amusant', 'génial', $chaine);
echo "<p>$nouvelleChaine</p>";

// Convertis tout en majuscules
$majuscules = mb_strtoupper($nouvelleChaine);
echo "<p>$majuscules</p>";