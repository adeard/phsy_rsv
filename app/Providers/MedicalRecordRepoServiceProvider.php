<?php

namespace App\Providers;

use App\Interfaces\MedicalRecordInterface;
use App\Repositories\MedicalRecordRepository;
use Illuminate\Support\ServiceProvider;

class MedicalRecordRepoServiceProvider extends ServiceProvider {
    public function boot(){}

    public function register()
    {
        $this->app->bind(MedicalRecordInterface::class, MedicalRecordRepository::class);
    }
}
