<?php

class Game {
    private $joueur1;
    private $joueur2;
    public $resultat;

    public function __construct($joueur1, $joueur2) {
        $this->joueur1 = $joueur1;
        $this->joueur2 = $joueur2;
        $this->resultat = null;
    }

    public function jouer() {
        $choixJoueur1 = $this->joueur1->choix;
        $choixJoueur2 = $this->choixAleatoire();

        $this->joueur2->choix = $choixJoueur2;

        if ($choixJoueur1 == $choixJoueur2) {
            $this->resultat = "Égalité!";
        } elseif (
            ($choixJoueur1 == "pierre" && $choixJoueur2 == "ciseaux") ||
            ($choixJoueur1 == "papier" && $choixJoueur2 == "pierre") ||
            ($choixJoueur1 == "ciseaux" && $choixJoueur2 == "papier")
        ) {
            $this->resultat = "{$this->joueur1->nom} gagne!";
        } else {
            $this->resultat = "L'ordinateur gagne!";
        }
    }

    private function choixAleatoire() {
        $choixPossibles = ["pierre", "papier", "ciseaux"];
        $choixAleatoire = array_rand($choixPossibles);
        return $choixPossibles[$choixAleatoire];
    }
}

?>
