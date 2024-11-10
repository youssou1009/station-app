<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MesureStation extends Model
{
    use HasFactory;

    protected $table = 'mesure_stations';
    public $timestamps = true;

    protected $fillable = [
        'pluviometrie',
        'temperature',
        'station_id',
        'user_id'
    ];

    // Définition de la relation
    public function station()
    {
        return $this->belongsTo(Station::class);
    }

   
}
