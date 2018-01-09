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
        Route::get('/logs', 'AdminController@log')->name('admin.log');
    }
);

if(config('sleeping_owl_extend.auth')){
    Route::group(
        [
            'prefix' => config('sleeping_owl.url_prefix'),
            'middleware' => 'web',
            'namespace' => 'VladislavTkachenko\Admin\Http\Controllers\Auth',
        ],
        function ()
        {
            Route::get('/login', ['as' => 'admin.login.form', 'uses' => 'LoginAdminController@showLoginForm']);
            Route::post('/login', ['as' => 'admin.login', 'uses' => 'LoginAdminController@login']);
            Route::post('/logout', ['as' => 'logout', 'uses' => 'LoginAdminController@logout']);
        }
    );
}