<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use SocialiteProviders\Manager\SocialiteWasCalled;
use SocialiteProviders\Microsoft\MicrosoftExtendSocialite;

class MicrosoftSocialiteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->app['events']->listen(
            SocialiteWasCalled::class,
            [MicrosoftExtendSocialite::class, 'handle']
        );
    }
}
