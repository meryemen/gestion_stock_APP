<?php

namespace App\Imports;

use App\Models\Bon_commande;
use App\Models\Fournisseur;
use Maatwebsite\Excel\Concerns\ToModel;

class CommandeImport implements ToModel
{
    private $interface;

    public function __construct($interface)
    {
        $this->interface = $interface;
    }
    public function model(array $row)
    {
        if (($this->interface === 'materiel')) {
            $fournisseur = Fournisseur::where('nom_four', $row['Fournisseur'])->first();

            return new Bon_commande([
                'id_com' => $row['Bon de commande'] ,
                'date_cm' => $row['date commande'] ,
                'qt_commande' => $row['Quantité commandé'] ,
                'id_fourni' =>  $fournisseur ? $fournisseur->id_fourni : null,
    
            ]);
        }else{
            $fournisseur = Fournisseur::where('nom_four', $row['Fournisseur'])->first();

            return new Bon_commande([
                'id_com' => $row['Bon de commande'] ,
                'date_cm' => $row['date commande'] ,
                'qt_commande' => $row['Quantité commandé'] ,
                'id_fourni' =>  $fournisseur ? $fournisseur->id_fourni : null,
    
            ]);
        }
      
    }
}
