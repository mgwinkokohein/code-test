<?php

use Carbon\Carbon;

if (! function_exists('appName')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function appName()
    {
        return config('app.name', 'PADESAR');
    }
}

if (! function_exists('carbon')) {
    /**
     * Create a new Carbon instance from a time.
     *
     * @param $time
     * @return Carbon
     *
     * @throws Exception
     */
    function carbon($time)
    {
        return new Carbon($time);
    }
}

if (! function_exists('homeRoute')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function homeRoute()
    {
        // $agent = new Agent();
        if (auth()->check()) {

            if (auth()->user()->isMasterAdmin()) {
                return 'admin.dashboard';
            }

            if (auth()->user()->isUser()) {
                return 'frontend.user.dashboard';   
            }
        }

        return 'frontend.index';
    }
}
