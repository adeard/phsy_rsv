<?php

namespace App\Providers;

use App\Interfaces\PaymentHistoryInterface;
use App\Repositories\PaymentHistoryRepository;
use Illuminate\Support\ServiceProvider;

class PaymentHistoryRepoServiceProvider extends ServiceProvider {
    public function boot(){}

    public function register()
    {
        $this->app->bind(PaymentHistoryInterface::class, PaymentHistoryRepository::class);
    }
}
