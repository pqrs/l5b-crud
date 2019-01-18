<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Symfony\Component\Console\Input\InputArgument;

class L5bStub extends GeneratorCommand
{
	/**
	* The name and signature of the console command.
	*
	* @var string
	*/
	protected $name = 'l5b:stub';

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
	// protected $type = 'View';

	/**
	* Replace the class name for the given stub.
	*
	* @param  string  $stub
	* @param  string  $name
	* @return string
	*/
	protected function replaceClass($stub, $name)
	{
		$search = [
			'DummyArray',
			'DummyAttribute',
			'DummyClass',
			'DummyController',
			'DummyLabel',
			'DummyMigration',
			'DummyMigrationClass',
			'DummyMigrationTable',
			'DummyModel',
			'DummyRequest',
			'DummyRoute',
			'DummyTable',
			'DummyVariable',
			'DummyView',
		];

		$replace = [
			$this->argument('array'),
			$this->argument('attribute'),
			$this->argument('class'),
			$this->argument('controller'),
			$this->argument('label'),
			$this->argument('migration'),
			$this->argument('migrationClass'),
			$this->argument('migrationTable'),
			$this->argument('model'),
			$this->argument('request'),
			$this->argument('route'),
			$this->argument('table'),
			$this->argument('variable'),
			$this->argument('view'),
		];

		return str_replace( $search, $replace, $stub );
	}

	/**
	* Get the stub file for the generator.
	*
	* @return string
	*/
	protected function getStub()
	{
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
		return $rootNamespace . $this->argument('namespace');
	}

	/**
	* Get the console command arguments.
	*
	* @return array
	*/
	protected function getArguments()
	{
		return [
			['name', 			InputArgument::REQUIRED, 'File name'],
			['stub', 			InputArgument::REQUIRED, 'Stub name'],
			['namespace', 		InputArgument::REQUIRED, 'Namespace'],
			['array',			InputArgument::OPTIONAL, '', null],
			['attribute',		InputArgument::OPTIONAL, '', null],
			['class',			InputArgument::OPTIONAL, '', null],
			['controller',		InputArgument::OPTIONAL, '', null],
			['label',			InputArgument::OPTIONAL, '', null],
			['migration',		InputArgument::OPTIONAL, '', null],
			['migrationClass',	InputArgument::OPTIONAL, '', null],
			['migrationTable',	InputArgument::OPTIONAL, '', null],
			['model',			InputArgument::OPTIONAL, '', null],
			['request',			InputArgument::OPTIONAL, '', null],
			['route',			InputArgument::OPTIONAL, '', null],
			['table',			InputArgument::OPTIONAL, '', null],
			['variable',		InputArgument::OPTIONAL, '', null],
			['view',			InputArgument::OPTIONAL, '', null],
		];
	}
}