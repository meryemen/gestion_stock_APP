<?php
namespace App\Exports;


use App\Models\Equipement;
use Maatwebsite\Excel\Concerns\FromArray;


class EquipementExport implements FromArray
{
    protected $interface;

    public function __construct($interface)
    {
        $this->interface = $interface;
    }
    public function array(): array
    {
        $equipements = Equipement::all();
        $list = [];
        if ($this->interface === 'materiel') {
            $list[] = [
                'categorie',
                'produit',
                'numero_de_serie',
                'caracteristique_technique',
                'prix',
                'statut',
                'netbios',
                'nom_et_prenom',
                'site',
                'region',
                'direction',
                'bon_de_commande',
                'date_commande',
                'quantité_commandé',
                'bon_de_livraison',
                'date_de_livraison',
                'quantité_livré',
                'fournisseur',
                'date_affectation',
            ];
        } elseif ($this->interface === 'accessoire') {
            $list[] = [
                'categorie',
                'produit',
                'numero_de_serie',
                'caracteristique_technique',
                'prix',
                'statut',
                'netbios',
                'nom_et_prenom',
                'site',
                'region',
                'direction',
                'bon_de_commande',
                'date_commande',
                'quantité_commandé',
                'bon_de_livraison',
                'date_de_livraison',
                'quantité_livré',
                'fournisseur',
                'date_affectation',
            ];
        }
       
        foreach ($equipements as $equipement) {
            $personne = $equipement->personne;
            $bonLivraison = $equipement->bonLivraison;
            $bonCommande = $equipement->bonCommande;
            $fournisseur = $equipement->fournisseur;
            $affectations = $equipement->affectations;
            $affectationExists = count($affectations) > 0;
        
            if (($this->interface === 'materiel' && $equipement->type === 'materiel') ||
                ($this->interface === 'accessoire' && $equipement->type === 'accessoire')
            ) {
                // Vérifier si des affectations existent
                if ($affectationExists) {
                    $processedAffectation = false; // Variable pour suivre si une affectation a déjà été traitée

                    foreach ($affectations as $affectation) {
                        if (!$processedAffectation) {
                            $dateAffectation = $affectation->date_affectation ? date('Y-m-d', strtotime($affectation->date_affectation)) : '';
                    
                            $tempData = [
                                $equipement->categorie,
                                $equipement->produit,
                                $equipement->n_serie,
                                $equipement->cracteristique_tech,
                                $equipement->prix,
                                $equipement->statut,
                                $equipement->netbios,
                                $personne ? $personne->nom_prenom : '',
                                $personne ? $personne->site : '',
                                $personne ? $personne->region : '',
                                $personne ? $personne->direction : '',
                                $bonCommande ? $bonCommande->id_com : '',
                                $bonCommande ? $bonCommande->date_cm : '',
                                $bonCommande ? $bonCommande->qt_commande : '',
                                $bonLivraison ? $bonLivraison->id_livre : '',
                                $bonLivraison ? $bonLivraison->date_livre : '',
                                $bonLivraison ? $bonLivraison->qt_livre : '',
                                $fournisseur ? $fournisseur->nom_four : '',
                                $dateAffectation,
                            ];
                    
                            $list[] = $tempData;
                            $processedAffectation = true; // Marquer l'affectation comme traitée
                        }
                    }
                    
                } else {
                    $tempData = [
                        $equipement->categorie,
                        $equipement->produit,
                        $equipement->n_serie,
                        $equipement->cracteristique_tech,
                        $equipement->prix,
                        $equipement->statut,
                        $equipement->netbios,
                        $personne ? $personne->nom_prenom : '',
                        $personne ? $personne->site : '',
                        $personne ? $personne->region : '',
                        $personne ? $personne->direction : '',
                        $bonCommande ? $bonCommande->id_com : '',
                        $bonCommande ? $bonCommande->date_cm : '',
                        $bonCommande ? $bonCommande->qt_commande : '',
                        $bonLivraison ? $bonLivraison->id_livre : '',
                        $bonLivraison ? $bonLivraison->date_livre : '',
                        $bonLivraison ? $bonLivraison->qt_livre : '',
                        $fournisseur ? $fournisseur->nom_four : '',
                        '',
                    ];
        
                    $list[] = $tempData;
                }
            }
        }
        
        return $list;
        

    }
    
}
