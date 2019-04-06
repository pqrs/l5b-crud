# CRUD artisan command for rappasoft/laravel-5-boilerplate

Creates a Model, Controller (with Repository, validation Requests, Events and Listeners), Migration, Routes, Breadcrumbs and CRUD Views for the given name ready to work in [rappasoft/laravel-5-boilerplate](https://www.github.com/rappasoft/laravel-5-boilerplate/) backend.

From version 1.4 you can also optionally generate frontend files: Controller, Labels, Event, Request, Listener, View, Route and Repository.

By default it does not overwrite any files that may exist with the pre-stablished names. So, if you delete one of the files and run the command again, the deleted file will be created again and the rest will be ignored and will keep the changes you could have made.

## Requires

- [Laravel 5](https://laravel.com)
- [rappasoft/laravel-5-boilerplate](https://www.github.com/rappasoft/laravel-5-boilerplate/)

It has been tested with Laravel 5.7.

## Install

```
composer require pqrs/l5b-crud
```

## Run

In your Laravel project root folder:

```
php artisan l5b:crud example
```

Where _example_ is the name you want for your model (routes, views, controllers,...). I've tried to follow best naming practices and it uses plural or singular names and lower or uppercase where needed. You can also use camelCase or snake_case.

Parameters _example_, _Example_, _examples_ or _EXAMPLES_ all give the same results.

Then run the created migration:

```
php artisan migrate
```

In your browser open:

```
https://YOUR_SITE/admin/examples
```

**...et voilà! :)**

Note: out of the box, the table comes only with a _title_ text field, besides the _id_, _deleted_at_, _created_at_ and _updated_at_. Edit your newly created migration file to add any other you may need before runnning the migrate command.

## Options

You can create all the files and run the migration by running the command with the --migrate option:

```
php artisan l5b:crud example --migrate

or

php artisan l5b:crud example -m
```

You may also specify the name of the default text field 'title' to whatever other you prefer with the --field option:

```
php artisan l5b:crud example --field=name

or

php artisan l5b:crud example -f name
```

You can also overwrite previously created files with the --force option.

```
php artisan l5b:crud example --force
```

To generate the frontend files also, you should use the --frontend option.

```
php artisan l5b:crud example --frontend
```

## Include a menu item

A file named _sidebar-examples.blade.php_ is created in the folder _/resources/views/backend/example/includes_. It contains the html code for a menu item to access your recently created views. You can show it in your sidebar by including the following line in _/resources/views/backend/includes/sidebar.blade.php_ wherever you want it to appear:

```
@include('backend.example.includes.sidebar-examples')
```

## Events and Listeners

The package generates three events and listeners for creating, updating and deleting items methods. In order to get these to work you must resgister them with the event dispatcher, adding this line to your _Providers/EventServiceProvider.php_ file (under _Backend Subscribers_):

```
\App\Listeners\Backend\Example\ExampleEventListener::class
```

## Language lines

Customized English language lines can be found _/resources/lang/en_. There is a file for backend lines (backend_examples.php) and another for frontend (frontend_examples.php).

## Backend Files created

### Model

```
app/Models/Example.php
```

### Trait Attribute

```
app/Models/Traits/Attribute/ExampleAttribute.php
```

This is where the action buttons for the new object are.

### Controller

```
app/Http/Controllers/Backend/ExampleController.php
```

It contains the CRUD methods: _index_, _create_, _store_, _show_, _edit_, _update_, _destroy_, _delete_, _restore_ and _deleted_.

### Repository

```
app/Repositories/Backend/ExampleRepository.php
```

Contains database logic.

### Requests

```
app/Http/Requests/Backend/ManageExampleRequest.php
app/Http/Requests/Backend/StoreExampleRequest.php
app/Http/Requests/Backend/UpdateExampleRequest.php
```

Validation manage, store and update Requests.

### Events

```
app/Events/Backend/Example/ExampleCreated.php
app/Events/Backend/Example/ExampleUpdated.php
app/Events/Backend/Example/ExampleDeleted.php
```

### Listeners

```
app/Listeners/Backend/Example/ExampleEventListener.php
```

### Migrations

```
database/migrations/\YYYY_MM_DD_create_examples_table.php
```

### Routes

```
routes/backend/examples.php
```

Contains the named routes _admin.examples.index_, _admin.examples.deleted_, _admin.examples.restore_, _delete-permanently_, _admin.examples.create_, _admin.examples.store_, _admin.examples.show_, _admin.examples.edit_, _admin.examples.update_ and _admin.examples.destroy_.

### Breadcrumbs

```
routes/breadcrumbs/backend/example.php
```

This has the breadcrumbs for the routes
_admin.examples.index_, _admin.examples.create_, _admin.examples.show_, _admin.examples.edit_ and _admin.examples.deleted_.

The following line is added to _routes/breadcrumbs/backend/backend.php_:

```
require **DIR**.'/example.php';
```

If you delete the _routes/breadcrumbs/backend/example.php_ file created by this command, don't forget to delete this line or your whole project will crash.

### Views

```
resources/views/backend/example/index.blade.php
resources/views/backend/example/show.blade.php
resources/views/backend/example/create.blade.php
resources/views/backend/example/edit.blade.php
resources/views/backend/example/deleted.blade.php
resources/views/backend/example/includes/breadcrumb-links.blade.php
resources/views/backend/example/includes/header-buttons.blade.php
```

If you add more fields to your datatable, you'll have to edit _show.blade.php_, _create.blade.php_ and _edit.blade.php_ to suit your needs.

### Menu item

```
sidebar-examples.blade.php
```

HTML code for the menu item for your Laravel 5 Boilerplate sidebar.

## Fronted Files created

### Controller

```
app/Http/Controllers/Frontend/ExampleController.php
```

It contains the CRUD methods: _index_, _create_, _store_, _show_, _edit_, _update_, _destroy_, _delete_, _restore_ and _deleted_.

### Repository

```
app/Repositories/Frontend/ExampleRepository.php
```

Contains database logic.

### Requests

```
app/Http/Requests/Frontend/ManageExampleRequest.php
app/Http/Requests/Frontend/StoreExampleRequest.php
app/Http/Requests/Frontend/UpdateExampleRequest.php
```

Validation manage, store and update Requests.

### Events

```
app/Events/Frontend/Example/ExampleCreated.php
app/Events/Frontend/Example/ExampleUpdated.php
app/Events/Frontend/Example/ExampleDeleted.php
```

### Listeners

```
app/Listeners/Frontend/Example/ExampleEventListener.php
```

### Routes

```
routes/frontend/examples.php
```

Contains the named routes _examples.index_, _examples.deleted_, _examples.restore_, _delete-permanently_, _examples.create_, _examples.store_, _examples.show_, _examples.edit_, _examples.update_ and _examples.destroy_.

### Views

```
resources/views/frontend/example/index.blade.php
resources/views/frontend/example/show.blade.php
resources/views/frontend/example/create.blade.php
resources/views/frontend/example/edit.blade.php
resources/views/frontend/example/deleted.blade.php
resources/views/frontend/example/includes/header-buttons.blade.php
```

If you add more fields to your datatable, you'll have to edit _show.blade.php_, _create.blade.php_ and _edit.blade.php_ to suit your needs.

## Changes

- **1.4** Added language lines files. Added options for frontend file generation and force overwriting of previous files. Thanks @rabol for your contribution.
- **1.3.8** Modified README.md about adding Listener to EventServiceProvider.php.
- **1.3.7** Added event firing to controller methods.
- **1.3.6** Added Events and Listeners for Create, Update and Delete operations.
- **1.3.5** Added --field option to specify the name of the default field

## License

This repository is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

Copyright © 2019 Alvaro Piqueras <alvaro@pqrs.es>

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the “Software”), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED “AS IS”, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

**Laravel** Copyright © 2019 Taylor Otwell

**Laravel 5 Boilerplate** Copyright © 2019 Anthony Rappa <rappa819@gmail.com>
