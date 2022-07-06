<?php


namespace Packages\academy\src\Provider;


use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Packages\academy\src\command\InstallAcademy;
use Packages\academy\src\Http\Livewire\Admin\AcademySetting;
use Packages\academy\src\Http\Livewire\Admin\Arvan\ArvanUploader;
use Packages\academy\src\Http\Livewire\Admin\CourseCreate;
use Packages\academy\src\Http\Livewire\Admin\CourseEdit;
use Packages\academy\src\Http\Livewire\Admin\CourseIndex;
use Packages\academy\src\Http\Livewire\Admin\EditorPopup;
use Packages\academy\src\Http\Livewire\Admin\EpisodeEdit;
use Packages\academy\src\Http\Livewire\Admin\EpisodeIndex;
use Packages\academy\src\Http\Livewire\Admin\LearningIndex;
use Packages\academy\src\Http\Livewire\Admin\LearningSeason;
use Packages\academy\src\Http\Livewire\Admin\SeasonEdit;
use Packages\academy\src\Http\Livewire\Admin\SeasonIndex;
use Packages\academy\src\Http\Livewire\Home\Dashboard\CoursesPage;
use Packages\academy\src\Http\Livewire\Home\TeacherShow;
use Packages\academy\src\Http\Middleware\CheckHasLearning;

class AcademyServiceProvider extends ServiceProvider
{
    /**
     * @var string $$this->packageName
     */
    protected $packageName = 'academy';

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

        if (config('academy.sidebar')) {
            $sidebar[] = config('academy.sidebar');
            config()->set('sidebar', $sidebar);
        }

        $this->app['router']->aliasMiddleware('checklearing', CheckHasLearning::class);

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(EventServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            package_path($this->packageName, 'config/config.php', true) => config_path($this->packageName . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            package_path($this->packageName, 'config/config.php', true), $this->packageName
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
                InstallAcademy::class,
            ]);
        }
    }

    public function registerLivewire()
    {
        Livewire::component('course-index', CourseIndex::class);
        Livewire::component('course-create', CourseCreate::class);
        Livewire::component('course-edit', CourseEdit::class);
        Livewire::component('season-index', SeasonIndex::class);
        Livewire::component('season-edit', SeasonEdit::class);
        Livewire::component('episode-index', EpisodeIndex::class);
        Livewire::component('episode-edit', EpisodeEdit::class);
        Livewire::component('arvan-uploader', ArvanUploader::class);
        Livewire::component('academy-setting', AcademySetting::class);
        Livewire::component('learning-index', LearningIndex::class);
        Livewire::component('learning-season', LearningSeason::class);
        Livewire::component('editor-popup', EditorPopup::class);

        Livewire::component('info-course', \Packages\academy\src\Http\Livewire\Home\InfoCourse::class);
        Livewire::component('info-seasons', \Packages\academy\src\Http\Livewire\Home\InfoSeasons::class);
        Livewire::component('list-course', \Packages\academy\src\Http\Livewire\Home\ListCourse::class);


        Livewire::component('courses-page' , CoursesPage::class);
        Livewire::component('teacher-show' , TeacherShow::class);
    }

    public function registerComponents()
    {
    }
}
