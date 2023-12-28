<?php

namespace App\Providers;

use App\Http\Resources\Account\UserResource;
use App\Services\Account\AccountService;
use App\Services\Document\DocumentService;
use App\Services\Project\ProjectService;
use App\Services\Team\TeamService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('account_service', AccountService::class);
        $this->app->bind('projects', ProjectService::class);
        $this->app->bind('documents', DocumentService::class);
        $this->app->bind('team', TeamService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        UserResource::withoutWrapping();
    }
}
