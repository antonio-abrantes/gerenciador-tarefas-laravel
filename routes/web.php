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



Route::group(['middleware' => ['alerttasks', 'auth']], function (){

    Route::view('/', 'welcome');

    Route::get('/clients/photo/{client}', 'ExtraActions\ClientPhotoDownload')->name('clients.photo_download');

    Route::get('/clients/pdf', 'ExtraActions\ClientPdf');

    Route::post('/tasks/search', 'ExtraActions\TaskSearch');

    Route::resource('clients', 'ClientController');

    Route::resource('projects', 'ProjectsController');

    Route::resource('tasks', 'TaskController');

//    Route::get('clients', 'ClientController@index')->name('clients.index');
//    Route::get('clients/{client}', 'ClientController@show')->name('clients.show');

    Route::get('tasks/todo/list', 'ToDoTasksController@index')->name('tasks.todo_index');
    Route::get('tasks/todo/made/{id}', 'ToDoTasksController@made')->name('tasks.todo_made');
    Route::get('tasks/add/{id}', 'ToDoTasksController@store')->name('tasks.add');
    Route::get('tasks/delete/{id}', 'ToDoTasksController@destroy')->middleware('checktasks')->name('tasks.todo_destroy');

    Route::post('tasks/project/attach/{task}', 'TaskProjectController@attach')->name('tasks.project_attach');
    Route::get('tasks/project/detach/{task}/{project_id}', 'TaskProjectController@detach')->name('tasks.project_detach');

});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('clients', 'ClientController', ['only'=>[
//    'index',
//    'create',
//    'store',
//    'edit',
//    'show',
//    'update'
//]]);

//Route::redirect('clientes', 'clients/create/new', 301);

//Agrupando rotas
//Route::prefix('/clients')->group(function (){
//
//    //Sem usar controllers
//    /*Route::get('/', function () {
//        //return "<h1>Teste</h1>".dd(Route::current()->uri);
//    })->name('clients.list');*/
//
//    //Usando controllers
//    Route::get('/', 'ClientController@index')->name('clients.list');
//
//    Route::get('/create/new', 'ClientController@create');
//
//    Route::post('/save', 'ClientController@save')->name('clients.save');
//
//    Route::get('/edit/{id}/{name}', 'ClientController@edit')->name('clients.edit');
//
//});
