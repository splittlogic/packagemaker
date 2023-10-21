<?php

namespace splittlogic\packagemaker;

use Illuminate\Support\ServiceProvider;

class PackageMakerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {

      $this->loadViewsFrom(__DIR__.'/../resources/views', 'packagemaker');
  		$this->loadRoutesFrom(__DIR__.'/routes/web.php');
      /*
       * Optional methods to load your package assets
       */
       // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

  		if ($this->app->runningInConsole()) {
  			$this->bootForConsole();
  		}

    }

    /**
     * Register the application services.
     */
    public function register()
    {

      $this->mergeConfigFrom(__DIR__.'/../config/packagemaker.php', 'packagemaker');

  		$this->app->singleton('packagemaker', function ($app) {
  			return new packagemaker;
  		});

    }

    public function provides()
  	{

  		return ['packagemaker'];

  	}

    protected function bootForConsole()
  	{

  		// Publishing the configuration file.
  		$this->publishes([
  			__DIR__.'/../config/packagemaker.php' => config_path('packagemaker.php'),
  		], 'bs5.config');

  		// Publishing the views.
      $this->publishes([
          __DIR__.'/../resources/views' => base_path('resources/views/vendor/splittlogic'),
      ], 'packagemaker.views');

      // Publishing assets.
      $this->publishes([
          __DIR__.'/../resources/assets' => public_path('vendor/splittlogic'),
      ], 'public');

  	}
}
