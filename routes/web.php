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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/logout' , 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('inbox')->group(function() {
	Route::get('/', 'InboxController@index'); //lihat semua inbox
	Route::get('/sorting', 'InboxController@sort'); //sorting mail
	Route::get('/search', 'InboxController@search'); //search mail
});

Route::prefix('outbox')->group(function() {
	Route::get('/', 'OutboxController@index'); //lihat semua outbox
	Route::get('/sorting', 'OutboxController@sort'); //sorting mail
	Route::get('/search', 'OutboxController@search'); //search mail
});

Route::prefix('mail')->group(function() {
	Route::get('/create', 'MailController@createMail'); //menampilkan page send mail
	Route::post('/', function() { return "haha"; }); //send mail
	Route::delete('/', 'MailController@deleteSomeMail'); //hapus mail
	Route::get('/mark', 'MailController@markSomeMail'); //mark mail
	Route::get('/unmark', 'MailController@unmarkSomeMail'); //unmark mail
	Route::delete('/{id}', 'MailController@deleteMail'); //hapus mail spesifik
	Route::get('/{id}', function() { return "haha"; }); //lihat detail mail
	Route::get('/{id}/reply', function() { return "haha"; }); //menampilkan page balas mail
	Route::post('/{id}/reply', function() { return "haha"; }); //balas mail
	Route::get('/{id}/forward', function() { return "haha"; }); //menampilkan page forward mail
	Route::post('/{id}/forward', function() { return "haha"; }); //forward mail
});

Route::prefix('archive')->group(function() {
	//Route::get('/add/surat-keluar', 'ArchiveController@create_surat_keluar'); //menampilkan page tambah arsip surat keluar
	//Route::get('/add/memo', 'ArchiveController@create_memo'); //menampilkan page tambah arsip memo
	//Route::post('/memo', 'ArchiveController@store_surat_masuk'); //menambah arsip
	Route::get('/search', function() { return "haha"; }); //searching arsip
	//Route::get('/{id}', 'ArchiveController@show'); //melihat detail arsip
	//Route::get('/{id}/edit', function() { return "haha"; }); //menampilkan page edit arsip
	//Route::patch('/{id}', function() { return "haha"; }); //edit arsip
	Route::delete('/delete/{id}', 'ArchiveController@delete_archive')->middleware('checkAccess'); //menghapus arsip
	Route::get('/download/{id}', 'ArchiveController@download_archive')->middleware('checkAccess'); //download arsip
	Route::get('view/{id}', 'ArchiveController@view')->middleware('checkAccess');
});

Route::prefix('archive/surat-masuk')->group(function() {
	Route::get('/', 'ArchiveMasukController@surat_masuk')->name('surat-masuk'); //lihat semua arsip
	Route::get('/add', 'ArchiveMasukController@create_surat_masuk'); //menampilkan page tambah arsip surat masuk
	Route::post('/', 'ArchiveMasukController@store_surat_masuk'); //menambah arsip
	Route::get('/search', function() { return "haha"; }); //searching arsip
	Route::get('/{id}/edit', 'ArchiveMasukController@edit')->middleware('checkAccess'); //menampilkan page edit arsip
	Route::patch('/{id}', 'ArchiveMasukController@update')->middleware('checkAccess'); //edit arsip
	//Route::delete('/{id}', function() { return "haha"; }); //menghapus arsip
});

Route::prefix('archive/surat-keluar')->group(function() {
	Route::get('/', 'ArchiveKeluarController@surat_keluar')->name('surat-keluar'); //lihat semua arsip
	Route::get('/add', 'ArchiveKeluarController@create_surat_keluar'); //menampilkan page tambah arsip surat masuk
	Route::post('/', 'ArchiveKeluarController@store_surat_keluar'); //menambah arsip
	Route::get('/search', function() { return "haha"; }); //searching arsip
	Route::get('/{id}/edit', 'ArchiveKeluarController@edit')->middleware('checkAccess'); //menampilkan page edit arsip
	Route::patch('/{id}', 'ArchiveKeluarController@update')->middleware('checkAccess'); //edit arsip
	//Route::delete('/{id}', function() { return "haha"; }); //menghapus arsip
});

Route::prefix('archive/memo')->group(function() {
	Route::get('/', 'ArchiveMemoController@memo')->name('memo'); //lihat semua arsip
	Route::get('/add', 'ArchiveMemoController@create_memo'); //menampilkan page tambah arsip surat masuk
	Route::post('/', 'ArchiveMemoController@store_memo'); //menambah arsip
	Route::get('/search', function() { return "haha"; }); //searching arsip
	Route::get('/{id}/edit', 'ArchiveMemoController@edit')->middleware('checkAccess'); //menampilkan page edit arsip
	Route::patch('/{id}', 'ArchiveMemoController@update')->middleware('checkAccess'); //edit arsip
	//Route::delete('/{id}', function() { return "haha"; }); //menghapus arsip
});

Route::prefix('admin')->group(function() {
	Route::get('/', 'ArchiveMemo@index'); //lihat semua arsip
	Route::get('/add', 'ArchiveController@create'); //menampilkan page tambah arsip
	Route::post('/', 'ArchiveController@store'); //menambah arsip
	Route::get('/search', function() { return "haha"; }); //searching arsip
	Route::get('/{id}', 'ArchiveController@show'); //melihat detail arsip
	Route::get('/{id}/edit', function() { return "haha"; }); //menampilkan page edit arsip
	Route::patch('/{id}', function() { return "haha"; }); //edit arsip
	Route::delete('/{id}', function() { return "haha"; }); //menghapus arsip
	Route::get('/{id}/download', function() { return "haha"; }); //download arsip
});

Route::get('err', function () {
	return view('archives.error-akses-file');
})->name('err_access');


use Illuminate\Http\Request;

Route::get('/testing', function() { return view('testing.testing_file_up'); }); //testing
Route::post('/testing', function(Request $request) { 
	$waw = $request->input('waha');
	return dd($waw['file']);
}); //testing

Route::get('/testing-penerima', function () {
	$penerima = \App\Role::with('sub_roles')->with('sub_roles.users')->get();

	dd($penerima->toArray());
});

Route::get('/getFile', function () {
	return asset('storage/Archives/a.jpg');
	//return response()->download(storage_path('app/Archives/b.pdf'));
});

Route::get('/storage/Archives/{id}', function ($id) {
	return $id;
});

Route::get('/test-modal', function () {
	return view('layouts.modal_delete');
});