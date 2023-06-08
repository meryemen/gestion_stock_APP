<?php

namespace App\Imports;

use App\Models\Personne;
use Maatwebsite\Excel\Concerns\ToModel;

class PersonneImport implements ToModel
{
    private $interface;

    public function __construct($interface)
    {
        $this->interface = $interface;
    }
    public function model(array $row)
    {
      if (($this->interface === 'materiel'))
        {
            return new Personne([
                'nom_prenom' => $row['Nom et prénom'],
                'region' =>  $row['Région'],
                'direction' =>  $row['Direction'],
                'site' =>  $row['Site'],
            ]);
        }else{
            return new Personne([
                'nom_prenom' => $row['Nom et prénom'],
                'region' =>  $row['Région'],
                'direction' =>  $row['Direction'],
                'site' =>  $row['Site'],
            ]);
        }
    }
}
