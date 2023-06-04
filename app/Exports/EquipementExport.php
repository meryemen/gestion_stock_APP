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
                'Catégorie',
                'Produit',
                'Numéro de série',
                'Caractéristique technique',
                'Prix',
                'Statut',
                'Netbios',
                'Nom et prénom',
                'Site',
                'Région',
                'Direction',
                'Bon de commande',
                'date commande',
                'Quantité commandé',
                'Bon de livraison',
                'date de livraison',
                'Quantité livré',
                'Fournisseur',
                'Date d\'affectation',
            ];
        } elseif ($this->interface === 'accessoire') {
            $list[] = [
                'Catégorie',
                'Produit',
                'Numéro de série',
                'Statut',
                'Prix',
                'Nom et prénom',
                'Site',
                'Région',
                'Direction',
                'Bon de commande',
                'date commande',
                'Quantité commandé',
                'Bon de livraison',
                'date de livraison',
                'Quantité livré',
                'Fournisseur',
                'Date d\'affectation',
            ];
        }
        foreach ($equipements as $equipement) {
            if ($this->interface === 'materiel' && $equipement->type === 'materiel') {
                $personne = $equipement->personne;
                $bonLivraison = $equipement->bonLivraison;
                $bonCommande = $equipement->bonCommande;
                $fournisseur = $equipement->fournisseur;
                $affectations = $equipement->affectations;
                $dateAffectation = '';

            foreach ($affectations as $affectation) {
                $dateAffectation = $affectation->date_affectation ? date('Y-m-d', strtotime($affectation->date_affectation)) : '';
                $list[] = [
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
                $dateAffectation, // Ajout de la date d'affectation
            ];
        }
        if (count($affectations) === 0) {
            $list[] = [
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
                '', // Date d'affectation vide
            ];
        }
            } elseif ($this->interface === 'accessoire' && $equipement->type === 'accessoire') {
                $personne = $equipement->personne;
                $bonLivraison = $equipement->bonLivraison;
                $bonCommande = $equipement->bonCommande;
                $fournisseur = $equipement->fournisseur;
                $affectations = $equipement->affectations;
                $dateAffectation = '';

            foreach ($affectations as $affectation) {
                $dateAffectation = $affectation->date_affectation ? date('Y-m-d', strtotime($affectation->date_affectation)) : '';
                $list[] = [
                $equipement->categorie,
                $equipement->produit,
                $equipement->n_serie,
                $equipement->prix,
                $equipement->statut,
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
                $dateAffectation, // Ajout de la date d'affectation
            ];
        }
        if (count($affectations) === 0) {
            $list[] = [
                $equipement->categorie,
                $equipement->produit,
                $equipement->n_serie,
                $equipement->prix,
                $equipement->statut,
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
                '', // Date d'affectation vide
            ];
        }
            }
        }

        return $list;
    }
    
}
