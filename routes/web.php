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

$router->get('/', function () use ($router) {
    return 'Hello World';
});

/**
 * 
 * Route User Type
 * 
*/
$router->get('user_types', ['uses'  =>  'UserTypeController@index']);
$router->post('user_types', ['uses'  =>  'UserTypeController@store']);
$router->get('user_types/{user_type}', ['uses'  =>  'UserTypeController@show']);
$router->put('user_types/{user_type}', ['uses'  =>  'UserTypeController@update']);
$router->delete('user_types/{user_type}', ['uses'  =>  'UserTypeController@destroy']);

/**
 * 
 * Route User
 * 
*/
$router->get('users', ['uses'  =>  'UserController@index']);
$router->post('users', ['uses'  =>  'UserController@store']);
$router->get('users/{user}', ['uses'  =>  'UserController@show']);
$router->put('users/{user}', ['uses'  =>  'UserController@update']);
$router->delete('users/{user}', ['uses'  =>  'UserController@destroy']);

/**
 * 
 * Route Product
 * 
*/
$router->get('products', ['uses'  =>  'ProductController@index']);
$router->post('products', ['uses'  =>  'ProductController@store']);
$router->get('products/{product}', ['uses'  =>  'ProductController@show']);
$router->put('products/{product}', ['uses'  =>  'ProductController@update']);
$router->delete('products/{product}', ['uses'  =>  'ProductController@destroy']);

/**
 * 
 * Route Category
 * 
*/
$router->get('categories', ['uses'  =>  'CategoryController@index']);
$router->post('categories', ['uses'  =>  'CategoryController@store']);
$router->get('categories/{category}', ['uses'  =>  'CategoryController@show']);
$router->put('categories/{category}', ['uses'  =>  'CategoryController@update']);
$router->delete('categories/{category}', ['uses'  =>  'CategoryController@destroy']);

/**
 * 
 * Route Pantry
 * 
*/
$router->get('pantries', ['uses'  =>  'PantryController@index']);
$router->post('pantries', ['uses'  =>  'PantryController@store']);
$router->get('pantries/{pantry}', ['uses'  =>  'PantryController@show']);
$router->put('pantries/{pantry}', ['uses'  =>  'PantryController@update']);
$router->delete('pantries/{pantry}', ['uses'  =>  'PantryController@destroy']);