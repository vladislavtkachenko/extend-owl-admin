<?php

namespace VladislavTkachenko\Admin\Providers;

use AdminFormElement;
use Illuminate\Support\ServiceProvider;
use VladislavTkachenko\Admin\FormElements\OrderableBlock;
use VladislavTkachenko\Admin\FormElements\OrderableImages;

class ExtendOwlAdminServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'vladislavtkachenko');

        $this->publishes([
            __DIR__.'/../../assets' => public_path('vendor/vladislavtkachenko'),
        ], 'public');
    }

    /**
     * Register any application services.
     * @return void
     */
    public function register()
    {
        require __DIR__ . '/../routes/web.php';

        AdminFormElement::add('orderableBlock', OrderableBlock::class);
        AdminFormElement::add('orderableImages', OrderableImages::class);
    }
}
