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

Where _example_ is the name you want for your model (routes, views, controllers,...).

Then run the created migration:

```
php artisan migrate
```

In your browser open:

```
https://YOUR_SITE/admin/examples
```

**et voilà!**

## Suggestions

You can add this piece of code to _/resources/views/backend/includes/sidebar.blade.php_ to have a menu item for your new CRUD views:

```
<li class="nav-item">
    <a class="nav-link {{ active_class(Active::checkUriPattern('admin/examples*')) }}" href="{{ route('admin.examples.index') }}">
        <i class="nav-icon icon-speedometer"></i> @lang('menus.backend.sidebar.examples')
    </a>
</li>
```

## Strings

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

### Controller

```
app/Http/Controllers/Backend/ExampleController.php
```

### Requests

```
app/Http/Requests/Backend/StoreExampleRequest.php
app/Http/Requests/Backend/UpdateExampleRequest.php
```

### Migrations

```
database/migrations/\YYYY_MM_DD_create_examples_table.php
```

### Routes

```
routes/backend/examples.php
```

### Breadcrumbs

```
routes/breadcrumbs/backend/example.php
```

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

## License

This repository is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

Copyright © 2019 Alvaro Piqueras <alvaro@pqrs.es>

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the “Software”), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED “AS IS”, WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
