<?php

namespace pqrs\L5BCrud\Console\Commands;

use Symfony\Component\Console\Input\InputArgument;

use Artisan;
use Illuminate\Console\Command;

class L5BCrud extends Command
{
    /**
    * The name and signature of the console command.
    *
    * @var string
    */
    protected $signature = 'l5b:crud {name} {--m|migrate} {--f|field=title}';

    /**
    * The console command description.
    *
    * @var string
    */
    protected $description = 'Create a complete CRUD structure for Laravel 5 Boilerplate Backend';

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
        // Transform l5b:crud command parameter to singular lowercase
        $name = strtolower(snake_case(str_singular($this->argument('name'))));

        // Create Model "Name.php"
        $this->model( $name, ucfirst(camel_case($name)), 'make-model.stub' );

        // Create Attribute Trait "NameAttribute.php"
        $this->attribute( $name, ucfirst(camel_case($name)) . "Attribute", 'make-attribute.stub' );

        // Create Controller "NameController.php"
        $this->controller( $name, ucfirst(camel_case($name)) . "Controller", 'make-controller.stub' );

        // Create Repository "NameRepository.php"
        $this->repository( $name, ucfirst(camel_case($name)) . "Repository", 'make-repository.stub' );

        // Create Validation Request "ManageNameRequest.php"
        // Create Validation Request "StoreNameRequest.php"
        // Create Validation Request "UpdateNameRequest.php"
        $this->request( $name, "Manage" . ucfirst(camel_case($name)) . "Request", 'make-manage-request.stub' );
        $this->request( $name, "Store"  . ucfirst(camel_case($name)) . "Request", 'make-store-request.stub' );
        $this->request( $name, "Update" . ucfirst(camel_case($name)) . "Request", 'make-update-request.stub' );

        // Create Event "Events/Backend/Example/ExampleCreated.php"
        // Create Event "Events/Backend/Example/ExampleUpdated.php"
        // Create Event "Events/Backend/Example/ExampleDeleted.php"
        $this->event( $name, ucfirst(camel_case($name)) . "Created", 'make-event-created.stub' );
        $this->event( $name, ucfirst(camel_case($name)) . "Updated", 'make-event-updated.stub' );
        $this->event( $name, ucfirst(camel_case($name)) . "Deleted", 'make-event-deleted.stub' );

        // Create Listener "Listeners/Backend/Example/ExampleEventListener.php"
        $this->listener( $name, ucfirst(camel_case($name)) . "EventListener", 'make-listener.stub' );

        // Create Migraton "YYYY_MM_DD_HHMMSS_create_names_table.php"
        $this->migration( $name, date('Y_m_d_His_') . "create_" . str_plural($name)."_table", 'make-migration.stub' );

        // Create Routes "names.php"
        $this->routes( $name, str_plural($name), 'make-routes.stub' );

        // Create Breadcrumbs "names.php"
        $this->breadcrumbs( $name, $name, 'make-breadcrumbs.stub' );

        // Create View "name/index.blade.php"
        // Create View "example/create.blade.php"
        // Create View "example/edit.blade.php"
        // Create View "example/show.blade.php"
        // Create View "example/deleted.blade.php"
        // Create View "example/includes/breadcrumb-links.blade.php"
        // Create View "example/includes/header-buttons.blade.php"
        // Create View "example/includes/sidebar-examples.blade.php"
        $this->view( $name, 'index', 'make-views-index.stub' );
        $this->view( $name, 'create', 'make-views-create.stub' );
        $this->view( $name, 'edit', 'make-views-edit.stub' );
        $this->view( $name, 'show', 'make-views-show.stub' );
        $this->view( $name, 'deleted', 'make-views-deleted.stub' );
        $this->view( $name, '/includes/breadcrumb-links', 'make-views-breadcrumb-links.stub' );
        $this->view( $name, '/includes/header-buttons', 'make-views-header-buttons.stub' );
        $this->view( $name, '/includes/sidebar-'. str_plural($name), 'make-views-sidebar.stub' );
    }

    protected function model($key, $name, $stub)
    {
        $stubParams = [
            'name'              => $name,
            'stub'              => __DIR__ . '/Stubs/' . $stub,
            'namespace'         => '\Models',
            'attribute'         => ucfirst(camel_case($key)) . "Attribute",
            'field'             => $this->option('field'),
            'model'             => ucfirst(camel_case($key)),
        ];

        Artisan::call('l5b:stub', $stubParams);
        $this->line('Model ' . $stubParams['name'] . Artisan::output());
    }

    protected function event($key, $name, $stub)
    {
        $stubParams = [
            'name'              => $name,
            'stub'              => __DIR__ . '/Stubs/' . $stub,
            'namespace'         => '\Events\Backend\\' . ucfirst(camel_case($key)),
            'event'             => ucfirst(camel_case($key)),
            'model'             => ucfirst(camel_case($key)),
        ];

        Artisan::call('l5b:stub', $stubParams);
        $this->line('Event ' . $stubParams['name'] . Artisan::output());
    }

    protected function listener($key, $name, $stub)
    {
        $stubParams = [
            'name'              => $name,
            'stub'              => __DIR__ . '/Stubs/' . $stub,
            'namespace'         => '\Listeners\Backend\\' . ucfirst(camel_case($key)),
            'event'             => ucfirst(camel_case($key)),
            'field'             => $this->option('field'),
            'model'             => ucfirst(camel_case($key)),
            'table'             => $key,
        ];

        Artisan::call('l5b:stub', $stubParams);
        $this->line('Listener ' . $stubParams['name'] . Artisan::output());
    }

    protected function attribute($key, $name, $stub)
    {
        $stubParams = [
            'name'              => $name,
            'stub'              => __DIR__ . '/Stubs/' . $stub,
            'namespace'         => '\Models\Traits\Attribute',
            'attribute'         => ucfirst(camel_case($key)) . "Attribute",
            'route'             => str_plural($key),
            'label'             => str_plural($key),
        ];

        Artisan::call('l5b:stub', $stubParams);
        $this->line('Attribute ' . $stubParams['name'] . Artisan::output());
    }

    protected function controller($key, $name, $stub)
    {
        $stubParams = [
            'name'                  => $name,
            'stub'                  => __DIR__ . '/Stubs/' . $stub,
            'namespace'             => '\Http\Controllers\Backend',
            'array'                 => camel_case(str_plural($key)),
            'controller'            => ucfirst(camel_case($key)) . "Controller",
            'field'                 => $this->option('field'),
            'label'                 => str_plural($key),
            'model'                 => ucfirst(camel_case($key)),
            'repository'            => ucfirst(camel_case($key)) . "Repository",
            'repositoryVariable'    => $key . "Repository",
            'request'               => ucfirst(camel_case($key)) . "Request",
            'route'                 => str_plural($key),
            'variable'              => camel_case($key),
            'view'                  => $key,
        ];

        Artisan::call('l5b:stub', $stubParams);
        $this->line('Controller ' . $stubParams['name'] . Artisan::output());
    }

    protected function repository($key, $name, $stub)
    {
        $stubParams = [
            'name'                  => $name,
            'stub'                  => __DIR__ . '/Stubs/' . $stub,
            'field'                 => $this->option('field'),
            'namespace'             => '\Repositories\Backend',
            'model'                 => ucfirst(camel_case($key)),
            'repository'            => ucfirst(camel_case($key)) . "Repository",
            'variable'              => $key,
            'label'                 => str_plural($key),
        ];

        Artisan::call('l5b:stub', $stubParams);
        $this->line('Repository ' . $stubParams['name'] . Artisan::output());
    }

    protected function request($key, $name, $stub)
    {
        $stubParams = [
            'name'                  => $name,
            'stub'                  => __DIR__ . '/Stubs/' . $stub,
            'field'                 => $this->option('field'),
            'namespace'             => '\Http\Requests\Backend',
            'model'                 => ucfirst(camel_case($key)),
        ];

        Artisan::call('l5b:stub', $stubParams);
        $this->line('Request ' . $stubParams['name'] . Artisan::output());
    }

    protected function migration($key, $name, $stub)
    {
        $stubParams = [
            'name'                  => $name,
            'stub'                  => __DIR__ . '/Stubs/' . $stub,
            'field'                 => $this->option('field'),
            'namespace'             => '\..\database\migrations',
            'class'                 => "Create" . ucfirst(str_plural(camel_case($key))) . "Table",
            'table'                 => str_plural($key),
        ];

        // If no migration with name "*create_names_table.php" exists then create it
        if (!glob(database_path() . "/migrations/*create_" . str_plural($key) . "_table.php")) {
            Artisan::call('l5b:stub', $stubParams);
            $this->line('Migration ' . $stubParams['name'] . Artisan::output());
        } else {
            $this->line('A migration file for the table ' . str_plural($key) . " already exists!\n");
        }

        // If option -m|--migrate is true then migrate the table
        if ($this->option('migrate')) {
            Artisan::call('migrate');
            $this->line('Migrating table ' . $stubParams['name'] . "\n");
        }
    }

    protected function routes($key, $name, $stub)
    {
        $stubParams = [
            'name'                  => $name,
            'stub'                  => __DIR__ . '/Stubs/' . $stub,
            'namespace'             => '\..\routes\backend',
            'controller'            => ucfirst(camel_case($key)) . "Controller",
            'model'                 => ucfirst(camel_case($key)),
            'route'                 => str_plural($key),
            'variable'              => $key,
        ];

        Artisan::call('l5b:stub', $stubParams);
        $this->line('Routes ' . $stubParams['name'] . Artisan::output());
    }

    protected function breadcrumbs($key, $name, $stub)
    {
        $stubParams = [
            'name'                  => $name,
            'stub'                  => __DIR__ . '/Stubs/' . $stub,
            'namespace'             => '\..\routes\breadcrumbs\backend',
            'route'                 => str_plural($key),
        ];

        Artisan::call('l5b:stub', $stubParams);
        $this->line('Breadcrumbs ' . $stubParams['name'] . Artisan::output());

        // Include breadcrumb file in backend.php
        $require_breadcrumb = "require __DIR__.'/$name.php';";

        $backend_path = base_path("routes/breadcrumbs/backend/backend.php");

        $breadcrumbs = explode("\n", file_get_contents($backend_path));

        if(!in_array($require_breadcrumb, $breadcrumbs)){
            $myfile = file_put_contents($backend_path, PHP_EOL . $require_breadcrumb, FILE_APPEND | LOCK_EX);
        }
    }

    protected function view($key, $name, $stub)
    {
        $stubParams = [
            'name'                  => $name . ".blade",
            'stub'                  => __DIR__ . '/Stubs/' . $stub,
            'namespace'             => '\..\resources\views\backend' . '\\' . $key,
            'label'                 => str_plural($key),
            'array'                 => camel_case(str_plural($key)),
            'field'                 => $this->option('field'),
            'route'                 => str_plural($key),
            'variable'              => camel_case($key),
            'view'                  => $key,
        ];

        Artisan::call('l5b:stub', $stubParams);
        $this->line('View ' . $stubParams['name'] . Artisan::output());
    }

}
