<?php
namespace Illuminate\Hashing;

use Illuminate\Support\ServiceProvider;

class HashServiceProvider extends ServiceProvider {
    protected $defer = true;

    public function register() {
        $this->app->singleton('hash', function () {
            return new BcryptHasher;
        });
    }
    public function provides() {
        return ['hash'];
    }
}