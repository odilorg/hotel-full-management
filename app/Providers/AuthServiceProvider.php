<?php

namespace App\Providers;

use App\Models\Expense;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
         //'App\Models\Expense' => 'App\Policies\ExpensePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('not-cleaning', function ($user) {
            return in_array($user->role, [1,2]); 
           
        });
        Gate::define('admin', function ($user) {
            return $user->role == 1; 
           
        });

        
        Gate::define('cleaning', function ($user) {
            return in_array($user->role, [1,3]); 
           
        });


    }
}
