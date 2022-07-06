<?php


namespace Packages\ticket\src\Provider;


use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Packages\ticket\src\command\InstallTicket;
use Packages\ticket\src\Http\Livewire\Admin\TicketEdit;
use Packages\ticket\src\Http\Livewire\Admin\TicketIndex;
use Packages\ticket\src\Http\Livewire\Home\Dashboard\TicketCreatePage;
use Packages\ticket\src\Http\Livewire\Home\Dashboard\TicketPage;
use Packages\ticket\src\Http\Livewire\Home\Dashboard\TicketShowPage;

class TicketServiceProvider extends ServiceProvider
{
    /**
     * @var string $$this->packageName
     */
    protected $packageName = 'ticket';

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

        if (config('ticket.sidebar')) {
            $sidebar[] = config('ticket.sidebar');
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
                InstallTicket::class,
            ]);
        }
    }

    public function registerLivewire()
    {
        Livewire::component('ticket-edit' , TicketEdit::class);
        Livewire::component('ticket-index' , TicketIndex::class);
        Livewire::component('ticket-page' , TicketPage::class);
        Livewire::component('ticket-create-page' , TicketCreatePage::class);
        Livewire::component('ticket-show-page' , TicketShowPage::class);
    }
}
