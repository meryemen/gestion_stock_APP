<?php

namespace App\Http\Controllers;

use App\Exports\EquipementExport;
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

    
}
