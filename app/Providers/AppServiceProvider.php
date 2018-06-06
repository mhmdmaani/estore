<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;
//to pass data to layout
use Illuminate\Support\Facades\View;
use App\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
		Schema::defaultStringLength(191);
    /*to pass data to layout*/
    View::composer('layouts.app', function ($view) {
      $categories = Category::with('products')->get()->sortByDesc(function($category)
  {
      return $category->products->count();
  });
    $view->with(['footerCat'=>$categories]);
});
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
