<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\{ CategoryRepository, AuthorRepository, BookRepository};
use App\Repositories\Interfaces\{ CategoryRepositoryInterface, AuthorRepositoryInterface, BookRepositoryInterface};
use App\Services\{CategoryService, AuthorService, BookService};


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Регистрация репозиториев
        $this->app->singleton(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->singleton(AuthorRepositoryInterface::class, AuthorRepository::class);
        $this->app->singleton(BookRepositoryInterface::class, BookRepository::class);

        // Регистрация сервисов
        $this->app->singleton(CategoryService::class, CategoryService::class);
        $this->app->singleton(AuthorService::class, AuthorService::class);
        $this->app->singleton(BookService::class, BookService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
