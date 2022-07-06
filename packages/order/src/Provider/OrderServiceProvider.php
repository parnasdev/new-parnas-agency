<?php


namespace Packages\order\src\Provider;


use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Packages\order\src\command\ExpireOrder;
use Packages\order\src\command\InstallOrder;
use Packages\order\src\command\UpdateOrder;
use Packages\order\src\Http\CartService;
use Packages\order\src\Http\Livewire\Admin\DiscountCreate;
use Packages\order\src\Http\Livewire\Admin\DiscountEdit;
use Packages\order\src\Http\Livewire\Admin\DiscountIndex;
use Packages\order\src\Http\Livewire\Admin\OrderIndex;
use Packages\order\src\Http\Livewire\Admin\OrderShow;
use Packages\order\src\Http\Livewire\Home\CartList;
use Packages\order\src\Http\Livewire\Home\Dashboard\OrderInfo;
use Packages\order\src\Http\Livewire\Home\Dashboard\OrderList;

class OrderServiceProvider extends ServiceProvider
{
    /**
     * @var string $$this->packageName
     */
    protected $packageName = 'order';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerCommand();
        $this->registerConfig();
        $this->registerViews();
        $this->registerLivewire();
        $this->loadMigrationsFrom(package_path($this->packageName, 'database/migrations'));

        $sidebar = config('sidebar');

        if (config('order.sidebar')) {
            $sidebar[] = config('order.sidebar');
            $sidebar[] = config('order.sidebar2');
            config()->set('sidebar' , $sidebar);
        }

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->singleton('cart' , function () {
            return new CartService();
        });
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            package_path($this->packageName, 'config/config.php' , true) => config_path($this->packageName . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            package_path($this->packageName, 'config/config.php' , true), $this->packageName
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/packages/' . $this->packageName);

        $sourcePath = package_path($this->packageName, 'resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', $this->packageName . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->packageName);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/packages/' . $this->packageName);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->packageName);
        } else {
            $this->loadTranslationsFrom(package_path($this->packageName, 'resources/lang'), $this->packageName);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (Config::get('view.paths') as $path) {
            if (is_dir($path . '/packages/' . $this->packageName)) {
                $paths[] = $path . '/packages/' . $this->packageName;
            }
        }
        return $paths;
    }

    public function registerCommand()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallOrder::class,
                ExpireOrder::class,
                UpdateOrder::class
            ]);
        }
    }

    public function registerLivewire()
    {
        Livewire::component('cart-list' , CartList::class);
        Livewire::component('order-index' , OrderIndex::class);
        Livewire::component('order-show' , OrderShow::class);

        Livewire::component('discount-index' , DiscountIndex::class);
        Livewire::component('discount-create' , DiscountCreate::class);
        Livewire::component('discount-edit' , DiscountEdit::class);

        Livewire::component('order-list' , OrderList::class);
        Livewire::component('order-info' , OrderInfo::class);
    }
}
