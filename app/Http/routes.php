<?php
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocStandardController;
use App\Http\Controllers\MeetingTypeController;
use App\Http\Controllers\MeetingAgendaController;
use App\Http\Controllers\MeetingDocumentController;
use App\Http\Controllers\PermissionController;
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
Route::get('test', function () {
    // Retrieve data from the database using the PDO object
    $pdo = DB::connection('oracle')->getPdo();
    $statement = $pdo->query('SELECT * FROM TBL_MEETING_DOC');
    $data = $statement->fetchAll();

    // Return the retrieved data as the response
    return response()->json($data);
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('Layouts.Admin');
})->name('admin');

Route::get('/Action', 'ActionController@index')->name('Action');
Route::get('/createaction', 'ActionController@create')->name('createaction.create');
Route::post('/createaction', 'ActionController@store')->name('createaction.store');
Route::get('/editaction/{id}', 'ActionController@edit')->name('editaction.edit');
Route::put('/updateaction/{id}', 'ActionController@update')->name('updateaction.update');
Route::get('/delete_action/{id}','ActionController@destroy')->name('delete_action.destroy');


Route::get('/meeting', 'MeetingTypeController@index')->name('meeting-types.index');
Route::get('/createmeeting', 'MeetingTypeController@create')->name('createmeeting.create');
Route::post('/storemeeting', 'MeetingTypeController@store')->name('createmeeting.store');
Route::get('/editmeeting/{id}', 'MeetingTypeController@edit')->name('editmeeting.edit');
Route::put('/updatemeeting/{id}', 'MeetingTypeController@update')->name('updatemeeting.update');
Route::get('/meeting-delete/{id}', 'MeetingTypeController@destroy')->name('meeting-delete.destroy');



Route::get('/doc-standards', 'DocStandardController@index')->name('doc.index');
Route::get('/createdoc', 'DocStandardController@create')->name('createdoc.create');
Route::post('/createdoc', 'DocStandardController@store')->name('createdoc.store');
Route::get('/editdoc/{id}', 'DocStandardController@edit')->name('editdoc.edit');
Route::put('/updatedoc/{id}', 'DocStandardController@update')->name('updatedoc.update');
Route::get('/delete/{id}','DocStandardController@destroy')->name('delete_doc.destroy');


Route::get('/meet', 'MeetingController@index')->name('meeting.index');
// Route::get('/meeting/{id}', 'MeetingController@show')->name('meeting.show');

Route::get('/meetingagenda', 'MeetingAgendaController@index')->name('meeting_agenda.index');
Route::get('/createmeeting_agenda', 'MeetingAgendaController@create')->name('createmeeting_agenda.create');
Route::post('/createmeeting_agenda', 'MeetingAgendaController@store')->name('createmeeting_agenda.store');
Route::get('/editmeeting_agenda/{id}', 'MeetingAgendaController@edit')->name('editmeeting_agenda.edit');
Route::put('/updatemeeting_agenda/{id}', 'MeetingAgendaController@update')->name('updatemeeting_agenda.update');
Route::get('/delete_agenda/{id}','MeetingAgendaController@destroy')->name('delete_agenda.destroy');
Route::get('/meeting_1/agenda/{id}', 'MeetingAgendaController@show')->name('meeting.agenda.show');

Route::get('/meetingdocument', 'MeetingDocumentController@index')->name('meeting_document.index');
Route::get('/permission', 'PermissionController@index')->name('permission.index');