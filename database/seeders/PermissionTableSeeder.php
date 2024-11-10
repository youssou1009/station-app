<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("permissions")->insert([
            ["nom"=> "ajouter un utilisateur"],
            ["nom"=> "editer un utilisateur"],
            ["nom"=> "supprimer un utilisateur"],

            ["nom"=> "ajouter une station"],
            ["nom"=> "editer une station"],
            ["nom"=> "supprimer une station"],

            ["nom"=> "consulter une station"],
        ]);
    }
}
