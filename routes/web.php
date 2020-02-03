<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('admin', function () {
    return view('admin_template');
})->middleware('admin');
Route::middleware('auth')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::prefix('issues')->name('issues.')->group(function () {
        Route::get('/create', function () {
            return view('issues.create');
        })->name('create');
        Route::get('sample', 'IssueController@indexSample')->name('sample');
        Route::get('sample/create', 'IssueController@createSample')->name('create_sample');
        Route::post('sample/create', 'IssueController@storeSample')->name('store_sample');
        Route::get('detail/{id}', 'IssueController@detailIssue')->name('detail');
        Route::get('board', 'IssueController@board')->name('board');
        Route::get('view-defend', 'IssueController@getViewCreateDefend')->name('defend');
        Route::get('view-risk-defend', 'IssueController@getViewCreateDefendRisk')->name('risk.defend');
        Route::get('button', 'IssueController@buttonIndex')->name('button');
        Route::patch('{id}/relative', 'TaskController@updateRelativeIssue')->name('updateRelative');
    });
    Route::prefix('projects')->name('projects.')->group(function () {
        Route::get('{id}/board', 'ProjectController@board')->name('board');
        Route::get('{id}/tasks', 'ProjectController@tasks')->name('tasks.index');
        Route::get('/{id}/task/create', 'ProjectController@taskCreate')->name('tasks.create');
        Route::get('/{id}/task/{taskId}/edit', 'ProjectController@taskEdit')->name('tasks.edit');
        Route::patch('/{id}/task/{taskId}', 'ProjectController@taskUpdate')->name('tasks.update');
        Route::get('/{id}/task/{taskId}', 'ProjectController@taskShow')->name('tasks.show');
        Route::post('/{id}/tasks', 'ProjectController@taskStore')->name('task.store');
        Route::get('/{id}/tasks/risks', 'ProjectController@indexRisk')->name('tasks.risk');
    });

    Route::prefix('tasks')->name('tasks.')->group(function () {
        Route::get('{taskId}/issues/create', 'TaskController@createIssue')->name('issues.create');
        Route::get('{taskId}/child-issues/{parentIssueId}/create', 'TaskController@createChildIssue')->name('issues_child.create');
        Route::get('{taskId}/issues/{issueId}/edit', 'TaskController@editIssue')->name('issues.edit');
        Route::patch('{taskId}/issues/{issueId}', 'TaskController@updateIssue')->name('issues.update');

        Route::post('{taskId}/issues', 'TaskController@storeIssue')->name('issues.store');
        Route::get('{taskId}/risk/create', 'TaskController@createRisk')->name('risks.create');
        Route::post('{taskId}/risk/update', 'TaskController@updateRisk')->name('risks.update');
        Route::post('{taskId}/risk/store', 'TaskController@storeRisk')->name('risks.store');
        Route::put('{taskId}/save-inline', 'TaskController@saveInline')->name('save_inline');
        Route::get('{taskId}/risk/detail/{riskKey}', 'TaskController@detailRisk')->name('risks.detail');
        Route::delete('{taskId}/issue/delete', 'TaskController@deleteIssue')->name('issues.delete');
        Route::delete('{taskId}/risk/delete', 'TaskController@deleteRisk')->name('risks.delete');
        Route::post('risk-defend', 'TaskController@getFormRiskDefend')->name('risks.defend');
        Route::post('issue-defend', 'TaskController@getFormIssueDefend')->name('issues.defend');
        Route::put('start', 'TaskController@start')->name('start');
        Route::put('end', 'TaskController@end')->name('end');
        Route::post('board', 'TaskController@updateStatus')->name('update_status');
    });

    Route::prefix('reports')->name('reports.')->group(function () {
        Route::get('connect-management', 'ReportController@connectManagement')->name('connect_management');
        Route::get('options', 'ReportController@options')->name('option');
        Route::get('analysis', 'ReportController@analysis')->name('analysis');
        Route::get('design', 'ReportController@design')->name('design');
        Route::get('/storage', 'ReportController@storage')->name('storage');
        Route::get('/report', 'ReportController@report')->name('report');
    });

    Route::prefix('templates')->name('templates.')->group(function () {
        Route::post('get-view-template', 'TemplateController@getViewTemplate')->name('get_view_template');
    });
    Route::resource('issues', 'IssueController');
    Route::resource('users', 'UserController');
    Route::resource('reports', 'ReportController');
    Route::resource('templates', 'TemplateController');
    Route::resource('projects', 'ProjectController');

});
Auth::routes();
