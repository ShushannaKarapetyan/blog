<?php

// User Routes

Route::group(['namespace' => 'User'], function (){
    // Home

    Route::get('/', 'HomeController@post');

    // Post Routes

    Route::get('post/{post}', 'PostController@post')->name('post');

    // Tag Routes

    Route::get('post/tag/{tag}', 'HomeController@tag')->name('tag');

    // Category Routes

    Route::get('post/category/{category}', 'HomeController@category')->name('category');

});

// Admin Routes

Route::group(['namespace' => 'Admin'], function (){
    // Home

    Route::get('admin/home', 'HomeController@index')->name('admin.home');

    // Users Routes
    Route::resource('admin/user', 'UserController');

    // Roles Routes
    Route::resource('admin/role', 'RoleController');

    // Permission Routes
    Route::resource('admin/permission', 'PermissionController');

    // Posts Routes
    Route::resource('admin/post', 'PostController');

    // Tags Routes
    Route::resource('admin/tag', 'TagController');

    // Categories Routes
    Route::resource('admin/category', 'CategoryController');

    // Admins Auth Routes
    Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin-login', 'Auth\LoginController@login');



});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
