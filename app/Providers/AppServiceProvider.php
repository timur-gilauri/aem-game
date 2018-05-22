<?php

namespace App\Providers;

use App\Http\ViewComposers\UserComposer;
use Illuminate\Contracts\View\Factory as ViewFactory;
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
        /**
         * @var ViewFactory $viewFactory
         */
        $viewFactory = app(ViewFactory::class);

        $viewFactory->composer([
            'blocks.player-stats'
        ], UserComposer::class);

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
