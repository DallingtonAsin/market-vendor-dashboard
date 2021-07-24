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


        Gate::define('isSuperAdmin', function($user){
            $arr = $this->getRolePermissions($user->role);
            $permitX = $arr['isAdmin'];
            $permitY = $arr['isSuperAdmin'];

            if($permitX == 1 && $permitY == 1){
               return true;
           }
           return false;
       });

        Gate::define('isAdmin', function($user){

         $arr = $this->getRolePermissions($user->role);
         $permitX = $arr['isAdmin'];
         $permitY = $arr['isSuperAdmin'];

         if($permitX == 1 && $permitY == 0){
            return true;
        }
        return false;
    });

    }

     public function getRolePermissions($role_id){

      $isAdmin = DB::table('roles')
      ->where('id', $role_id)
      ->value('is_admin');

      $isSuperAdmin = DB::table('roles')
      ->where('id', $role_id)
      ->value('is_master');

      $dataArr = array(
        'isAdmin' => $isAdmin,
        'isSuperAdmin' => $isSuperAdmin,
      );

      return $dataArr;

    }





}
