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

/**
 * 
 * Route User Type
 * 
 */
$app->get('user_types', ['uses'  =>  'UserTypeController@index']);
$app->post('user_types', ['uses'  =>  'UserTypeController@store']);
$app->get('user_types/{user_type}', ['uses'  =>  'UserTypeController@show']);
$app->put('user_types/{user_type}', ['uses'  =>  'UserTypeController@update']);
$app->delete('user_types/{user_type}', ['uses'  =>  'UserTypeController@destroy']);

/**
 * 
 * Route User
 * 
 */
$app->get('users', ['uses'  =>  'UserController@index']);
$app->post('users', ['uses'  =>  'UserController@store']);
$app->get('users/{user}', ['uses'  =>  'UserController@show']);
$app->put('users/{user}', ['uses'  =>  'UserController@update']);
$app->delete('users/{user}', ['uses'  =>  'UserController@destroy']);

/**
 * 
 * Route Product
 * 
 */
$app->get('products', ['uses'  =>  'ProductController@index']);
$app->post('products', ['uses'  =>  'ProductController@store']);
$app->get('products/{product}', ['uses'  =>  'ProductController@show']);
$app->put('products/{product}', ['uses'  =>  'ProductController@update']);
$app->delete('products/{product}', ['uses'  =>  'ProductController@destroy']);

/**
 * 
 * Route Category
 * 
 */
$app->get('categories', ['uses'  =>  'CategoryController@index']);
$app->post('categories', ['uses'  =>  'CategoryController@store']);
$app->get('categories/{category}', ['uses'  =>  'CategoryController@show']);
$app->put('categories/{category}', ['uses'  =>  'CategoryController@update']);
$app->delete('categories/{category}', ['uses'  =>  'CategoryController@destroy']);

/**
 * 
 * Route Pantry
 * 
 */
$app->get('pantries', ['uses'  =>  'PantryController@index']);
$app->post('pantries', ['uses'  =>  'PantryController@store']);
$app->get('pantries/{pantry}', ['uses'  =>  'PantryController@show']);
$app->put('pantries/{pantry}', ['uses'  =>  'PantryController@update']);
$app->delete('pantries/{pantry}', ['uses'  =>  'PantryController@destroy']);