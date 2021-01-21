<?php

namespace Websmurf\LaravelExactOnline\Http\Controllers;

use Illuminate\Routing\Controller;
use Websmurf\LaravelExactOnline\LaravelExactOnline;

class LaravelExactOnlineController extends Controller
{
    /**
     * Connect Exact app
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function appConnect()
    {
        return view('laravelexactonline::connect');
    }

    /**
     * Authorize to Exact
     * Sends an oAuth request to the Exact App to get tokens
     */
    public function appAuthorize()
    {
        $connection = app()->make('Exact\Connection');
        $connection->redirectForAuthorization();
    }

    /**
     * Exact Callback
     * Saves the authorisation and refresh tokens
     */
    public function appCallback()
    {
        $config = LaravelExactOnline::loadConfig();
        $config->exact_authorisationCode = request()->get('code');

        // Store first to avoid another redirect to exact online
        LaravelExactOnline::storeConfig($config);

        $connection = app()->make('Exact\Connection');

        $config->exact_accessToken = serialize($connection->getAccessToken());
        $config->exact_refreshToken = $connection->getRefreshToken();
        $config->exact_tokenExpires = $connection->getTokenExpires() - 60;

        LaravelExactOnline::storeConfig($config);

        return view('laravelexactonline::connected', ['connection' => $connection]);
    }
}
