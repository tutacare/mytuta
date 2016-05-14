<?php

namespace Tuta\Mytuta;

use Illuminate\Support\ServiceProvider;

class MytutaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->bind('mytuta', function($app) {
          return new Mytuta($app);
      });
    }
}
