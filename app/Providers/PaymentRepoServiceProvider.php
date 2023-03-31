<?php

namespace App\Providers;

use App\Interfaces\PaymentInterface;
use App\Repositories\PaymentRepository;
use Illuminate\Support\ServiceProvider;

class PaymentRepoServiceProvider extends ServiceProvider {
    public function boot(){}

    public function register()
    {
        $this->app->bind(PaymentInterface::class, PaymentRepository::class);
    }
}
