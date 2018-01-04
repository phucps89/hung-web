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
    'middleware' => ['adminSiteRole:admin','adminSitePermission:manage_user' ]
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
    Route::post('/edit/{idUser}', [
        'uses' => 'UserController@addEditPost'
    ]);
    Route::post('/add', [
        'uses' => 'UserController@addEditPost'
    ]);
});