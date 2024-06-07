<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mecanicien extends Model
{
    use HasFactory;
    protected $table="mecaniciens";
    protected $fillable=[
        'prenom',
        'nom',
        'adresse',
        'telephone',
        'user_id'
    ]

    ;

    public function reparations(){
        return $this->hasMany(Reparation::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
