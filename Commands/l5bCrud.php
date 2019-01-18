<?php

namespace App\Console\Commands;
use Symfony\Component\Console\Input\InputArgument;

use Artisan;
use Illuminate\Console\Command;

class L5bCrud extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'l5b:crud {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Full process';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
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
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = strtolower(str_singular($this->argument('name')));

        $arrayName      = str_plural($name);                // examples
        $attributeName  = ucfirst($name) . "Attribute";     // ExampleAttribute
        $controllerName = ucfirst($name) . "Controller";    // ExampleController
        $labelName      = str_plural($name);                // examples
        $migrationName  = date('Y_m_d_His_') . "create_" .
                          str_plural($name)."_table";       // YYYY_MM_DD_HHMMSS_create_examples_table
        $migrationClass = "Create" .
                          ucfirst(str_plural($name)) .
                          "Table";                          // CreateExamplesTable
        $migrationTable = str_plural($name);                // examples
        $modelName      = ucfirst($name);                   // Example
        $requestName    = ucfirst($name) . "Request";       // ExampleRequest
        $routeName      = str_plural($name);                // examples
        $variableName   = $name;                            // example
        $viewName       = $name;                            // example

        // Create Model "Name"
        $this->line('Model: \\Models\\' . ucfirst($name));
        Artisan::call(
            'l5b:model',
            [
                'name'      => ucfirst($name),
                'model'     => $modelName,
                'attribute' => $attributeName,
            ]);

        // Create Attribute "NameAttribute"
        $this->line('Attribute: \\Models\\Traits\\Attribute\\' . ucfirst($name) . 'Attribute');
        Artisan::call(
            'l5b:attribute',
            [
                'name'      => ucfirst($name) . "Attribute",
                'attribute' => $attributeName,
                'route'     => $routeName,
                'label'     => $labelName,
            ]);

        // Create Controller "NameController"
        $this->line('Controller: \\Controllers\\Backend\\' . ucfirst($name) . 'Controller');
        Artisan::call(
            'l5b:controller',
            [
                'name'          => ucfirst($name) . "Controller",
                'array'         => $arrayName,
                'controller'    => $controllerName,
                'label'         => $labelName,
                'model'         => $modelName,
                'request'       => $requestName,
                'route'         => $routeName,
                'variable'      => $variableName,
                'view'          => $viewName,
            ]);

        // Create Validation Requests "StoreNameController" and "UpdateNameController"
        $this->line('Request: \\Requests\\Backend\\Store' . ucfirst($name) . 'Request');
        Artisan::call(
            'l5b:requests',
            [
                'name'      => "Store" . ucfirst($name) . "Request",
                'stub'      => '/Console/Commands/Stubs/make-store-request.stub',
                'model'     => $modelName,
            ]);

        Artisan::call(
            'l5b:requests',
            [
                'name'      => "Update" . ucfirst($name) . "Request",
                'stub'      => '/Console/Commands/Stubs/make-update-request.stub',
                'model'     => $modelName,
            ]);

        // Create Migration
        $this->line('Migration: \\database\\migrations\\' . date('Y_m_d_His_')."create_".str_plural($name)."_table");
        Artisan::call(
            'l5b:migration',
            [
                'name'  => $migrationName,
                'class' => $migrationClass,
                'table' => $migrationTable,
            ]);
        Artisan::call('migrate');

        // Create Routes
        $this->line('Routes: \\routes\\backend\\' . str_plural($name) . ".php");
        Artisan::call(
            'l5b:routes',
            [
                'name'          => $routeName,
                'controller'    => $controllerName,
                'route'         => $routeName,
            ]);

        // Create Breadcrumbs
        $this->line('Breadcrumbs: \\routes\\breadcrumbs\\backend\\' . $name . ".php");
        Artisan::call(
            'l5b:breadcrumbs',
            [
                'name'  => $name,
                'route' => $routeName,
            ]);

        $require_breadcrumb = "require __DIR__.'/$name.php';";
        $myfile = file_put_contents(base_path('routes/breadcrumbs/backend/backend.php'), PHP_EOL . $require_breadcrumb, FILE_APPEND | LOCK_EX);

        // Create Views
        $this->line('View: \\resources\\views\\backend\\' . $name . '\\index.blade.php');
        Artisan::call(
            'l5b:views',
            [
                'name'      => 'index.blade',
                'stub'      => '/Console/Commands/Stubs/make-views-index.stub',
                'label'     => $labelName,
                'array'     => $arrayName,
                'route'     => $routeName,
                'variable'  => $variableName,
                'view'      => $viewName,
            ]);

        Artisan::call(
            'l5b:views',
            [
                'name'      => 'edit.blade',
                'stub'      => '/Console/Commands/Stubs/make-views-edit.stub',
                'label'     => $labelName,
                'array'     => $arrayName,
                'route'     => $routeName,
                'variable'  => $variableName,
                'view'      => $viewName,
            ]);

        Artisan::call(
            'l5b:views',
            [
                'name'      => 'create.blade',
                'stub'      => '/Console/Commands/Stubs/make-views-create.stub',
                'label'     => $labelName,
                'array'     => $arrayName,
                'route'     => $routeName,
                'variable'  => $variableName,
                'view'      => $viewName,
            ]);

        Artisan::call(
            'l5b:views',
            [
                'name'      => 'show.blade',
                'stub'      => '/Console/Commands/Stubs/make-views-show.stub',
                'label'     => $labelName,
                'array'     => $arrayName,
                'route'     => $routeName,
                'variable'  => $variableName,
                'view'      => $viewName,
            ]);

            Artisan::call(
                'l5b:views',
                [
                    'name'      => 'deleted.blade',
                    'stub'      => '/Console/Commands/Stubs/make-views-deleted.stub',
                    'label'     => $labelName,
                    'array'     => $arrayName,
                    'route'     => $routeName,
                    'variable'  => $variableName,
                    'view'      => $viewName,
                ]);

            Artisan::call(
                'l5b:views',
                [
                    'name'      => '/includes/breadcrumb-links.blade',
                    'stub'      => '/Console/Commands/Stubs/make-views-breadcrumb-links.stub',
                    'label'     => $labelName,
                    'array'     => $arrayName,
                    'route'     => $routeName,
                    'variable'  => $variableName,
                    'view'      => $viewName,
                ]);

            Artisan::call(
                'l5b:views',
                [
                    'name'      => '/includes/header-buttons.blade',
                    'stub'      => '/Console/Commands/Stubs/make-views-header-buttons.stub',
                    'label'     => $labelName,
                    'array'     => $arrayName,
                    'route'     => $routeName,
                    'variable'  => $variableName,
                    'view'      => $viewName,
                ]);
    }
}
