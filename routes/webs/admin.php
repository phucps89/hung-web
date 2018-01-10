<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/31/2017
 * Time: 7:07 AM
 */

define('ADMIN_HOME', 'admin.home');
define('ADMIN_LOGIN', 'admin.login');
define('ADMIN_LOGOUT', 'admin.logout');
define('ADMIN_LOGIN_POST', 'admin.login.post');

define('ADMIN_USER_LIST', 'admin.user.list');
define('ADMIN_USER_ADD', 'admin.user.add');
define('ADMIN_USER_EDIT', 'admin.user.edit');
define('ADMIN_USER_PERMISSION', 'admin.user.permission');

define('ADMIN_SIZE_LIST', 'admin.size.list');
define('ADMIN_SIZE_EDIT', 'admin.size.edit');
define('ADMIN_SIZE_ADD', 'admin.size.add');

define('ADMIN_COLOR_LIST', 'admin.color.list');
define('ADMIN_COLOR_EDIT', 'admin.color.edit');
define('ADMIN_COLOR_ADD', 'admin.color.add');

/**
 * Route Defined
 */

Route::get('/', [
    'as' => ADMIN_HOME,
    'uses' => 'HomeController@home'
]);

Route::get('/login', [
    'as' => ADMIN_LOGIN,
    'uses' => 'HomeController@loginPage'
]);

Route::post('/login', [
    'as'    =>  ADMIN_LOGIN_POST,
    'uses' => 'HomeController@loginPost'
]);

Route::get('/logout', [
    'as' => ADMIN_LOGOUT,
    'uses' => 'HomeController@logout'
]);

Route::group([
    'prefix' => 'user',
    'middleware' => ['adminSitePermission:'.\App\Entities\Permission::MANAGE_USER ]
], function(){
    Route::get('/', [
        'as' => ADMIN_USER_LIST,
        'uses' => 'UserController@list'
    ]);
    Route::get('/add', [
        'as' => ADMIN_USER_ADD,
        'uses' => 'UserController@add'
    ]);
    Route::get('/edit/{idUser}', [
        'as' => ADMIN_USER_EDIT,
        'uses' => 'UserController@edit'
    ]);
    Route::get('/permission/{idUser}', [
        'as' => ADMIN_USER_PERMISSION,
        'uses' => 'UserController@permission'
    ]);
    Route::post('/edit/{idUser}', [
        'uses' => 'UserController@addEditPost'
    ]);
    Route::post('/permission/{idUser}', [
        'uses' => 'UserController@permissionPost'
    ]);
    Route::post('/add', [
        'uses' => 'UserController@addEditPost'
    ]);
});

Route::group([
    'prefix' => 'size',
    'middleware' => ['adminSitePermission:'.\App\Entities\Permission::MANAGE_SIZE ]
], function(){
    Route::get('/', [
        'as' => ADMIN_SIZE_LIST,
        'uses' => 'SizeController@list'
    ]);
    Route::get('/add', [
        'as' => ADMIN_SIZE_ADD,
        'uses' => 'SizeController@add'
    ]);
    Route::get('/edit/{idSize}', [
        'as' => ADMIN_SIZE_EDIT,
        'uses' => 'SizeController@edit'
    ]);
    Route::post('/edit/{idUser}', [
        'uses' => 'SizeController@addEditPost'
    ]);
    Route::post('/add', [
        'uses' => 'SizeController@addEditPost'
    ]);
});

Route::group([
    'prefix' => 'color',
    'middleware' => ['adminSitePermission:'.\App\Entities\Permission::MANAGE_COLOR ]
], function(){
    Route::get('/', [
        'as' => ADMIN_COLOR_LIST,
        'uses' => 'ColorController@list'
    ]);
    Route::get('/add', [
        'as' => ADMIN_COLOR_ADD,
        'uses' => 'ColorController@add'
    ]);
    Route::get('/edit/{idColor}', [
        'as' => ADMIN_COLOR_EDIT,
        'uses' => 'ColorController@edit'
    ]);
    Route::post('/edit/{idColor}', [
        'uses' => 'ColorController@addEditPost'
    ]);
    Route::post('/add', [
        'uses' => 'ColorController@addEditPost'
    ]);
});