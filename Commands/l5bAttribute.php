<?php
namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class L5bAttribute extends GeneratorCommand
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $name = 'l5b:attribute';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new attribute Trait';

	/**
	 * The type of class being generated.
	 *
	 * @var string
	 */
	protected $type = 'Attribute';

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
			[ 'DummyAttribute', 'DummyRoute', 'DummyLabel' ],
			[ $this->argument('attribute'), $this->argument('route'), $this->argument('label') ],
			$stub );
	}

	/**
	 * Get the stub file for the generator.
	 *
	 * @return string
	 */
	protected function getStub()
	{
		return app_path() . '/Console/Commands/Stubs/make-attribute.stub';
	}

	/**
	 * Get the default namespace for the class.
	 *
	 * @param  string  $rootNamespace
	 * @return string
	 */
	protected function getDefaultNamespace($rootNamespace)
	{
		return $rootNamespace . '\Models\Traits\Attribute';
	}

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'Output file name'],
            ['attribute', InputArgument::REQUIRED, 'Attribute name'],
            ['route', InputArgument::REQUIRED, 'Route name'],
            ['label', InputArgument::REQUIRED, 'Label name'],
        ];
    }
}