<?php

declare(strict_types=1);

namespace App\Providers;

use App\Http\Controllers\Admin\DischargeController;
use App\Queries\CategoriesQueryBuilder;
use App\Queries\DischargeQueriesBuilder;
use App\Queries\NewsQueryBuilder;
use App\Queries\QueryBuilder;
use App\Queries\UserQueryBuilder;
use App\Services\Contracts\Parser;
use App\Services\ParserService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(QueryBuilder::class, CategoriesQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, NewsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, DischargeQueriesBuilder::class);
        $this->app->bind(QueryBuilder::class, UserQueryBuilder::class);

        $this->app->bind(Parser::class, ParserService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
