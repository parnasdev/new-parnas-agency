<?php


namespace Packages\academy\src\Provider;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Packages\academy\src\Events\AddLearning;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        AddLearning::class => []
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
