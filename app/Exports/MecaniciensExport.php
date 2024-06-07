<?php

namespace App\Exports;

use App\Models\Mecanicien;
use Maatwebsite\Excel\Concerns\FromCollection;

class MecaniciensExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mecanicien::all();
    }
}
