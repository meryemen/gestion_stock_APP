<?php

namespace App\Imports;

use App\Models\Personne;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PersonneImport implements ToModel, WithHeadingRow
{
    
    public function model(array $row)
    {
     
        $personneExistante = Personne::where('nom_prenom', $row['nom_et_prenom'])->exists();

        if ($personneExistante) {
            return null;
        }
    
        return new Personne([
            'nom_prenom' => $row['nom_et_prenom'],
            'region' => $row['region'],
            'direction' => $row['direction'],
            'site' => $row['site'],
        ]);
        
    }
   
}
