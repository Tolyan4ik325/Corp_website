<?php

namespace Corp\Providers;

use Illuminate\Support\ServiceProvider;

use Blade;

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

        //set($i,10)
        Blade::directive('set', function($exp) {

            list($name, $val) = explode(',', $exp);

            return "<?php $name = $val ?>"; 

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
