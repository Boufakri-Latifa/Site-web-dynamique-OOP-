<?php
// Inclusion de la classe parente "Personne"
require_once('Personne.php');

// Définition de la classe "Formateur" qui hérite de "Personne"
class Formateur extends Personne {
    // Propriétés privées de la classe "Formateur"
    private $salaireFixe; // Salaire fixe du formateur
    private $niveau; // Niveau  du formateur

    // Constructeur de la classe "Formateur"
    public function __construct($num, $nom, $prenom, $hs, $sh, $salFix, $niv) {
        // Appel du constructeur de la classe parente avec les paramètres appropriés
        parent::__construct($num, $nom, $prenom, $hs, $sh);
        // Initialisation des propriétés propres à la classe "Formateur"
        $this->salaireFixe = $salFix; // Initialisation du salaire fixe
        $this->niveau = $niv; // Initialisation du niveau d'expertise
    }

    // Méthode magique pour obtenir la valeur d'une propriété inaccessible
    public function __get($attr) {
        // Vérifie si la propriété existe dans la classe "Formateur"
        if (property_exists($this, $attr)) {
            return $this->$attr; // Retourne la valeur de la propriété demandée
        }
    }

    // Méthode magique pour définir la valeur d'une propriété inaccessible
    public function __set($attr, $value) {
        // Vérifie si la propriété existe dans la classe "Formateur"
        if (property_exists($this, $attr)) {
            $this->$attr = $value; // Définit la valeur de la propriété demandée
        }
    }
}

// Exemple d'utilisation de la classe "Formateur"
// Création d'une instance de "Formateur" avec des valeurs spécifiques
$formateur = new Formateur(123, "Latifa", "Boufakri", 40, 260, 2000, "Expert");

// Calcul du salaire total du formateur (salaire fixe + heures supplémentaires)
$salaireTotal = $formateur->salaireFixe + ($formateur->heuresSupp * $formateur->salaireHoraire);

// Affichage du salaire total du formateur
echo "Le salaire total du formateur {$formateur->prenom} {$formateur->nom} est de {$salaireTotal} € par mois.";
?>
