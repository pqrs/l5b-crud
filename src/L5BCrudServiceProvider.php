<?php

namespace pqrs\L5BCrud;

use Illuminate\Support\ServiceProvider;

class L5BCrudServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
		$this->commands('pqrs\L5BCrud\Console\Commands\L5BCrud');
		$this->commands('pqrs\L5BCrud\Console\Commands\L5BStub');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
