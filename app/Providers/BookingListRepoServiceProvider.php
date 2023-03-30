<?php

namespace App\Providers;

use App\Interfaces\BookingListInterface;
use App\Repositories\BookingListRepository;
use Illuminate\Support\ServiceProvider;

class BookingListRepoServiceProvider extends ServiceProvider {
    public function boot(){}

    public function register()
    {
        $this->app->bind(BookingListInterface::class, BookingListRepository::class);
    }
}
