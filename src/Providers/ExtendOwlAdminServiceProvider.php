<?php

namespace VladislavTkachenko\Admin\Providers;

use AdminFormElement;
use Illuminate\Support\ServiceProvider;
use VladislavTkachenko\Admin\FormElements\OrderableBlock;
use VladislavTkachenko\Admin\FormElements\OrderableImages;
use VladislavTkachenko\Admin\Widgets\NavigationUserBlock;
use SleepingOwl\Admin\Contracts\Widgets\WidgetsRegistryInterface;


class ExtendOwlAdminServiceProvider extends ServiceProvider
{
    protected $widgets = [
        NavigationUserBlock::class,
    ];

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

        $this->publishes([
            __DIR__.'/../../config/sleeping_owl_extend.php' => config_path('sleeping_owl_extend.php'),
        ], 'config');

        if(config('sleeping_owl_extend.auth_widget')){
            $widgetsRegistry = $this->app[WidgetsRegistryInterface::class];
            foreach ($this->widgets as $widget)
                $widgetsRegistry->registerWidget($widget);
        }
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
