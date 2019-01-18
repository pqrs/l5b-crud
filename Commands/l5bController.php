<?php
namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class L5bController extends GeneratorCommand
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $name = 'l5b:controller';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new controller';

	/**
	 * The type of class being generated.
	 *
	 * @var string
	 */
	protected $type = 'Controller';

    /**
     * Replace the class name for the given stub.
     *
     * @param  string  $stub
     * @param  string  $name
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        return str_replace(
			[ 'DummyName', 'DummyModel', 'DummyController', 'DummyRequest', 'DummyRoute', 'DummyView', 'DummyArray', 'DummyVariable', 'DummyLabel' ],
			[ $this->argument('name'), $this->argument('model'), $this->argument('controller'), $this->argument('request'), $this->argument('route'), $this->argument('view'), $this->argument('array'), $this->argument('variable'), $this->argument('label') ],
			$stub );
	}

	/**
	 * Get the stub file for the generator.
	 *
	 * @return string
	 */
	protected function getStub()
	{
		return app_path() . '/Console/Commands/Stubs/make-controller.stub';
	}

	/**
	 * Get the default namespace for the class.
	 *
	 * @param  string  $rootNamespace
	 * @return string
	 */
	protected function getDefaultNamespace($rootNamespace)
	{
		return $rootNamespace . '\Http\Controllers\Backend';
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
			['array', InputArgument::REQUIRED, 'Array name'],
			['controller', InputArgument::REQUIRED, 'Controller name'],
            ['label', InputArgument::REQUIRED, 'Label name'],
            ['model', InputArgument::REQUIRED, 'Model name'],
			['request', InputArgument::REQUIRED, 'Request name'],
			['route', InputArgument::REQUIRED, 'Route name'],
			['variable', InputArgument::REQUIRED, 'Variable name'],
			['view', InputArgument::REQUIRED, 'View name'],
        ];
    }
}