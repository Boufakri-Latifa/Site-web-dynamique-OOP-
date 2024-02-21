<?php

// Définition de la classe abstraite "Personne"
abstract class Personne{
    // Propriétés protégées de la classe Personne
    protected $numero; // Numéro de la personne
    protected $nom; // Nom de la personne
    protected $prenom; // Prénom de la personne
    protected $heuresSup; // Heures supplémentaires travaillées par la personne
    protected $salaireHoraire; // Salaire horaire de la personne

    // Constructeur de la classe Personne
    public function __construct($num, $nom, $prenom, $hs, $sh) {
        // Initialisation des propriétés avec les valeurs passées en paramètres
        $this->numero = $num; // Initialisation du numéro
        $this->nom = $nom; // Initialisation du nom
        $this->prenom = $prenom; // Initialisation du prénom
        $this->heuresSup = $hs; // Initialisation des heures supplémentaires
        $this->salaireHoraire = $sh; // Initialisation du salaire horaire
    }
    

    // Méthode magique pour obtenir la valeur d'une propriété inaccessible
    public function __get($attr)
    {
        // Vérifie si la propriété existe et la retourne si c'est le cas
        if(property_exists($this, $attr))
        {
            return $this->$attr; // Retourne la valeur de la propriété demandée
        }
    }

    // Méthode magique pour définir la valeur d'une propriété inaccessible
    public function __set($attr, $value)
    {
        // Vérifie si la propriété existe et la définit si c'est le cas
        if (property_exists($this, $attr)) {
            $this->$attr = $value; // Définit la valeur de la propriété demandée
        }
    }
    // Méthode magique pour convertir l'objet en chaîne de caractères
    public function __toString()
    {
        // Retourne une représentation de l'objet sous forme de chaîne de caractères
        return $this->numero.' '.strtoupper($this->nom);
    }
    // Méthode abstraite pour calculer le salaire 
    abstract public function calculeSalaire();
}
?>
