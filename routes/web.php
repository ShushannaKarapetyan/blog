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

    Route::resource('admin/user', 'UserController');

    // Post Routes
    Route::resource('admin/post', 'PostController');

    // Tag Routes
    Route::resource('admin/tag', 'TagController');

    // Category Routes
    Route::resource('admin/category', 'CategoryController');

    // Admin Auth Routes

    Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin-login', 'Auth\LoginController@login');



});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
