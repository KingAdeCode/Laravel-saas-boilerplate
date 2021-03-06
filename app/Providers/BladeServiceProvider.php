<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('subscribed', function () {
            return "<?php if(auth()->user()->hasSubscription()): ?>";
        });

        Blade::directive('endsubscribed', function () {
            return "<?php endif; ?>";
        });

        Blade::directive('notsubscribed', function () {
            return "<?php if(!auth()->check() || auth()->user()->doesNotHaveSubscription()): ?>";
        });

        Blade::directive('endnotsubscribed', function () {
            return "<?php endif; ?>";
        });

        Blade::directive('subscriptionnotcancelled', function () {
            return "<?php if(auth()->user()->hasNotCancelled()): ?>";
        });

        Blade::directive('endsubscriptionnotcancelled', function () {
            return "<?php endif; ?>";
        });

        Blade::directive('subscriptioncancelled', function () {
            return "<?php if(auth()->user()->hasCancelled()): ?>";
        });

        Blade::directive('endsubscriptioncancelled', function () {
            return "<?php endif; ?>";
        });

        Blade::directive('teamsubscription', function () {
            return "<?php if(auth()->user()->hasTeamSubscription()): ?>";
        });

        Blade::directive('endteamsubscription', function () {
            return "<?php endif; ?>";
        });

        Blade::directive('notpiggybacksubscription', function () {
            return "<?php if(!auth()->user()->hasPiggybacksubscription()): ?>";
        });

        Blade::directive('endnotpiggybacksubscription', function () {
            return "<?php endif; ?>";
        });

        Blade::directive('role', function ($role) {
            return "<?php if(auth()->user()->hasRole($role)): ?>";
        });

        Blade::directive('endrole', function ($role) {
            return "<?php endif; ?>";
        });

        Blade::directive('impersonating', function () {
            return "<?php if(session()->has('impersonate')): ?>";
        });

        Blade::directive('endimpersonating', function () {
            return "<?php endif; ?>";
        });
    }
}
