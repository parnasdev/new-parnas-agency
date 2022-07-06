<?php

namespace Packages\multilang\src;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

trait WithMultiLang
{

    public function getSessionLang()
    {
        if (session()->has('lang') && $this->lang == session('lang')) {
            $this->lang = session('lang');
            App::setLocale($this->lang);
            if ($this->lang == 'en') {
                config()->set('seotools.meta.defaults', [
                    'title' => config('options.siteTitleEn') ?? '',
                    'description' => config('options.siteDescriptionEn') ?? '',
                    'separator' => config('options.separator'),
                    'canonical' => URL::current(),
                ]);

                config()->set('seotools.opengraph.defaults', [
                    'title' => config('options.siteTitleEn') ?? '',
                    'description' => config('options.siteDescriptionEn') ?? '',
                    'canonical' => URL::current(),
                ]);

                config()->set('seotools.json-ld.defaults', [
                    'title' => config('options.siteTitleEn') ?? '',
                    'description' => config('options.siteDescriptionEn') ?? '',
                    'canonical' => URL::current(),
                ]);
            } else {
                config()->set('seotools.meta.defaults', [
                    'title' => config('options.siteTitle') ?? '',
                    'description' => config('options.siteDescription') ?? '',
                    'separator' => config('options.separator'),
                    'canonical' => URL::current(),
                ]);

                config()->set('seotools.opengraph.defaults', [
                    'title' => config('options.siteTitle') ?? '',
                    'description' => config('options.siteDescription') ?? '',
                    'canonical' => URL::current(),
                ]);

                config()->set('seotools.json-ld.defaults', [
                    'title' => config('options.siteTitle') ?? '',
                    'description' => config('options.siteDescription') ?? '',
                    'canonical' => URL::current(),
                ]);
            }
        }
    }

}
