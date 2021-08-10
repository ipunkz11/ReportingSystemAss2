<?php

namespace App\Repositories\User;

use Illuminate\Support\ServiceProvider;

class UserRepoServiceProvide extends ServiceProvider{
    public function register()
    {
        $this->app->bind('App\Repositories\User\UserInterface', 'App\Repositories\User\UserRepository');
    }
}