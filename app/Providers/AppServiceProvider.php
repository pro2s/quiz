<?php

namespace App\Providers;

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
        Blade::directive('iiclass', function (string $field) {
            return '<?php echo $errors->has(' . $field . ') ? "is-invalid" : ""; ?>';
        });

        Blade::directive('haserror', function (string $expression) {
            return '<?php if (isset($errors) && $errors->has(' . $expression . ')): ?>';
        });

        Blade::directive('endhaserror', function () {
            return '<?php endif; ?>';
        });

        Blade::directive('icon', function (string $expression) {
            return $expression
                ? "<em data-feather=\"<?php echo ($expression) ?>\"></em>"
                : '<em class="text-danger" data-feather="image"></em>';
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Contracts\Quiz::class,
            \App\Repositories\QuizRepository::class
        );
    }
}
