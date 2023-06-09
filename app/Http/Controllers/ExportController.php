<?php

namespace App\Http\Controllers;

use App\Exports\EquipementExport;
use App\Imports\AffectImport;
use App\Imports\CommandeImport;
use App\Imports\EquipementImport;
use App\Imports\LivraisonImport;
use App\Imports\PersonneImport;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportmateriel(){
        $interface = 'materiel'; 
        $export = new EquipementExport($interface);
        return Excel::download($export, 'Materiels.xlsx');   
    }
    public function exportaccessoire(){
        $interface = 'accessoire'; 
        $export = new EquipementExport($interface);
        return Excel::download($export, 'Accessoires.xlsx');   

    }
    public function importmateriel(Request $request){
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);
        try{
            $interface = 'materiel';

            $file = $request->file('file');

           // Excel::import(new PersonneImport, $file);
            Excel::import(new CommandeImport, $file);
            Excel::import(new LivraisonImport, $file);
            Excel::import(new EquipementImport($interface), $file);
            Excel::import(new AffectImport, $file);

            return redirect()->back()->with('success', 'Importation de matériel réussie.');

        }catch(\Exception $e){
            return redirect()->back()->with('fail', 'Erreur lors de l\'importation de matériel : ' . $e->getMessage());
        }

    }
    public function importaccessoire(Request $request){
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);
        try{
            $interface = 'accessoire';

            $file = $request->file('file');

           // Excel::import(new PersonneImport, $file);
            Excel::import(new CommandeImport, $file);
            Excel::import(new LivraisonImport, $file);
            Excel::import(new EquipementImport($interface), $file);
            Excel::import(new AffectImport, $file);

            return redirect()->back()->with('success', 'Importation de matériel réussie.');

        }catch(\Exception $e){
            return redirect()->back()->with('fail', 'Erreur lors de l\'importation de matériel : ' . $e->getMessage());
        }

    }
    
}
