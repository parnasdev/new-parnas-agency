<?php

namespace App\Providers;

use App\Console\Commands\InstallCMS;
use App\Models\Setting;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCMS::class,
            ]);
        }

        Schema::defaultStringLength('244');

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            $options = [];
            foreach (Setting::query()->get() ?? [] as $item) {
                $options[$item->name] = $item->value;
            }

            if (!session()->has('guest_key') && !str_starts_with(Route::currentRouteName(), 'admin')) {
                session()->put('guest_key', Str::uuid()->toString());
            }

            $langs = ['fa' , 'en'];
            $lang = request('lang') ??  App::currentLocale();
            if (in_array($lang, $langs)) {
                App::setLocale($lang);
            } else {
                abort(404, 'زبانی پیدا نشد');
            }

            if ($lang == 'en') {
                config()->set('seotools.meta.defaults', [
                    'title' => $options['siteTitleEn'] ?? '',
                    'description' => $options['siteDescriptionEn'] ?? '',
                    'separator' => $options['separator'],
                    'canonical' => URL::current(),
                ]);

                config()->set('seotools.opengraph.defaults', [
                    'title' => $options['siteTitleEn'] ?? '',
                    'description' => $options['siteDescriptionEn'] ?? '',
                    'canonical' => URL::current(),
                ]);

                config()->set('seotools.json-ld.defaults', [
                    'title' => $options['siteTitleEn'] ?? '',
                    'description' => $options['siteDescriptionEn'] ?? '',
                    'canonical' => URL::current(),
                ]);
            } else {
                config()->set('seotools.meta.defaults', [
                    'title' => $options['siteTitle'] ?? '',
                    'description' => $options['siteDescription'] ?? '',
                    'separator' => $options['separator'],
                    'canonical' => URL::current(),
                ]);

                config()->set('seotools.opengraph.defaults', [
                    'title' => $options['siteTitle'] ?? '',
                    'description' => $options['siteDescription'] ?? '',
                    'canonical' => URL::current(),
                ]);

                config()->set('seotools.json-ld.defaults', [
                    'title' => $options['siteTitle'] ?? '',
                    'description' => $options['siteDescription'] ?? '',
                    'canonical' => URL::current(),
                ]);
            }

//        config()->set('seotools.meta.defaults', [
//            'title' => $options['siteTitle'] ?? '',
//            'description' => $options['siteDescription'] ?? '',
//            'separator' => $options['separator'],
//            'canonical' => URL::current(),
//        ]);
//
//        config()->set('seotools.opengraph.defaults', [
//            'title' => $options['siteTitle'] ?? '',
//            'description' => $options['siteDescription'] ?? '',
//            'canonical' => URL::current(),
//        ]);
//
//        config()->set('seotools.json-ld.defaults', [
//            'title' => $options['siteTitle'] ?? '',
//            'description' => $options['siteDescription'] ?? '',
//            'canonical' => URL::current(),
//        ]);


            config()->set('options', $options);

        } catch (\Exception $exception) {

        }

        $message = '';
        $currentTime = jdate()->getHour();
        match (true) {
            $currentTime >= 5 && $currentTime < 12 => $message = 'صبح بخیر',
            $currentTime >= 12 && $currentTime < 15 => $message = 'ظهر بخیر',
            $currentTime >= 15 && $currentTime < 19 => $message = 'عصر بخیر',
            $currentTime >= 19 => $message = 'شب بخیر',
            default => $message = 'خوش آمدید'
        };

        View::share('message', $message);
    }
}
