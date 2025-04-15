<?php
// Crée un tableau associatif avec les informations suivantes : nom, âge, ville
$personne = [
    'nom' => 'Yacine',
    'age' => 29,
    'ville' => 'Metz'
];

// Affiche chaque info sous la forme "Clé : Valeur"
// A la main
echo "<p>Nom : {$personne['nom']}</p>";
echo "<p>Age : {$personne['age']}</p>";
echo "<p>Ville : {$personne['ville']}</p>";

// En "automatique"
foreach ($personne as $cle => $valeur) {
    echo "<p>$cle : $valeur</p>";
}

// Ajoute une clé "profession" avec une valeur de ton choix
$personne['profession'] = 'Développeur web';

// Affiche uniquement la valeur de "profession"
echo "<p>{$personne['profession']}</p>";

// Affiche la note arrondie à 1 décimale
$note = 14.678;

echo round($note, 1);
echo '<hr>';

$prix = 12.3;

// Afficher le prix maximum (arrondi au supérieur)
echo ceil($prix);

// Afficher le prix minimum (arrondi à l'inférieur)
echo floor($prix);

echo '<hr>';

$notes = [10, 15, 8, 17.8, 13];
// Affiche la meilleure et la moins bonne note
// Meilleure note
echo max($notes);

// Moins bonne note
echo min($notes);

echo '<hr>';

// Affiche un nombre aléatoire entre 1 et 100
// Bonus : si ce nombre est supérieur à 90, affiche "Jackpot !"
$nombreAleatoire = rand(1, 100);
echo $nombreAleatoire;

if ($nombreAleatoire > 90) {
    echo '<h1>Jackpot !!!</h1>';
}