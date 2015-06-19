<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'ProjectsController@index');

//Route::get('projects/create','ProjectsController@create');
Route::get('home','ProjectsController@index');
//Route::post('projects', 'ProjectsController@store');
Route::get('projects/search', ['as' => 'projects.search', 'uses' => 'ProjectsController@search']);
Route::get('projects/{projects}/status', ['as' => 'projects.status', 'uses' => 'ProjectsController@status']);
Route::get('projects/{projects}/generate', ['as' => 'projects.generatepdf', 'uses' => 'ProjectsController@generatepdf']);
Route::resource('projects', 'ProjectsController');

Route::get('accomplishments/create/{id}', 'AccomplishmentsController@create');
Route::get('accomplishments/{id}/edit', 'AccomplishmentsController@edit');
Route::put('accomplishments/{id}', 'AccomplishmentsController@update');
Route::patch('accomplishments/{id}', 'AccomplishmentsController@update');
Route::delete('accomplishments/{id}', ['as' => 'accomplishments.destroy', 'uses' => 'AccomplishmentsController@destroy']);
Route::post('accomplishments', ['as' => 'accomplishments.store', 'uses' => 'AccomplishmentsController@store']);
//Route::resource('accomplishments', 'AccomplishmentsController');

Route::get('actions/create/{id}', 'ActionsController@create');
Route::post('actions', ['as' => 'actions.store', 'uses' => 'ActionsController@store']);
Route::get('actions/{id}/edit', 'ActionsController@edit');
Route::put('actions/{id}', 'ActionsController@update');
Route::patch('actions/{id}', 'ActionsController@update');
Route::delete('actions/{id}', ['as' => 'actions.destroy', 'uses' => 'ActionsController@destroy']);
//Route::resource('actions', 'ActionsController');

Route::get('expenses/create/{id}', 'ExpensesController@create');
Route::post('expenses', ['as' => 'expenses.store', 'uses' => 'ExpensesController@store']);
Route::get('expenses/{id}/edit', 'ExpensesController@edit');
Route::put('expenses/{id}', 'ExpensesController@update');
Route::patch('expenses/{id}', 'ExpensesController@update');
Route::delete('expenses/{id}', ['as' => 'expenses.destroy', 'uses' => 'ExpensesController@destroy']);
//Route::resource('expenses', 'ExpensesController');

Route::get('issues/create/{id}', 'IssuesController@create');
Route::post('issues', ['as' => 'issues.store', 'uses' => 'IssuesController@store']);
Route::get('issues/{id}/edit', 'IssuesController@edit');
Route::put('issues/{id}', 'IssuesController@update');
Route::patch('issues/{id}', 'IssuesController@update');
Route::delete('issues/{id}', ['as' => 'issues.destroy', 'uses' => 'IssuesController@destroy']);
//Route::get('issues', 'IssuesController');

Route::get('milestones/create/{id}', 'MilestonesController@create');
Route::get('milestones/{id}/edit', 'MilestonesController@edit');
Route::put('milestones/{id}', 'MilestonesController@update');
Route::patch('milestones/{id}', 'MilestonesController@update');
Route::delete('milestones/{id}', ['as' => 'milestones.destroy', 'uses' => 'MilestonesController@destroy']);
Route::post('milestones', ['as' => 'milestones.store', 'uses' => 'MilestonesController@store']);
//Route::resource('milestones', 'MilestonesController');

Route::get('risks/create/{id}', 'RisksController@create');
Route::post('risks', ['as' => 'risks.store', 'uses' => 'RisksController@store']);
Route::get('risks/{id}/edit', 'RisksController@edit');
Route::put('risks/{id}', 'RisksController@update');
Route::patch('risks/{id}', 'RisksController@update');
Route::delete('risks/{id}', ['as' => 'risks.destroy', 'uses' => 'RisksController@destroy']);
//Route::resource('risks', 'RisksController');

Route::get('filters/PM/{id}', ['as' => 'filter.manager', 'uses' => 'FiltersController@showManager']);
Route::get('filters/status/{status}', ['as' => 'filter.status', 'uses' => 'FiltersController@showStatus']);
Route::get('filters/color/{color}', ['as' => 'filter.color', 'uses' => 'FiltersController@showColor']);
Route::get('filters/month/{month}', ['as' => 'filter.month', 'uses' => 'FiltersController@showMonth']);
Route::resource('filters', 'FiltersController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('users', 'UsersController@index');
Route::get('users/search', ['as' => 'users.search', 'uses' => 'UsersController@search']);
Route::delete('users/{id}', ['as' => 'users.destroy', 'uses' => 'UsersController@destroy']);
Route::get('users/{id}/edit', ['as' => 'users.edit', 'uses' => 'UsersController@getUpdateAccount']);
Route::post('users/{id}', 'UsersController@postUpdateAccount');

Route::get('backup', 'BackupController@backup');