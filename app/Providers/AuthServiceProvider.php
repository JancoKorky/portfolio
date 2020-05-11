<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //

        Gate::define('edit-portfolio', function ($user, $profileUser) {
            return $user->id === $profileUser->id;
        });

        Gate::define('edit-category', function ($user, $categoryUser) {
            return $user->id === $categoryUser->user_id;
        });

        Gate::define('edit-album', function ($user, $albumUser) {
            return $user->id === $albumUser->user_id;
        });

        Gate::define('edit-image-portfolio', function ($user, $portfolio_image) {
            return $user->id === $portfolio_image->user_id;
        });
    }
}
