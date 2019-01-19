# CRUD artisan command for rappasoft/laravel-5-boilerplate

Creates a Model, Controller (with validation Requests), Migration, Routes, Breadcrumbs and CRUD Views for the given name ready to work with in [rappasoft/laravel-5-boilerplate](https://www.github.com/rappasoft/laravel-5-boilerplate/) backend.

## Requires

- [Laravel 5](https://laravel.com)
- [rappasoft/laravel-5-boilerplate](https://www.github.com/rappasoft/laravel-5-boilerplate/)

It has been tested with Laravel 5.7.

## Install

### Method 1

Copy _l5bCrud.php_ and _l5bStub.php_ and the _Stubs_ folder with all its contents into your _/app/Commands/_ folder.

### Method 2

Packagist Composer repository (TODO)

## Run

In your Laravel project root folder:

```
php artisan l5b:crud example
```

Where _example_ is the name you want for your model (routes, views, controllers,...). I've tried to follow naming best practices and it uses plural or singular names and lower or uppercase where needed.

Parameters _example_, _Example_, _examples_ or _EXAMPLES_ all give the same results.

Then run the created migration:

```
php artisan migrate
```

Note: out of the box, the table comes only with a _title_ text field, besides the _id_, _deleted_at_, _created_at_ and _updated_at_. Edit your newly created migration file to add any other you may need befor run the migrate command.

In your browser open:

```
https://YOUR_SITE/admin/examples
```

**...et voilà! :)**

## Suggestions

You can add this piece of code to _/resources/views/backend/includes/sidebar.blade.php_ to have a menu item for your new CRUD views:

```
<li class="nav-item">
    <a class="nav-link {{ active_class(Active::checkUriPattern('admin/examples*')) }}" href="{{ route('admin.examples.index') }}">
        <i class="nav-icon icon-whatever"></i> @lang('menus.backend.sidebar.examples')
    </a>
</li>
```

## Strings

These are the _labels.php_, _menus.php_ and _validation.php_ English strings needed, copy them into the files in _/resources/lang/en/_ or whatever other language folder you may need. Replace _Example_ for the name of your Model.

TODO: generate a file with your choosen name ready to copy&paste.

_labels.php_ under **'backend'**:

```
        'examples' => [
            'management'    => 'Example Management',
            'active'        => 'Active Examples',
            'view'          => 'View Example',
            'edit'          => 'Edit Example',
            'create'        => 'Create Example',
            'create_new'    => 'Create New Example',
            'table'         => [
                'title'         => 'Title',
                'created'       => 'Created',
                'last_updated'  => 'Last Updated',
                'deleted'       => 'Deleted',
                'actions'       => 'Actions',
                'tab_title'     => 'Overview',
                'total'         => 'example total|examples total',
            ],

            'tabs' => [
                'title' => 'Overview',
                'content' => [
                    'overview'  => [
                        'title'         => 'Title',
                        'created_at'    => 'Created',
                        'last_updated'  => 'Last Updated',
                    ],
                ],
            ],

        ],
```

_menus.php_ under **'backend'**

```
        'examples' => [
            'main'            => 'Examples',
            'all'             => 'All Examples',
            'create'          => 'Create Example',
            'deleted'         => 'Deleted Examples',
            'view'            => 'View Example',
            'edit'            => 'Edit Example',
        ],
```

_menus.php_ under **'backend' => 'sidebar'**

```
    'examples'  => 'Examples',
```

_validation.php_ under **'attributes' => 'backend'**

```
            'examples' => [
                'title'            => 'Title',
            ],
```

## Files created

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

### Requests

```
app/Http/Requests/Backend/StoreExampleRequest.php
app/Http/Requests/Backend/UpdateExampleRequest.php
```

Validation store and update Requests.

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

## License

This repository is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

Copyright © 2019 Alvaro Piqueras <alvaro@pqrs.es>

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the “Software”), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED “AS IS”, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
