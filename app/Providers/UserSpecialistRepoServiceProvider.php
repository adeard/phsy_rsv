<?php

namespace App\Providers;

use App\Interfaces\UserSpecialistInterface;
use App\Repositories\UserSpecialistRepository;
use Illuminate\Support\ServiceProvider;

class UserSpecialistRepoServiceProvider extends ServiceProvider {
    public function boot(){}

    public function register()
    {
        $this->app->bind(UserSpecialistInterface::class, UserSpecialistRepository::class);
    }
}
