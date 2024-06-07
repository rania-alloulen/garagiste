<?php

namespace App\Imports;

use App\Models\Mecanicien;
use Maatwebsite\Excel\Concerns\ToModel;

class MecaniciensImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mecanicien([
            //
        ]);
    }
}
