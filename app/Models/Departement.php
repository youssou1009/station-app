<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Region;
use App\Models\Chercheur;
use App\Models\Station;

class Departement extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom'
    ];

    public function region(){
        return $this->belongsTo(Region::class);
    }

    public function chercheurs(){
        return $this->hasMany(Chercheur::class);
    }

    public function stations(){
        return $this->hasMany(Station::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
     }
}
