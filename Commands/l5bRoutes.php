<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class L5bRoutes extends GeneratorCommand
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $name = 'l5b:routes';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create routes';

	/**
	 * The type of class being generated.
	 *
	 * @var string
	 */
	protected $type = 'Route';

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        // $stub = parent::replaceClass($stub, $name);
        return str_replace(
			[ 'DummyController', 'DummyRoute' ],
			[ $this->argument('controller'), $this->argument('route') ],
			$stub);
	}

	/**
	 * Get the stub file for the generator.
	 *
	 * @return string
	 */
	protected function getStub()
	{
		return app_path() . '/Console/Commands/Stubs/make-routes.stub';
	}

	/**
	 * Get the default namespace for the class.
	 *
	 * @param  string  $rootNamespace
	 * @return string
	 */
	protected function getDefaultNamespace($rootNamespace)
	{
		return $rootNamespace . '\..\routes\backend';
	}

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'File name'],
            ['controller', InputArgument::REQUIRED, 'Controller name'],
            ['route', InputArgument::REQUIRED, 'Route name'],
        ];
    }
}