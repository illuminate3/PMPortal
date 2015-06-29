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

//Route::get('projects/{id}/create','ProjectsController@create');
Route::get('home','ProjectsController@index');
//Route::post('projects', 'ProjectsController@store');
Route::get('projects/search', ['as' => 'projects.search', 'uses' => 'ProjectsController@search']);
//Route::get('projects/{projects}/status', ['as' => 'projects.status', 'uses' => 'ProjectsController@status']);
Route::get('projects/{projects}/generate', ['as' => 'projects.generatepdf', 'uses' => 'ProjectsController@generatepdf']);
Route::resource('projects', 'ProjectsController');

Route::get('accomplishments/{id}/create', 'AccomplishmentsController@create');
Route::get('accomplishments/{id}/edit', 'AccomplishmentsController@edit');
Route::put('accomplishments/{id}', 'AccomplishmentsController@update');
Route::patch('accomplishments/{id}', 'AccomplishmentsController@update');
Route::delete('accomplishments/{id}', ['as' => 'accomplishments.destroy', 'uses' => 'AccomplishmentsController@destroy']);
Route::post('accomplishments', ['as' => 'accomplishments.store', 'uses' => 'AccomplishmentsController@store']);
//Route::resource('accomplishments', 'AccomplishmentsController');

Route::get('actions/{id}/create', 'ActionsController@create');
Route::post('actions', ['as' => 'actions.store', 'uses' => 'ActionsController@store']);
Route::get('actions/{id}/edit', 'ActionsController@edit');
Route::put('actions/{id}', 'ActionsController@update');
Route::patch('actions/{id}', 'ActionsController@update');
Route::delete('actions/{id}', ['as' => 'actions.destroy', 'uses' => 'ActionsController@destroy']);
//Route::resource('actions', 'ActionsController');

Route::get('expenses/{id}/create', 'ExpensesController@create');
Route::post('expenses', ['as' => 'expenses.store', 'uses' => 'ExpensesController@store']);
Route::get('expenses/{id}/edit', 'ExpensesController@edit');
Route::put('expenses/{id}', 'ExpensesController@update');
Route::patch('expenses/{id}', 'ExpensesController@update');
Route::delete('expenses/{id}', ['as' => 'expenses.destroy', 'uses' => 'ExpensesController@destroy']);
//Route::resource('expenses', 'ExpensesController');

Route::get('issues/{id}/create', 'IssuesController@create');
Route::post('issues', ['as' => 'issues.store', 'uses' => 'IssuesController@store']);
Route::get('issues/{id}/edit', 'IssuesController@edit');
Route::put('issues/{id}', 'IssuesController@update');
Route::patch('issues/{id}', 'IssuesController@update');
Route::delete('issues/{id}', ['as' => 'issues.destroy', 'uses' => 'IssuesController@destroy']);
//Route::get('issues', 'IssuesController');

Route::get('milestones/{id}/create', 'MilestonesController@create');
Route::get('milestones/{id}/edit', 'MilestonesController@edit');
Route::put('milestones/{id}', 'MilestonesController@update');
Route::patch('milestones/{id}', 'MilestonesController@update');
Route::delete('milestones/{id}', ['as' => 'milestones.destroy', 'uses' => 'MilestonesController@destroy']);
Route::post('milestones', ['as' => 'milestones.store', 'uses' => 'MilestonesController@store']);
//Route::resource('milestones', 'MilestonesController');

Route::get('risks/{id}/create', 'RisksController@create');
Route::post('risks', ['as' => 'risks.store', 'uses' => 'RisksController@store']);
Route::get('risks/{id}/edit', 'RisksController@edit');
Route::put('risks/{id}', 'RisksController@update');
Route::patch('risks/{id}', 'RisksController@update');
Route::delete('risks/{id}', ['as' => 'risks.destroy', 'uses' => 'RisksController@destroy']);
//Route::resource('risks', 'RisksController');

Route::get('filters/PM/{name}', ['as' => 'filter.manager', 'uses' => 'FiltersController@showManager']);
Route::get('filters/users/{role}', ['as' => 'filter.users', 'uses' => 'FiltersController@showUsers']);
Route::get('filters/projects', ['as' => 'filters.projects', 'uses' => 'FiltersController@showProjects']);
Route::get('filters/search', ['as' => 'filters.userSearch', 'uses' => 'FiltersController@userSearch']);
Route::get('filters/status/{status}', ['as' => 'filter.status', 'uses' => 'FiltersController@showStatus']);
Route::get('filters/color/{color}', ['as' => 'filter.color', 'uses' => 'FiltersController@showColor']);
Route::get('filters/month/{month}', ['as' => 'filter.month', 'uses' => 'FiltersController@showMonth']);
Route::resource('filters', 'FiltersController');

/*
* Deliverables routes: Check Controllers folder for specific controller 
*/
Route::get('projects/{id}/checklist', 'DeliverablesController@show');
Route::get('projects/{id}/checklist/edit', ['as' => 'deliverables.edit', 'uses' => 'DeliverablesController@edit']);
Route::patch('projects/{id}/checklist', ['as' => 'deliverables.update', 'uses' => 'DeliverablesController@update']);

Route::get('charts/{id}/create', 'ChartsController@create');
Route::post('charts', ['as' => 'charts.store', 'uses' => 'ChartsController@store']);
Route::get('charts/{id}/edit', 'ChartsController@edit');
Route::put('charts/{id}', 'ChartsController@update');
Route::patch('charts/{id}', 'ChartsController@update');
Route::delete('charts/{id}', ['as' => 'charts.destroy', 'uses' => 'ChartsController@destroy']);
Route::get('charts/{id}', ['as' => 'charts.show', 'uses' => 'ChartsController@show']);

Route::get('support_team/{id}/create', 'SupportTeamMembersController@create');
Route::post('support_team', ['as' => 'support_team_members.store', 'uses' => 'SupportTeamMembersController@store']);
Route::get('support_team/{id}/edit', 'SupportTeamMembersController@edit');
Route::put('support_team/{id}', 'SupportTeamMembersController@update');
Route::patch('support_team/{id}', 'SupportTeamMembersController@update');
Route::delete('support_team/{id}', ['as' => 'support_team_members.destroy', 'uses' => 'SupportTeamMembersController@destroy']);

Route::get('technical_project_team/{id}/create', 'TechnicalProjectTeamMembersController@create');
Route::post('technical_project_team', ['as' => 'technical_project_team_members.store', 'uses' => 'TechnicalProjectTeamMembersController@store']);
Route::get('technical_project_team/{id}/edit', 'TechnicalProjectTeamMembersController@edit');
Route::put('technical_project_team/{id}', 'TechnicalProjectTeamMembersController@update');
Route::patch('technical_project_team/{id}', 'TechnicalProjectTeamMembersController@update');
Route::delete('technical_project_team/{id}', ['as' => 'technical_project_team_members.destroy', 'uses' => 'TechnicalProjectTeamMembersController@destroy']);

Route::get('business_project_team/{id}/create', 'BusinessProjectTeamMembersController@create');
Route::post('business_project_team', ['as' => 'business_project_team_members.store', 'uses' => 'BusinessProjectTeamMembersController@store']);
Route::get('business_project_team/{id}/edit', 'BusinessProjectTeamMembersController@edit');
Route::put('business_project_team/{id}', 'BusinessProjectTeamMembersController@update');
Route::patch('business_project_team/{id}', 'BusinessProjectTeamMembersController@update');
Route::delete('business_project_team/{id}', ['as' => 'business_project_team_members.destroy', 'uses' => 'BusinessProjectTeamMembersController@destroy']);

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
Route::get('backup/load', 'BackupController@loadBackup');
Route::get('change_log', 'AuditController@changeLog');
Route::get('activity_log/clean', ['middleware' => 'system_admin', function()
{
	Activity::cleanLog();
	flash()->success('Activity Log has been successfully cleared!');
	return redirect()->action('AuditController@changeLog');
}]);

//By default records older than 2 months will be deleted. The number of months can be modified in the config-file of the spatie/activitylog package.
Route::get('change_log/clean', ['middleware' => 'system_admin', function()
{	
	DB::table('revisions')->delete();
	flash()->success('Change Log has been successfully cleared!');
	return redirect()->action('AuditController@changeLog');
}]);
Route::get('change_log/deleteOldest', 'AuditController@deleteOldestFiftyChanges');
Route::get('activity_log/deleteOldest', 'AuditController@deleteOldestFiftyActivities');
