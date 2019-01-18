<?php
namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class L5bMigration extends GeneratorCommand
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $name = 'l5b:migration';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Create a new migration';

	/**
	 * The type of class being generated.
	 *
	 * @var string
	 */
	protected $type = 'Migration';

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
			[ 'DummyClass', 'DummyTable' ],
			[ $this->argument('class'), $this->argument('table') ],
			$stub);
	}

	/**
	 * Get the stub file for the generator.
	 *
	 * @return string
	 */
	protected function getStub()
	{
		return app_path() . '/Console/Commands/Stubs/make-migration.stub';
	}

	/**
	 * Get the default namespace for the class.
	 *
	 * @param  string  $rootNamespace
	 * @return string
	 */
	protected function getDefaultNamespace($rootNamespace)
	{
		return $rootNamespace . '\..\database\migrations';
	}

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The migration file name.'],
            ['class', InputArgument::REQUIRED, 'Migration class name.'],
            ['table', InputArgument::REQUIRED, 'Migration table name.'],
        ];
    }
}