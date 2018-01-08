### Install

`composer require vladislavtkachenko/extend-owl-admin`

Laravel 5.5 uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider.

For Laravel < 5.5 after updating composer, add the service provider to the providers array in config/app.php

`VladislavTkachenko\Admin\Providers\ExtendOwlAdminServiceProvider::class`

#### Publish assets

`php artisan vendor:publish --provider="VladislavTkachenko\Admin\Providers\ExtendOwlAdminServiceProvider" --force`


### Usage

#### Orderable block with {image, title, description} 

`AdminFormElement::orderableBlock('content', 'Контент')`

#### Orderable images (only image)

In model

`protected $casts = [ 'content' => 'array' ];`

In admin Section

`AdminFormElement::orderableImages('content', 'Контент')`

#### Server info page: add to the navigation in Admin/navigation.php

`(new Page())->setTitle('Server')->setIcon('fa fa-server')->setUrl('/admin/server')`

#### Show Laravel logs files

Set daily Laravel log in .env file

`APP_LOG=daily`
 
Add to the navigation in Admin/navigation.php

`(new Page())->setTitle('Logs')->setIcon('fa fa-files-o')->setUrl('/admin/logs')`