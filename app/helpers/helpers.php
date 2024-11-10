<?php

use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

define("PAGELIST", "PAGELIST");
define("PAGECREATEFORM", "PAGECREATEFORM");
define("PAGEEDITFORM", "PAGEEDITFORM");

define("PAGELISTSTATION", "PAGELISTSTATION");
define("PAGECREATEFORMSTATION", "PAGECREATEFORMSTATION");
define("PAGEEDITFORMSTATION", "PAGEEDITFORMSTATION");

define("PAGEMESURELIST", "PAGEMESURELIST");
define("PAGECREATEMESUREFORM", "PAGECREATEMESUREFORM");
define("PAGEEDITMESUREFORM", "PAGEEDITMESUREFORM");

define("DEFAULTPASSOWRD", "password");

function userFullName(){
    return auth()->user()->prenom . " " . auth()->user()->nom;
}

function SetMenuClass($route, $classe){
    $routeActuel = request()->route()->getName();
    if(contains($routeActuel, $route)){
        return "$classe";
    }
    return "";
}
function SetMenuActive($route){
    $routeActuel = request()->route()->getName();
    if($routeActuel === $route){
        return "active";
    }
    return "";
}
function contains($container, $contenu){
    return Str::contains($container, $contenu);
}



function getRolesName(){
    $rolesName = "";
    $i = 0;
    foreach(auth()->user()->roles as $role){
        $rolesName .= $role->nom;

        //
        if($i < sizeof(auth()->user()->roles) - 1 ){
            $rolesName .= ",";
        }

        $i++;

    }

    return $rolesName;

}


function getAdminCount()
{
    return User::whereHas('roles', function ($query) {
        $query->where('nom', 'admin');
    })->count();
}

function getChercheurCount()
{
    return User::whereHas('roles', function ($query) {
        $query->where('nom', 'chercheur');
    })->count();
}

function getStagiaireCount()
{
    return User::whereHas('roles', function ($query) {
        $query->where('nom', 'stagiaire');
    })->count();
}

function getPluviometrieCount()
{
    return DB::table('mesure_stations')->count();
}

function getTemperatureCount()
{
    return DB::table('mesure_stations')->count();
}

function getStationCount()
{
    return App\Models\Station::count();
}

function getStationExistDonneesCount()
{
    return DB::table('stations')->whereExists(function ($query) {
        $query->select(DB::raw(1))
              ->from('mesure_stations')
              ->whereRaw('mesure_stations.station_id = stations.id');
    })->count();
}

function getInactiveStationCount()
{
    $activeStationIds = DB::table('mesure_stations')->pluck('station_id')->toArray();
    return DB::table('stations')->whereNotIn('id', $activeStationIds)->count();
}

function getNotificationsCount()
{
    return App\Models\Notification::whereDate('created_at', Carbon::today())->count();
}