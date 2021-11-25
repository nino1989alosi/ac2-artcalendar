<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
    
});



$router->group(['prefix' => 'groups'], function () use ($router) {
    $router->get('/', [ 'uses' => 'Api\Generic@getGroups']);
    
});



$router->group(['prefix' => 'tags'], function () use ($router) {
    $router->get('/', [ 'uses' => 'Api\Generic@getTags']);
    $router->post('create', ['uses' => 'Api\Generic@createTags']);
    
});


$router->group(['prefix' => 'typescosto'], function () use ($router) {
    $router->get('/', [ 'uses' => 'Api\Generic@getTypes']);
    $router->post('create', ['uses' => 'Api\Generic@createTypeCosto']);
    
});



$router->group(['prefix' => 'types'], function () use ($router) {
    $router->get('/', [ 'uses' => 'Api\Generic@getTypes']);
    $router->post('create', ['uses' => 'Api\Generic@createType']);
    
});


$router->group(['prefix' => 'groups'], function () use ($router) {
    $router->get('/', [ 'uses' => 'Api\Generic@getGroups']);
    $router->post('create', ['uses' => 'Api\Generic@createGroup']);
    
});



$router->group(['prefix' => 'companies'], function () use ($router) {
    $router->get('/', [ 'uses' => 'Api\Generic@getCompanies']);
    $router->post('create', ['uses' => 'Api\Generic@createCompany']);
    
});


$router->group(['prefix' => 'members'], function () use ($router) {
    $router->get('/', [ 'uses' => 'Api\Generic@getTypes']);
    $router->post('create', ['uses' => 'Api\Generic@createMember']);
    
});