<?php

namespace App\Providers;

use App\Interfaces\UserLevelInterface;
use App\Repositories\UserLevelRepository;
use Illuminate\Support\ServiceProvider;

class UserLevelRepoServiceProvider extends ServiceProvider {
    public function boot(){}

    public function register()
    {
        $this->app->bind(UserLevelInterface::class, UserLevelRepository::class);
    }
}
