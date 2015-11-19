<?php

namespace App\Providers;

use App\Article;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeNavigation();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Compose Navigation of latest Article.    
     * @return $article->latest();
     */
    private function composeNavigation(){

        /**
         * This is same as below
         * view()->composer('partials.nav', function($view){
         *     $view->with('latest', Article::latest()->first());
         * });
         */
        
        view()->composer('partials.nav','App\Http\Composers\NavigationComposer');
        
        
        
    }
}
