<?php

namespace App\Providers;

use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Builder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //require_once __DIR__ . '/../Http/Helpers/func_helper.php';
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Builder::defaultStringLength(191);
        if($this->app->environment() === 'local') {
            DB::listen(function (QueryExecuted $query) {
                file_put_contents('php://stdout', "\e[34m{$query->sql}\t\e[37m" . json_encode($query->bindings) . "\t\e[32m{$query->time}ms\e[0m\n");
            });
        }
    }
}
