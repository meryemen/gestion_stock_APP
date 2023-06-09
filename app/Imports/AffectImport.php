<?php

namespace App\Imports;

use App\Models\Affectation;
use App\Models\Equipement;
use App\Models\Personne;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Facades\Excel;

class AffectImport implements ToModel, WithHeadingRow
{
    
   
  
    public function model(array $row)
    {
       
        
            $personne = Personne::where('nom_prenom', $row['nom_et_prenom'])->first();
            $equipement= Equipement::where('n_serie', $row['numero_de_serie'])->first();
            return new Affectation([
                'id_equ' => $equipement ? $equipement->id_equ : null,
                'id_pers' => $personne ? $personne->id_pers : null,
                'date_affectation' => $row['date_affectation'] ,
            ]);
        
           


        }
}
   

