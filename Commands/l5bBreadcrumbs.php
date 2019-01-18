<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class L5bBreadcrumbs extends GeneratorCommand
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $name = 'l5b:breadcrumbs';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create breadcrumbs';

	/**
	 * The type of class being generated.
	 *
	 * @var string
	 */
	protected $type = 'Breadcrumb';

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        return str_replace( "DummyRoute", $this->argument('route'), $stub);
	}

	/**
	 * Get the stub file for the generator.
	 *
	 * @return string
	 */
	protected function getStub()
	{
		return app_path() . '/Console/Commands/Stubs/make-breadcrumbs.stub';
	}

	/**
	 * Get the default namespace for the class.
	 *
	 * @param  string  $rootNamespace
	 * @return string
	 */
	protected function getDefaultNamespace($rootNamespace)
	{
		return $rootNamespace . '\..\routes\breadcrumbs\backend';
	}

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'File name.'],
            ['route', InputArgument::REQUIRED, 'Routes name'],
        ];
    }
}