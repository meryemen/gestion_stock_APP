<?php

namespace App\Imports;

use App\Models\Bon_commande;
use App\Models\Fournisseur;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CommandeImport implements ToModel, WithHeadingRow
{
   
    public function model(array $row)
    {
       
        $idCommande =  $row['bon_de_commande']; 
        $commandeExistante = Bon_commande::where('id_com', $idCommande)->exists();
        
        if ($commandeExistante) {
            return null; // Ignorer l'insertion
        }else{
            $fournisseur = Fournisseur::where('nom_four', $row['fournisseur'])->first();
            return new Bon_commande([
                'id_com' => $idCommande,
                'date_cm' => $row['date_commande'],
                'qt_commande' => str_replace('e', 'é', $row['quantite_commande']),
                'id_fourni' => $fournisseur ? $fournisseur->id_fourni : null,
            ]);
        }
   
    }
}

