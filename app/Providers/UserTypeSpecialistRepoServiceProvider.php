<?php

namespace App\Providers;

use App\Interfaces\UserTypeSpecialistInterface;
use App\Repositories\UserTypeSpecialistRepository;
use Illuminate\Support\ServiceProvider;

class UserTypeSpecialistRepoServiceProvider extends ServiceProvider {
    public function boot(){}

    public function register()
    {
        $this->app->bind(UserTypeSpecialistInterface::class, UserTypeSpecialistRepository::class);
    }
}
