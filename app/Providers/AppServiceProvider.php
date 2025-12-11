<?php

namespace App\Providers;

use App\Interfaces\Repositories\IStudentRepository;
use App\Interfaces\Services\IStudentService;
use App\Repositories\StudentRepository;
use App\Services\StudentService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IStudentRepository::class, StudentRepository::class);
        $this->app->bind(IStudentService::class, StudentService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
