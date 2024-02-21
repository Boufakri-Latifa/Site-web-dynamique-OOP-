<?php
require_once('Personne.php'); // Inclusion de la classe parente Personne

class Vacataire extends Personne
{
    private $diplome; // Propriété privée pour stocker le diplôme du vacataire

    public function __construct($num, $nom, $prenom, $hs, $sh, $diplome)
    {
        parent::__construct($num, $nom, $prenom, $hs, $sh); // Appel au constructeur de la classe parente

        $this->diplome = $diplome; // Initialisation de la propriété diplome avec la valeur passée en paramètre
    }

    public function __get($attr)
    {
        if (property_exists($this, $attr)) {
            return $this->$attr; // Méthode magique pour récupérer la valeur d'une propriété
        }
    }

    public function __set($attr, $value)
    {
        // Vérifie si la propriété existe et la définit si c'est le cas
        if (property_exists($this, $attr)) {
            $this->$attr = $value; // Méthode magique pour définir la valeur d'une propriété
        }
    }

    public function calculerSalaire()
    {
        // Supposons que le salaire horaire du vacataire soit stocké dans $this->salaireHoraire
        // et que le nombre d'heures travaillées soit stocké dans $this->heuresTravaillees

        // Calcul du salaire en fonction des heures normales
        $salaireNormal = $this->salaireHoraire * $this->heuresTravaillees;

        // Supposons que le taux de rémunération pour les heures supplémentaires soit stocké dans $this->tauxHeuresSupp
        // et que le nombre d'heures supplémentaires soit stocké dans $this->heuresSupplementaires
        $salaireSupplementaire = $this->salaireHoraire * $this->tauxHeuresSupp * $this->heuresSupplementaires;

        // Calcul du salaire total
        $salaireTotal = $salaireNormal + $salaireSupplementaire;

        return $salaireTotal;
    }
}
?>
