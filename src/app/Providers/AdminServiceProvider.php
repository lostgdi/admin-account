<?php

namespace Lostgdi\Admin\App\Providers;

//use Lostgdi\Admin\App;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
	$this->loadViewsFrom(__DIR__.'/../../views', 'Admin');
	include __DIR__.'/../Http/routes.php';


            
            $this->publishes([
                __DIR__.'/../../public' => base_path('public'),
                __DIR__.'/../../database' => base_path('database'),
            ]);
            
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AdminController::class, function ($app) {
            return new AdminController();
        });
        
    }
	
     /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['admin'];
    }
}
