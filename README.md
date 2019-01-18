#CRUD artisan command for rappasoft/laravel-5-boilerplate

Creates a Model, Controller (with validation Requests), Routes, Breadcrumbs and CRUD Views for the given name ready to work with in [rappasoft/laravel-5-boilerplate](https://www.github.com/rappasoft/laravel-5-boilerplate/) backend.

## Requires

[Laravel 5](https://laravel.com)
[rappasoft/laravel-5-boilerplate](https://www.github.com/rappasoft/laravel-5-boilerplate/)

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
