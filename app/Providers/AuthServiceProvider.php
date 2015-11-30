<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('is-superadmin',
            function ($user) {
                return $user->is_admin === true;
            }
        );

        $gate->define('is-superadmin',
            function ($user1, $user2) {
                return $user1->is_admin === true;
            }
        );

        $gate->define('is-christmas',
            function () {
                //$date = now();
            }
        );

        $gate->define('is-superadmin',
            function ($user) {
            return $user->id === true;
            }
        );

        $gate->define('update-post',
            function ($user, $post) {
                return $user->id === $post->user_id;
            }
        );

        $gate->define('update-post',
            function ($user) {
                $roles = $user->roles();
                foreach ($roles as $role) {
                    $permissions = $role->permissions();
                    foreach ($permissions as $permissions) {
                        if ($permissions == 'update-user') {
                            return true;
                        }
                    }
                }
                return false;
            }
        );
    }
}
