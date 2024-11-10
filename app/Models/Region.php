<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Departement;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom'
    ];

    public function departements(){
        return $this->hasMany(Departement::class);
    }
}
