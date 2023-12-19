
<?php

class Joueur {
    public $nom;
    public $choix;

    public function __construct($nom) {
        $this->nom = $nom;
        $this->choix = null;
    }
}
