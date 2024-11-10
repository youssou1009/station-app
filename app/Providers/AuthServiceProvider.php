<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];
    

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        Gate::define("chercheur", function(User $user){
            return $user->hasRole("chercheur");
        });

        Gate::define("stagiaire", function(User $user){
            return $user->hasRole("stagiaire");
        });

        Gate::before(function  (User $user, $ability){
            if ($user->hasRole("admin")) {
                return true; // L'administrateur a toujours accès
            }
        });
        
    }
}
