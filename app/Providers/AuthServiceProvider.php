<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

class AuthServiceProvider extends ServiceProvider
{
    /**
    * The policy mappings for the application.
    *
    * @var array
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
        
        Gate::define('isAdmin', function($user){
            $is_admin = $this->getRolePermissions($user->role);
            if($is_admin == 1){
                return true;
            }
            return false;
        });

        Gate::define('isVendor', function($user){
            $is_admin = $this->getRolePermissions($user->role);
            if($is_admin == 0){
                return true;
            }
            return false;
        });
        
    }
    
    public function getRolePermissions($role_id){
        
        $is_admin = DB::table('roles')
        ->where('id', $role_id)
        ->value('is_admin');
        
        return $is_admin;
        
    }
    
    
    
    
    
}
