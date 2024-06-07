<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparation extends Model
{
    use HasFactory;
    protected $table="reparations";
    protected $fillable=[
        'description',
        'status',
        'startDate',
        'endDate',
        'mechanicNotes',
        'clientNotes',
        'mecanic_id',
        'vehicule_id'

    ]
    ;
    public function mecanicien(){
        return $this->belongsTo(Mecanicien::class);
    }
    public function vehicule(){
        return $this->belongsTo(Vehicule::class,'vehicule_id');
    }
    public function factures(){
        return $this->hasOne(Facture::class,'reparation_id');
    }
}
