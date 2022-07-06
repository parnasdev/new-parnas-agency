<?php


namespace Packages\form\src\Provider;


use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Packages\form\src\command\InstallForm;
use Packages\form\src\Http\Components\Button;
use Packages\form\src\Http\Components\Inputs\Text;
use Packages\form\src\Http\Components\Inputs\Textarea;
use Packages\form\src\Http\Livewire\Admin\FormCreate;
use Packages\form\src\Http\Livewire\Admin\FormEdit;
use Packages\form\src\Http\Livewire\Admin\FormInbox;
use Packages\form\src\Http\Livewire\Admin\FormIndex;
use Packages\form\src\Http\Livewire\FormBuilder;

class FormServiceProvider extends ServiceProvider
{
    /**
     * @var string $$this->packageName
     */
    protected $packageName = 'form';

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
        $this->registerComponents();
        $this->loadMigrationsFrom(package_path($this->packageName, 'database/migrations'));

        $sidebar = config('sidebar');

        if (config('form.sidebar')) {
            $sidebar[] = config('form.sidebar');
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
                InstallForm::class,
            ]);
        }
    }

    public function registerLivewire()
    {
        Livewire::component('form-index' , FormIndex::class);
        Livewire::component('form-create' , FormCreate::class);
        Livewire::component('form-edit' , FormEdit::class);
        Livewire::component('form-inbox' , FormInbox::class);
        Livewire::component('form-builder' , FormBuilder::class);
    }

    public function registerComponents()
    {
        $this->loadViewComponentsAs($this->packageName, [
            Text::class,
            Button::class,
            Textarea::class,
        ]);
    }
}
