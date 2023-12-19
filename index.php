<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shifumi Game</title>
</head>
<body>

<h1>Shifumi Game</h1>

<form method="post" action="">
    <label for="choixJoueur1">Joueur 1:</label>
    <select name="choixJoueur1">
        <option value="pierre">Pierre</option>
        <option value="papier">Papier</option>
        <option value="ciseaux">Ciseaux</option>
    </select>


    <button type="submit">Jouer</button>
</form>

<?php

require_once 'classes/Joueur.php';
require_once 'classes/Game.php';
require_once 'classes/Story.php';

$bdd = new PDO('mysql:host=localhost:3306;dbname=shifumi', 'root', '',);

$story = new Story($bdd);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $choixJoueur1 = $_POST['choixJoueur1'];

    $joueur1 = new Joueur("Joueur 1");
    $joueur2 = new Joueur("Ordinateur"); 
    $joueur1->choix = $choixJoueur1;

    $game = new Game($joueur1, $joueur2);
    $game->jouer();

    $story->enregistrerPartie($joueur1->nom, $joueur2->nom, $game->resultat);

    echo "<p>Résultat de la partie : " . $game->resultat . "</p>";
}
