<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'sexe',
        'telephone1',
        'telephone2',
        'email',
        'password',
        'photo',
        'departement_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class, "role_users", "user_id", "role_id");
    }

    public function stations(){
        return $this->belongsToMany(Station::class, "mesure_stations", "user_id", "station_id");
    }

    public function stationsmesures(){
        return $this->belongsToMany(Station::class, "mesures", "user_id", "station_id");
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class, "permission_users", "user_id", "permission_id");
    }

    public function notifications(){
        return $this->hasMany(Notification::class);
    }

    public function hasRole($role){
        return $this->roles()->where("nom", $role)->first() !== null;
    }

    public function hasAnyRoles($roles){
        return $this->roles()->whereIn("nom", $roles)->first() !== null;
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }
}
