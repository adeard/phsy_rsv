<?php

namespace App\Providers;

use App\Interfaces\ContactTypeInterface;
use App\Repositories\ContactTypeRepository;
use Illuminate\Support\ServiceProvider;

class ContactTypeRepoServiceProvider extends ServiceProvider {
    public function boot(){}

    public function register()
    {
        $this->app->bind(ContactTypeInterface::class, ContactTypeRepository::class);
    }
}
