### Install

`composer require vladislavtkachenko/extend-owl-admin`

Laravel 5.5 uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider.

For Laravel < 5.5 after updating composer, add the service provider to the providers array in config/app.php

`VladislavTkachenko\Admin\Providers\ExtendOwlAdminServiceProvider::class`



#### Publish assets

`php artisan vendor:publish --provider="VladislavTkachenko\Admin\Providers\ExtendOwlAdminServiceProvider" --force`

#### Examples

For orderable block with {image, title, description} 

`AdminFormElement::orderableBlock('content', 'Контент')`


Server info page: add to the navigation in Admin/navigation.php

`(new Page())->setTitle('Сервер')->setIcon('fa fa-server')->setUrl('/admin/server'),`