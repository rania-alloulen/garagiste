<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table='clients';
    protected $fillable=[
        'prenom',
        'nom',
        'adresse',
        'telephone',
        'user_id'
    ]

    ;

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function vehicules(){
        return $this->hasMany(Vehicule::class,'client_id');
    }
}
