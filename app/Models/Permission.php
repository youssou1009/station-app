<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom'
    ];

    // public function role(){
    //     return $this->belongsTo(Role::class);
    // }
    public function users(){
        return $this->belongsToMany(User::class, "permission_users", "permission_id", "user_id");
    }
}
