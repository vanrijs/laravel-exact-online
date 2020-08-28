<?php

namespace Websmurf\LaravelExactOnline;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Picqer\Financials\Exact\Connection;
use RuntimeException;

class LaravelExactOnline
{
    private $connection;

    /**
     * LaravelExactOnline constructor.
     */
    public function __construct()
    {
        $this->connection = app()->make('Exact\Connection');
    }

    /**
     * Magically calls methods from Picqer Exact Online API
     *
     * @param string $method Name of the method that's called.
     * @param array $arguments Arguments passed to it.
     * 
     * @return mixed
     * 
     * @throws RuntimeException Throws a RuntimeException when the provided method does not exist.
     */
    public function __call($method, $arguments)
    {
        if(strpos($method, "connection") === 0) {
            $method = lcfirst(substr($method, 10));

            call_user_func([$this->connection, $method], implode(",", $arguments));

            return $this;

        }

        $classname = "\\Picqer\\Financials\\Exact\\" . $method;

        if(class_exists($classname) === false) {
            throw new RuntimeException("Invalid type called");
        }

        return new $classname($this->connection);
    }

    /**
     * Function to handle the token update call from picqer.
     *
     * @param Connection $connection Connection instance.
     */
    public static function tokenUpdateCallback (Connection $connection) {
        $config = self::loadConfig();

        $config->exact_accessToken = serialize($connection->getAccessToken());
        $config->exact_refreshToken = $connection->getRefreshToken();
        $config->exact_tokenExpires = $connection->getTokenExpires();

        self::storeConfig($config);
    }

    /**
     * Load existing configuration.
     *
     * @return Authenticatable|object
     */
    public static function loadConfig()
    {
        if(config('laravel-exact-online.exact_multi_user')) {
            return Auth::user();
        }

        $config = '{}';

        if (Storage::exists('exact.api.json')) {
            $config = Storage::get(
                'exact.api.json'
            );
        }

        return (object) json_decode($config, false);
    }

    /**
     * Store configuration changes.
     *
     * @param Authenticatable|object $config
     */
    public static function storeConfig($config)
    {
        if(config('laravel-exact-online.exact_multi_user')) {
            $config->save();
            return;
        }

        Storage::put('exact.api.json', json_encode($config));
    }
}
