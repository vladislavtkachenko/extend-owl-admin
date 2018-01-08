<?php

Route::group(
    [
        'prefix'    => config('sleeping_owl.url_prefix'),
        'middleware' => config('sleeping_owl.middleware'),
        'namespace' => 'VladislavTkachenko\Admin\Http\Controllers',
    ],
    function ()
    {
        Route::get('/server', "AdminController@server")->name('admin.server');
    }
);