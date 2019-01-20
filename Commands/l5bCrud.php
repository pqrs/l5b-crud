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
    * Execute the console command.
    *
    * @return mixed
    */
    public function handle()
    {
        $name = strtolower(str_singular($this->argument('name')));

        // Create Model "ExampleModel.php"
        Artisan::call(
            'l5b:stub',
            [
                'name'              => ucfirst($name),                  // Example
                'stub'              => '/Console/Commands/Stubs/make-model.stub',
                'namespace'         => '\Models',
                'attribute'         => ucfirst($name) . "Attribute",    // ExampleAttribute
                'model'             => ucfirst($name),                  // Example
                ]);

        // Create Attribute Trait "ExampleAttribute.php"
        Artisan::call(
            'l5b:stub',
            [
                'name'              => ucfirst($name) . "Attribute",    // ExampleAttribute
                'stub'              => '/Console/Commands/Stubs/make-attribute.stub',
                'namespace'         => '\Models\Traits\Attribute',
                'attribute'         => ucfirst($name) . "Attribute",    // ExampleAttribute
                'route'             => str_plural($name),               // examples
                'label'             => str_plural($name),               // examples
                ]);

        // Create Controller "ExampleController.php"
        Artisan::call(
            'l5b:stub',
            [
                'name'                  => ucfirst($name) . "Controller",
                'stub'                  => '/Console/Commands/Stubs/make-controller.stub',
                'namespace'             => '\Http\Controllers\Backend',
                'array'                 => str_plural($name),
                'controller'            => ucfirst($name) . "Controller",
                'label'                 => str_plural($name),
                'model'                 => ucfirst($name),
                'repository'            => ucfirst($name) . "Repository",
                'repositoryVariable'    => $name . "Repository",
                'request'               => ucfirst($name) . "Request",
                'route'                 => str_plural($name),
                'variable'              => $name,
                'view'                  => $name,
                ]);

        // Create Repository "ExampleRepository.php"
        Artisan::call(
            'l5b:stub',
            [
                'name'                  => ucfirst($name) . "Repository",
                'stub'                  => '/Console/Commands/Stubs/make-repository.stub',
                'namespace'             => '\Repositories\Backend',
                'model'                 => ucfirst($name),
                'repository'            => ucfirst($name) . "Repository",
                'variable'              => $name,
                'label'                 => str_plural($name),
                ]);

        // Create Validation Request "ManageExampleController.php"
        Artisan::call(
            'l5b:stub',
            [
                'name'      => "Manage" . ucfirst($name) . "Request",
                'stub'      => '/Console/Commands/Stubs/make-manage-request.stub',
                'namespace' => '\Http\Requests\Backend',
                'model'     => ucfirst($name),
                ]);

        // Create Validation Request "StoreExampleController.php"
        Artisan::call(
            'l5b:stub',
            [
                'name'      => "Store" . ucfirst($name) . "Request",
                'stub'      => '/Console/Commands/Stubs/make-store-request.stub',
                'namespace' => '\Http\Requests\Backend',
                'model'     => ucfirst($name),
                ]);

        // Create Validation Request "UpdateExampleController.php"
        Artisan::call(
            'l5b:stub',
            [
                'name'      => "Update" . ucfirst($name) . "Request",
                'stub'      => '/Console/Commands/Stubs/make-update-request.stub',
                'namespace' => '\Http\Requests\Backend',
                'model'     => ucfirst($name),
                ]);

        // Create Migration "YYYY_MM_DD_HHMMSS_create_examples_table.php"
        Artisan::call(
            'l5b:stub',
            [
                'name'      => date('Y_m_d_His_') . "create_" . str_plural($name)."_table",
                'stub'      => '/Console/Commands/Stubs/make-migration.stub',
                'namespace' => '\..\database\migrations',
                'class'     => "Create" . ucfirst(str_plural($name)) . "Table",
                'table'     => str_plural($name),
                ]);

        // Migrate table
        // Artisan::call('migrate');

        // Create Routes "examples.php"
        Artisan::call(
            'l5b:stub',
            [
                'name'          => str_plural($name),
                'stub'          => '/Console/Commands/Stubs/make-routes.stub',
                'namespace'     => '\..\routes\backend',
                'controller'    => ucfirst($name) . "Controller",
                'model'         => ucfirst($name),
                'route'         => str_plural($name),
                'variable'      => $name,
                ]);

        // Create Breadcrumbs "examples.php"
        Artisan::call(
            'l5b:stub',
            [
                'name'          => $name,
                'stub'          => '/Console/Commands/Stubs/make-breadcrumbs.stub',
                'namespace'     => '\..\routes\breadcrumbs\backend',
                'route'         => str_plural($name),
                ]);

        // Include breadcrumb file in backend.php
        $require_breadcrumb = "require __DIR__.'/$name.php';";
        $backend_path = base_path('routes/breadcrumbs/backend/backend.php');

        $breadcrumbs = file_get_contents($backend_path);
        $breadcrumbs = explode("\n", $breadcrumbs);

        if(!in_array($require_breadcrumb, $breadcrumbs)){
            $myfile = file_put_contents($backend_path, PHP_EOL . $require_breadcrumb, FILE_APPEND | LOCK_EX);
        }

        // Create View "example/index.blade.php"
        Artisan::call(
            'l5b:stub',
            [
                'name'      => 'index.blade',
                'stub'      => '/Console/Commands/Stubs/make-views-index.stub',
                'namespace' => '\..\resources\views\backend' . '\\' . $name,
                'label'     => str_plural($name),
                'array'     => str_plural($name),
                'route'     => str_plural($name),
                'variable'  => $name,
                'view'      => $name,
                ]);

        // Create View "example/create.blade.php"
        Artisan::call(
            'l5b:stub',
            [
                'name'      => 'create.blade',
                'stub'      => '/Console/Commands/Stubs/make-views-create.stub',
                'namespace' => '\..\resources\views\backend' . '\\' . $name,
                'label'     => str_plural($name),
                'array'     => str_plural($name),
                'route'     => str_plural($name),
                'variable'  => $name,
                'view'      => $name,
                ]);

        // Create View "example/edit.blade.php"
        Artisan::call(
            'l5b:stub',
            [
                'name'      => 'edit.blade',
                'stub'      => '/Console/Commands/Stubs/make-views-edit.stub',
                'namespace' => '\..\resources\views\backend' . '\\' . $name,
                'label'     => str_plural($name),
                'array'     => str_plural($name),
                'route'     => str_plural($name),
                'variable'  => $name,
                'view'      => $name,
                ]);

        // Create View "example/show.blade.php"
        Artisan::call(
            'l5b:stub',
            [
                'name'      => 'show.blade',
                'stub'      => '/Console/Commands/Stubs/make-views-show.stub',
                'namespace' => '\..\resources\views\backend' . '\\' . $name,
                'label'     => str_plural($name),
                'array'     => str_plural($name),
                'route'     => str_plural($name),
                'variable'  => $name,
                'view'      => $name,
                ]);

        // Create View "example/deleted.blade.php"
        Artisan::call(
            'l5b:stub',
            [
                'name'      => 'deleted.blade',
                'stub'      => '/Console/Commands/Stubs/make-views-deleted.stub',
                'namespace' => '\..\resources\views\backend' . '\\' . $name,
                'label'     => str_plural($name),
                'array'     => str_plural($name),
                'route'     => str_plural($name),
                'variable'  => $name,
                'view'      => $name,
                ]);

        // Create View "example/includes/breadcrumb-links.blade.php"
        Artisan::call(
            'l5b:stub',
            [
                'name'      => '/includes/breadcrumb-links.blade',
                'stub'      => '/Console/Commands/Stubs/make-views-breadcrumb-links.stub',
                'namespace' => '\..\resources\views\backend' . '\\' . $name,
                'label'     => str_plural($name),
                'array'     => str_plural($name),
                'route'     => str_plural($name),
                'variable'  => $name,
                'view'      => $name,
                ]);

        // Create View "example/includes/header-buttons.blade.php"
        Artisan::call(
            'l5b:stub',
            [
                'name'      => '/includes/header-buttons.blade',
                'stub'      => '/Console/Commands/Stubs/make-views-header-buttons.stub',
                'namespace' => '\..\resources\views\backend' . '\\' . $name,
                'label'     => str_plural($name),
                'array'     => str_plural($name),
                'route'     => str_plural($name),
                'variable'  => $name,
                'view'      => $name,
                ]);
    }
}
