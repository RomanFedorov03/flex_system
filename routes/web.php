<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();
Route::middleware('auth')->group(function (){
    Route::get('/', function () {
        return view('home');
    });
//    Route::get('/staff/email', function () {
//        return view('components/email/staff_password');
//    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::name('staff.')->group(function (){
        Route::get('/staff',[App\Http\Controllers\StaffController::class, 'index'])->name('staff');
        Route::get('/staff/action',[App\Http\Controllers\StaffController::class, 'action'])->name('staff_action');
        Route::post('/staff/create',[App\Http\Controllers\StaffController::class, 'create'])->name('staff_create');
        Route::get('/staff/info/{id}',[App\Http\Controllers\StaffController::class, 'info'])->name('staff_info');
        Route::get('/staff/edit_staff_content',[App\Http\Controllers\StaffController::class, 'edit_staff_content'])->name('edit_staff_content');
        Route::post('/staff/edit_staff_save',[App\Http\Controllers\StaffController::class, 'edit_staff_save'])->name('edit_staff_save');
        Route::post('/staff/create_profession',[App\Http\Controllers\StaffController::class, 'create_profession'])->name('create_profession');
        Route::get('/staff/profession_info',[App\Http\Controllers\StaffController::class, 'profession_info'])->name('profession_info');
    });
    Route::name('clients.')->group(function (){
        Route::get('/clients',[App\Http\Controllers\ClientController::class, 'index'])->name('clients');
        Route::get('/clients/action',[App\Http\Controllers\ClientController::class, 'action'])->name('clients_action');
        Route::post('/clients/create',[App\Http\Controllers\ClientController::class, 'create'])->name('clients_create');
        Route::get('/clients/info/{id}',[App\Http\Controllers\ClientController::class, 'info'])->name('clients_info');
        Route::get('/clients/edit_client_content',[App\Http\Controllers\ClientController::class, 'edit_client_content'])->name('edit_client_content');
        Route::get('/clients/edit_client_comment',[App\Http\Controllers\ClientController::class, 'edit_client_comment'])->name('edit_client_comment');
        Route::post('/clients/edit_client_save',[App\Http\Controllers\ClientController::class, 'edit_client_save'])->name('edit_client_save');
        Route::post('/clients/save_client_comment',[App\Http\Controllers\ClientController::class, 'save_client_comment'])->name('save_client_comment');
    });
    Route::name('tasks.')->group(function (){
        Route::get('/tasks/data/{id}',[App\Http\Controllers\TaskController::class, 'get'])->name('data');
        Route::resource('/tasks/task', \App\Http\Controllers\TaskController::class);
        Route::resource('/tasks/link', \App\Http\Controllers\LinkController::class);
        Route::get('/tasks',[App\Http\Controllers\TaskController::class, 'index'])->name('tasks');
        Route::get('/tasks/load_task',[App\Http\Controllers\TaskController::class, 'load_task'])->name('load_task');
        Route::get('/tasks/task_num',[App\Http\Controllers\TaskController::class, 'task_num'])->name('task_num');
        Route::get('/tasks/save_elem',[App\Http\Controllers\TaskController::class, 'save_elem'])->name('save_elem');
        Route::get('/tasks/add_task_staff',[App\Http\Controllers\TaskController::class, 'add_task_staff'])->name('add_task_staff');
        Route::get('/tasks/add_task_staff_body',[App\Http\Controllers\TaskController::class, 'add_task_staff_body'])->name('add_task_staff_body');
        Route::post('/tasks/add_task_file',[App\Http\Controllers\TaskController::class, 'add_task_file'])->name('add_task_file');
        Route::get('/tasks/add_task_checklist',[App\Http\Controllers\TaskController::class, 'add_task_checklist'])->name('add_task_checklist');
        Route::get('/tasks/add_task_checkbox',[App\Http\Controllers\TaskController::class, 'add_task_checkbox'])->name('add_task_checkbox');
        Route::get('/tasks/checked_task_checkbox',[App\Http\Controllers\TaskController::class, 'checked_task_checkbox'])->name('checked_task_checkbox');
        Route::post('/tasks/add_task_comment',[App\Http\Controllers\TaskController::class, 'add_task_comment'])->name('add_task_comment');
    });
    Route::name('projects.')->group(function (){
        Route::get('/projects',[App\Http\Controllers\ProjectController::class, 'index'])->name('projects');
        Route::get('/projects/action',[App\Http\Controllers\ProjectController::class, 'action'])->name('projects_action');
        Route::post('/projects/create',[App\Http\Controllers\ProjectController::class, 'create'])->name('projects_create');
        Route::get('/projects/view/{id}',[App\Http\Controllers\ProjectController::class, 'view'])->name('projects_view');
        Route::get('/projects/add_staff',[App\Http\Controllers\ProjectController::class, 'add_staff'])->name('add_staff');
        Route::get('/projects/add_stage',[App\Http\Controllers\ProjectController::class, 'add_stage'])->name('add_stage');
        Route::get('/projects/load_stage_left_bar',[App\Http\Controllers\ProjectController::class, 'load_stage_left_bar'])->name('load_stage_left_bar');
        Route::post('/projects/add_stage_csv',[App\Http\Controllers\ProjectController::class, 'add_stage_csv'])->name('add_stage_csv');
        Route::post('/projects/add_task_csv',[App\Http\Controllers\ProjectController::class, 'add_task_csv'])->name('add_task_csv');
        Route::get('/projects/add_step',[App\Http\Controllers\ProjectController::class, 'add_step'])->name('add_step');
        Route::post('/projects/create_element',[App\Http\Controllers\ProjectController::class, 'create_element'])->name('create_element');
        Route::get('/projects/task_view',[App\Http\Controllers\ProjectController::class, 'task_view'])->name('task_view');
        Route::get('/projects/pr_step_filter',[App\Http\Controllers\ProjectController::class, 'step_filter'])->name('pr_step_filter');
        Route::get('/projects/step_table_content',[App\Http\Controllers\ProjectController::class, 'step_table_content'])->name('step_table_content');
        Route::get('/projects/load_task_step',[App\Http\Controllers\ProjectController::class, 'load_task_step'])->name('load_task_step');
        Route::get('/projects/delete_pr_element',[App\Http\Controllers\ProjectController::class, 'delete_pr_element'])->name('delete_pr_element');
        Route::get('/projects/edit_project_content',[App\Http\Controllers\ProjectController::class, 'edit_project_content'])->name('edit_project_content');
        Route::get('/projects/edit_project_comment',[App\Http\Controllers\ProjectController::class, 'edit_project_comment'])->name('edit_project_comment');
        Route::get('/projects/edit_project_link',[App\Http\Controllers\ProjectController::class, 'edit_project_link'])->name('edit_project_link');
        Route::post('/projects/save_project_content',[App\Http\Controllers\ProjectController::class, 'save_project_content'])->name('save_project_content');
        Route::post('/projects/save_project_comment',[App\Http\Controllers\ProjectController::class, 'save_project_comment'])->name('save_project_comment');
        Route::post('/projects/save_project_link',[App\Http\Controllers\ProjectController::class, 'save_project_link'])->name('save_project_link');
    });
    Route::name('reports.')->group(function (){
        Route::get('/reports',[App\Http\Controllers\ReportController::class, 'index'])->name('reports');
        Route::get('/reports/report_costsStages',[App\Http\Controllers\ReportController::class, 'report_costsStages'])->name('report_costsStages');
    });
    Route::name('profile.')->group(function (){
        Route::get('/profile',[App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    });
});

