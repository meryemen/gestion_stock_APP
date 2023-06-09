<?php

namespace App\Imports;

use App\Models\Bon_commande;
use App\Models\Bon_livraison;
use App\Models\Fournisseur;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LivraisonImport implements ToModel, WithHeadingRow
{
  
    public function model(array $row)
    {
       
        $fournisseur = Fournisseur::where('nom_four', $row['fournisseur'])->first();
        $commande = Bon_commande::where('id_com', $row['bon_de_commande'])->first();

        return new Bon_livraison([
            'id_livre' => $row['bon_de_livraison'] ,
            'date_livre' => $row['date_de_livraison'] ,
            'qt_livre' => str_replace('e', 'é', $row['quantite_livre']),
            'id_fourni' =>  $fournisseur ? $fournisseur->id_fourni : null,
            'id_com' => $commande ? $commande->id_com : null,
        ]);
  
 }
 
}
