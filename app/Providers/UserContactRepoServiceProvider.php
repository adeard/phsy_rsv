<?php

namespace App\Providers;

use App\Interfaces\UserContactInterface;
use App\Repositories\UserContactRepository;
use Illuminate\Support\ServiceProvider;

class UserContactRepoServiceProvider extends ServiceProvider {
    public function boot(){}

    public function register()
    {
        $this->app->bind(UserContactInterface::class, UserContactRepository::class);
    }
}
