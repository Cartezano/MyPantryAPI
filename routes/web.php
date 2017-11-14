<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return 'Hello World';
});

$router->group(['prefix' => 'v1'], function () use ($router) {
    /**
     * 
     * Route User Type
     * 
     */
    $app->get('user_types',  'UserTypeController@index');
    $app->post('user_types', 'UserTypeController@store');
    $app->get('user_types/{user_type}', 'UserTypeController@show');
    $app->put('user_types/{user_type}', 'UserTypeController@update');
    $app->patch('user_types/{user_type}', 'UserTypeController@update');
    $app->delete('user_types/{user_type}', 'UserTypeController@destroy');

    /**
     * 
     * Route User
     * 
     * $app->get('users', 'UserController@index');
     */
    $app->get('users', 'UserController@index');
    $app->get('users/{user}', 'UserController@show');
    $app->put('users/{user}', 'UserController@update');
    $app->patch('users/{user}', 'UserController@update');
    $app->delete('users/{user}', 'UserController@destroy');

    $app->post('login', 'UserController@login');
    $app->post('register', 'UserController@register');

    /**
     * 
     * Route Product
     * 
     */
    $app->get('products', 'ProductController@index');
    $app->post('products', 'ProductController@store');
    $app->get('products/{product}', 'ProductController@show');
    $app->put('products/{product}', 'ProductController@update');
    $app->patch('products/{product}', 'ProductController@update');
    $app->delete('products/{product}', 'ProductController@destroy');

    /**
     * 
     * Route Category
     * 
     */
    $app->get('categories', 'CategoryController@index');
    $app->post('categories', 'CategoryController@store');
    $app->get('categories/{category}', 'CategoryController@show');
    $app->put('categories/{category}', 'CategoryController@update');
    $app->patch('categories/{category}', 'CategoryController@update');
    $app->delete('categories/{category}', 'CategoryController@destroy');

    /**
     * 
     * Route Pantry
     * 
     */
    $app->get('pantries', 'PantryController@index');
    $app->post('pantries', 'PantryController@store');
    $app->get('pantries/{pantry}', 'PantryController@show');
    $app->put('pantries/{pantry}', 'PantryController@update');
    $app->patch('pantries/{pantry}', 'PantryController@update');
    $app->delete('pantries/{pantry}', 'PantryController@destroy');

    /**
     *
     * Route Category Product
     *
     */
    $app->get('categories/{category}/products', 'CategoryProductController@index');

    /**
     *
     * Route User Product
     *
     */
    $app->get('users/{user}/products', 'UserProductController@index');
    $app->post('users/{user}/products/{product}', 'UserProductController@store');
    $app->put('users/{user}/products/{product}', 'UserProductController@update');
    $app->patch('users/{user}/products/{product}', 'UserProductController@update');
    $app->delete('users/{user}/products/{product}', 'UserProductController@destroy');
});