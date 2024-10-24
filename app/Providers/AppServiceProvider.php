<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Helper\Cart;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Cart::class, function ($app) {
            return new Cart();
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        view()->composer("*",function($view){
            $view->with([
                'cart' => new Cart()
            ]);
        });
        view()->composer("*",function($view){
            $view->with([
                'categories' => Category::where('parent_id', 0)->get(),

            ]);
        });
        view()->composer('*', function ($view) {
            $view->with('categoryId', Category::all());
        });
    }
}
