<?php

namespace App\Providers;

use App\Interfaces\UserTypeInterface;
use App\Repositories\UserTypeRepository;
use Illuminate\Support\ServiceProvider;

class UserTypeRepoServiceProvider extends ServiceProvider {
    public function boot(){}

    public function register()
    {
        $this->app->bind(UserTypeInterface::class, UserTypeRepository::class);
    }
}
