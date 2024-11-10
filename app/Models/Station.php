<?php

namespace App\Models;
use App\Models\Departement;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'latitude',
        'longitude',
        'altitude',
        'departement_id',
        'imageUrl'
    ];

    public function departement(){
        return $this->belongsTo(Departement::class);
    }

    public function users(){
        return $this->belongsToMany(User::class, "mesure_stations", "station_id", "user_id");
    }

    public function usersmesures(){
        return $this->belongsToMany(User::class, "mesures", "station_id", "user_id");
    }

        // Définition de la relation
        public function mesures()
        {
            return $this->hasMany(MesureStation::class);
        }
    
        // Relation avec l'utilisateur
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
