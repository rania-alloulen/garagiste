<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;
    protected $table="vehicules";
    protected $fillable=[
        'marque',
        'modele',
        'typeFuel',
        'registration',
        'image',
        'client_id'
    ];

    public function client(){
        return $this->belongsTo(Client::class,'client_id');
    }
    public function reparations(){
        return $this->hasMany(Reparation::class,'vehicule_id');
    }
}
