<?php

namespace [vendor]\[package];

use Illuminate\Support\ServiceProvider;

class [package]ServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {

      $this->loadViewsFrom(__DIR__.'/../resources/views', '[package]');
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

      $this->mergeConfigFrom(__DIR__.'/../config/[package].php', '[package]');

  		$this->app->singleton('[package]', function ($app) {
  			return new [package];
  		});

    }

    public function provides()
  	{

  		return ['[package]'];

  	}

    protected function bootForConsole()
  	{

  		// Publishing the configuration file.
  		$this->publishes([
  			__DIR__.'/../config/[package].php' => config_path('[package].php'),
  		], '[package].config');

  		// Publishing the views.
      $this->publishes([
          __DIR__.'/../resources/views' => base_path('resources/views/vendor/[vendor]'),
      ], '[package].views');

      // Publishing assets.
      $this->publishes([
          __DIR__.'/../resources/assets' => public_path('vendor/[vendor]'),
      ], 'public');

  	}
}
