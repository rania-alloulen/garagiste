<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    protected $table="factures";
    protected $fillable=[
        'reparation_id',
        'chargeSupp',
        'montant'
    ]
    ;
    public function reparation(){
        return $this->belongsTo(Reparation::class,'reparation_id');
    }
}
