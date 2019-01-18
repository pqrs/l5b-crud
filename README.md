#CRUD artisan command for rappasoft/laravel-5-boilerplate

Creates a Model, Controller (with validation Requests), Routes, Breadcrumbs and CRUD Views for the given name ready to work with in [rappasoft/laravel-5-boilerplate](/rappasoft/laravel-5-boilerplate/) backend.

## Requires

[Laravel 5](https://laravel.com)
[rappasoft/laravel-5-boilerplate](/rappasoft/laravel-5-boilerplate/)

## Install

### Method 1

Copy _l5bCrud.php_ and _l5bStub.php_ and the _Stubs_ folder with all its contents into your _/app/Commands/_ folder.

### Method 2

Packagist Composer repository (TODO)

## Run

From your root folder:

```
php artisan l5b:crud example
```

Where _example_ is the name you want for your model (routes, views, controllers,...).

## Files created

### Model

_
app/Models/Example.php
_

### Trait Attribute

_app/Models/Traits/Attribute/ExampleAttribute.php_

### Controller

_app/Http/Controllers/Backend/ExampleController.php_

### Requests

_app/Http/Requests/Backend/StoreExampleRequest.php_
_app/Http/Requests/Backend/UpdateExampleRequest.php_

### Migrations

_database/migrations/\YYYY_MM_DD_create_examples_table.php_

### Routes

_routes/backend/examples.php_

### Breadcrumbs

_routes/breadcrumbs/backend/example.php_

### Views

_resources/views/backend/example/index.blade.php_
_resources/views/backend/example/show.blade.php_
_resources/views/backend/example/create.blade.php_
_resources/views/backend/example/edit.blade.php_
_resources/views/backend/example/deleted.blade.php_
_resources/views/backend/example/includes/breadcrumb-links.blade.php_
_resources/views/backend/example/includes/header-buttons.blade.php_
