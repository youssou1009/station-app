<?php

namespace App\Models;
use App\Models\Permission;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom'
    ];

    // public function permissions(){
    //     return $this->hasMany(Permission::class);
    // }

    public function users(){
        return $this->belongsToMany(User::class, "role_users", "role_id", "user_id");
    }

    


}
