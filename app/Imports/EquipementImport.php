<?php

namespace App\Imports;

use App\Models\Bon_commande;
use App\Models\Bon_livraison;
use App\Models\Equipement;
use App\Models\Fournisseur;
use App\Models\Personne;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EquipementImport implements ToModel, WithHeadingRow
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
            $personne = Personne::where('nom_prenom', $row['nom_et_prenom'])->first();
            $commande = Bon_commande::where('id_com', $row['bon_de_commande'])->first();
            $livraison = Bon_livraison::where('id_livre', $row['bon_de_livraison'])->first();
            $fournisseur = Fournisseur::where('nom_four', $row['fournisseur'])->first();

            return new Equipement([
                 'type' => 'materiel',
                 'categorie' =>  $row['categorie'] ,
                 'produit' => $row['produit'] ,
                 'n_serie' =>$row['numero_de_serie'] ,
                 'cracteristique_tech' => $row['caracteristique_technique'] ,
                 'prix' => $row['prix'] ,
                 'statut' => $row['statut'] ,
                 'netbios' =>$row['netbios'] ,
                 'id_pers' => $personne ? $personne->id_pers : null,
                 'id_fourni' =>$fournisseur ? $fournisseur->id_fourni : null,
                 'id_livre' =>$livraison ? $livraison->id_livre : null,
                 'id_com' => $commande ? $commande->id_com : null,

                
            ]);
        }else{
            $personne = Personne::where('nom_prenom', $row['nom_et_prenom'])->first();
            $commande = Bon_commande::where('id_com', $row['bon_de_commande'])->first();
            $livraison = Bon_livraison::where('id_livre', $row['bon_de_livraison'])->first();
            $fournisseur = Fournisseur::where('nom_four', $row['fournisseur'])->first();

            return new Equipement([
                'type' => 'accessoire',
                'categorie' =>  $row['categorie'] ,
                'produit' => $row['produit'] ,
                'n_serie' =>$row['numero_de_serie'] ,
               
                'prix' => $row['prix'] ,
                'statut' => $row['statut'] ,
                
                'id_pers' => $personne ? $personne->id_pers : null,
                'id_fourni' =>$fournisseur ? $fournisseur->id_fourni : null,
                'id_livre' =>$livraison ? $livraison->id_livre : null,
                'id_com' => $commande ? $commande->id_com : null,
            ]);
        }
    }
   
}
