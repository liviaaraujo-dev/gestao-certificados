<?php

namespace App\Providers;

use App\Interfaces\Repositories\ICertificateRepository;
use App\Interfaces\Repositories\IStudentRepository;
use App\Interfaces\Services\ICertificateService;
use App\Interfaces\Services\IStudentService;
use App\Repositories\CertificateRepository;
use App\Repositories\StudentRepository;
use App\Services\CertificateService;
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
        $this->app->bind(ICertificateRepository::class, CertificateRepository::class);
        $this->app->bind(ICertificateService::class, CertificateService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
