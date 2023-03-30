<?php

namespace App\Providers;

use App\Interfaces\PatientInterface;
use App\Repositories\PatientRepository;
use Illuminate\Support\ServiceProvider;

class PatientRepoServiceProvider extends ServiceProvider {
    public function boot(){}

    public function register()
    {
        $this->app->bind(PatientInterface::class, PatientRepository::class);
    }
}
