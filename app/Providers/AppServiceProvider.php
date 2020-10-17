<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('roles', function ($roles) {
            return Auth::check() && Auth::user()->hasAnyRole($roles);
        });

        Blade::directive('iiclass', function ($field) {
            return '<?php echo $errors->has(' . $field . ') ? "is-invalid" : ""; ?>';
        });

        Blade::directive('haserror', function ($expression) {
            return '<?php if (isset($errors) && $errors->has(' . $expression . ')): ?>';
        });

        Blade::directive('endhaserror', function () {
            return '<?php endif; ?>';
        });

        Blade::directive('icon', function ($expression) {
            return "<em data-feather=\"<?php echo ($expression) ?>\"></em>";
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
