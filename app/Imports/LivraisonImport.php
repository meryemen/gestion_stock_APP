<?php

namespace App\Imports;

use App\Models\Bon_commande;
use App\Models\Bon_livraison;
use App\Models\Fournisseur;
use Maatwebsite\Excel\Concerns\ToModel;

class LivraisonImport implements ToModel
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
        $commande = Bon_commande::where('id_com', $row['Bon de commande'])->first();

        return new Bon_livraison([
            'id_livre' => $row['Bon de livraison'] ,
            'date_livre' => $row['date de livraison'] ,
            'qt_livre' => $row['Quantité livré'] ,
            'id_fourni' =>  $fournisseur ? $fournisseur->id_fourni : null,
            'id_com' => $commande ? $commande->id_com : null,
        ]);
    }else{
        $fournisseur = Fournisseur::where('nom_four', $row['Fournisseur'])->first();
        $commande = Bon_commande::where('id_com', $row['Bon de commande'])->first();

        return new Bon_livraison([
            'id_livre' => $row['Bon de livraison'] ,
            'date_livre' => $row['date de livraison'] ,
            'qt_livre' => $row['Quantité livré'] ,
            'id_fourni' =>  $fournisseur ? $fournisseur->id_fourni : null,
            'id_com' => $commande ? $commande->id_com : null,
        ]);
    }
 }
}
