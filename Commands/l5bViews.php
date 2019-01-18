<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class L5bViews extends GeneratorCommand
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $name = 'l5b:views';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create crud views';

	/**
	 * The type of class being generated.
	 *
	 * @var string
	 */
	protected $type = 'View';

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
			[ 'DummyLabel', 'DummyRoute', 'DummyArray', 'DummyVariable', 'DummyView' ],
			[ $this->argument('label'), $this->argument('route'), $this->argument('array'), $this->argument('variable'), $this->argument('view') ],
			$stub );	}

	/**
	 * Get the stub file for the generator.
	 *
	 * @return string
	 */
	protected function getStub()
	{
        // return app_path() . '/Console/Commands/Stubs/make-views.stub';
        return app_path() . $this->argument('stub');
	}

	/**
	 * Get the default namespace for the class.
	 *
	 * @param  string  $rootNamespace
	 * @return string
	 */
	protected function getDefaultNamespace($rootNamespace)
	{
        return $rootNamespace . '\..\resources\views\backend' . '\\' . $this->argument('view');
	}

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'View name'],
            ['stub', InputArgument::REQUIRED, 'Stub name'],
            ['label', InputArgument::REQUIRED, 'Label name'],
			['route', InputArgument::REQUIRED, 'Route name'],
			['array', InputArgument::REQUIRED, 'Array name'],
			['variable', InputArgument::REQUIRED, 'Variable name'],
			['view', InputArgument::REQUIRED, 'View name'],
        ];
    }
}