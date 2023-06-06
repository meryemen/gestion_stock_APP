<?php

namespace App\Imports;

use App\Models\Equipement;
use Maatwebsite\Excel\Concerns\ToModel;

class EquipementImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Equipement([
            
        ]);
    }
}
