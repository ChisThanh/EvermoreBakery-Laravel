<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $repositories = File::allFiles(app_path('Repositories'));

        foreach ($repositories as $repository) {
            $this->registerRepository($repository);
        }
    }

    protected function registerRepository($repository)
    {
        $repositoryClass = 'App\\Repositories\\' . $repository->getBasename('.php');

        if (class_exists($repositoryClass)) {
            $this->app->singleton($repositoryClass, function ($app) use ($repositoryClass) {
                return new $repositoryClass();
            });
        }
    }

    public function boot(): void
    {
        $categoryHeader = Category::inRandomOrder()->with('images')->limit(5)->get();
        $categoryHeader->transform(function ($item) {
            $item->image = $item->images()->first()->url ?? null;
            return $item;
        });
        view()->share('categoryHeader', $categoryHeader);
    }
}
