<?php

namespace NotificationChannels\Pushinator;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Pushinator\PushinatorClient;


class PushinatorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->app->when(PushinatorChannel::class)
            ->needs(PushinatorClient::class)
            ->give(function () {

                return new PushinatorClient(
                    'some-api-key'
                );
            });

    }

}
