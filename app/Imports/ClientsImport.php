<?php

namespace App\Imports;
use App\Models\Client;
use Maatwebsite\Excel\Concerns\ToModel;

class ClientsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Client([
            'Nom'=> $row['Nom'],
            'prenom'=> $row['prenom'],
            'adresse'=> $row['adresse'],
            'telephone'=> $row['telephone'],
        ]);
    }
}
