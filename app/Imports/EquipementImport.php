<?php

namespace App\Imports;

use App\Models\Bon_commande;
use App\Models\Bon_livraison;
use App\Models\Equipement;
use App\Models\Fournisseur;
use App\Models\Personne;
use Maatwebsite\Excel\Concerns\ToModel;

class EquipementImport implements ToModel
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
            $personne = Personne::where('nom_prenom', $row['Nom et prénom'])->first();
            $commande = Bon_commande::where('id_com', $row['Bon de commande'])->first();
            $livraison = Bon_livraison::where('id_livre', $row['Bon de livraison'])->first();
            $fournisseur = Fournisseur::where('nom_four', $row['Fournisseur'])->first();

            return new Equipement([
                'type' => 'materiel',
                 'categorie' =>  $row['Catégorie'] ,
                 'produit' => $row['Produit'] ,
                 'n_serie' =>$row['Numéro de série'] ,
                 'cracteristique_tech' => $row['Caractéristique technique'] ,
                 'prix' => $row['Prix'] ,
                 'statut' => $row['Statut'] ,
                 'netbios' =>$row['Netbios'] ,
                 'id_pers' => $personne ? $personne->id_pers : null,
                 'id_fourni' =>$fournisseur ? $fournisseur->id_fourni : null,
                 'id_livre' =>$livraison ? $livraison->id_livre : null,
                 'id_com' => $commande ? $commande->id_com : null,

                
            ]);
        }else{
            
            $personne = Personne::where('nom_prenom', $row[5])->first();
            $commande = Bon_commande::where('id_com', $row[9])->first();
            $livraison = Bon_livraison::where('id_livre', $row[12])->first();
            $fournisseur = Fournisseur::where('nom_four', $row[15])->first();
            return new Equipement([
                'type' => 'accessoire',
                'categorie' =>  $row['Catégorie'] ,
                'produit' => $row['Produit'] ,
                'n_serie' =>$row['Numéro de série'] ,
                 
                'prix' => $row['Prix'] ,
                'statut' => $row['Statut'] ,
              
                 'id_pers' => $personne ? $personne->id_pers : null,
                 'id_fourni' =>$fournisseur ? $fournisseur->id_fourni : null,
                 'id_livre' =>$livraison ? $livraison->id_livre : null,
                 'id_com' => $commande ? $commande->id_com : null,

                
            ]);
        }
    }
}
