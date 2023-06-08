<?php

namespace App\Imports;

use App\Models\Affectation;
use App\Models\Equipement;
use App\Models\Personne;
use Maatwebsite\Excel\Concerns\ToModel;

class AffectImport implements ToModel
{
    private $interface;

    public function __construct($interface)
    {
        $this->interface = $interface;
    }
    public function model(array $row)
    {
       
        if (($this->interface === 'materiel')) {
            $personne = Personne::where('nom_prenom', $row['Nom et prénom'])->first();
            $equipement= Equipement::where('n_serie', $row['Numéro de série'])->first();
            return new Affectation([
                'id_equ' => $equipement ? $equipement->id_equ : null,
                'id_pers' => $personne ? $personne->id_pers : null,
                'date_affectation' => $row['Date d\'affectation'] ,
            ]);
        } else{
            $personne = Personne::where('nom_prenom', $row['Nom et prénom'])->first();
            $equipement= Equipement::where('n_serie', $row['Numéro de série'])->first();
            return new Affectation([
                'id_equ' => $equipement ? $equipement->id_equ : null,
                'id_pers' => $personne ? $personne->id_pers : null,
                'date_affectation' => $row['Date d\'affectation'] ,
            ]);


        }
    }
}
