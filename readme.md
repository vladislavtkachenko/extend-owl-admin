## Install

`composer require vladislavtkachenko/extend-owl-admin`

Laravel 5.5 uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider.

For Laravel < 5.5 after updating composer, add the service provider to the providers array in config/app.php

`VladislavTkachenko\Admin\Providers\ExtendOwlAdminServiceProvider::class`

### Publish assets

`php artisan vendor:publish --provider="VladislavTkachenko\Admin\Providers\ExtendOwlAdminServiceProvider" --force`


## Usage

### Orderable block with {image, title, description} 

`AdminFormElement::orderableBlock('content', 'Content')`

<p align="center">
  <img src="http://dl3.joxi.net/drive/2018/06/22/0025/3484/1662364/64/b82964d883.jpg">
</p>

### Orderable images (only image)

In model

`protected $casts = [ 'content' => 'array' ];`

In admin Section

`AdminFormElement::orderableImages('content', 'Content')`

<p align="center">
  <img src="http://dl4.joxi.net/drive/2018/06/22/0025/3484/1662364/64/3baee500dc.jpg">
</p>

### Color Picker

onDisplay

`AdminColumn::color('color', 'Color')`

onCreate / onEdit

`AdminFormElement::colorPicker('color', 'Color')`

<p align="center">
  <img src="http://dl4.joxi.net/drive/2018/06/22/0025/3484/1662364/64/ee3e3bb942.jpg">
</p>

### Yandex Map

`AdminFormElement::yandexMap('coords', 'Map')`

<p align="center">
  <img src="http://dl4.joxi.net/drive/2018/06/22/0025/3484/1662364/64/28a3999720.jpg">
</p>

### Server info page: add to the navigation in Admin/navigation.php

`(new Page())->setTitle('Server')->setIcon('fa fa-server')->setUrl('/admin/server')`

### Edit robots.txt file

`(new Page())->setTitle('Robots')->setIcon('fa fa-android')->setUrl('/admin/robots')`

### Show Laravel logs files

Set daily Laravel log in .env file

`APP_LOG=daily`
 
Add to the navigation in Admin/navigation.php

`(new Page())->setTitle('Logs')->setIcon('fa fa-files-o')->setUrl('/admin/logs')`

### Auth

Add middleware to the routeMiddleware array in app/Http/Kernel.php 

`'administrator' => \VladislavTkachenko\Admin\Http\Middleware\Administrator::class`

Add middleware to the 'middleware' array in config/sleeping_owl.php

`'middleware' => ['web', 'administrator'],`

Configure sleeping_owl_extent.php config