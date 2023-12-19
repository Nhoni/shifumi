<?php

class Story {
    private $bdd;

    public function __construct($bdd) {
        $this->bdd = $bdd;
    }

    public function enregistrerPartie($joueur1, $joueur2, $resultat) {
        $requete = $this->bdd->prepare("INSERT INTO parties (joueur1, joueur2, resultat) VALUES (:joueur1, :joueur2, :resultat)");
        $requete->bindParam(':joueur1', $joueur1, PDO::PARAM_STR);
        $requete->bindParam(':joueur2', $joueur2, PDO::PARAM_STR);
        $requete->bindParam(':resultat', $resultat, PDO::PARAM_STR);
        $requete->execute();
    }

    public function obtenirPartie($id) {
        $requete = $this->bdd->prepare("SELECT * FROM parties WHERE id = :id");
        $requete->bindParam(':id', $id, PDO::PARAM_INT);
        $requete->execute();

        return $requete->fetch(PDO::FETCH_ASSOC);
    }
}

?>
