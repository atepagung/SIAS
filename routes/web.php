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

Route::get('/', 'HomeController@index')->middleware('auth', 'checkRole');

Auth::routes();

Route::get('regis', 'HomeController@regis')->name('regis');

Route::get('/logout' , 'Auth\LoginController@logout')->name('logout')->middleware('auth', 'checkRole');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth', 'checkRole');

Route::prefix('mail')->group(function() {
	Route::get('/create', 'MailController@createMail')
		->middleware('auth', 'checkRole'); //menampilkan page send mail
	Route::get('/create/{id}', 'MailController@createFileMail')
		->middleware('auth', 'checkRole'); //menampilkan page send File mail
	Route::post('/', 'MailController@sendMail')
		->middleware('auth', 'checkRole'); //send mail
	Route::get('/pesan-masuk', 'MailController@pesan_masuk')
		->middleware('auth', 'checkRole'); //pesan masuk
	Route::get('/pesan-keluar', 'MailController@pesan_keluar')
		->name('pesan-keluar')
		->middleware('auth', 'checkRole'); //pesan keluar
	Route::get('/detail-mail/{id}', 'MailController@detailMail')
		->middleware('auth', 'checkRole'); //menampilkan page detail mail
	//Route::delete('/', 'MailController@deleteSomeMail'); //hapus mail
	//Route::get('/mark', 'MailController@markSomeMail'); //mark mail
	//Route::get('/unmark', 'MailController@unmarkSomeMail'); //unmark mail
	//Route::delete('/{id}', 'MailController@deleteMail'); //hapus mail spesifik
	//Route::get('/reply/{id}', 'MailController@reply'); //menampilkan page balas mail
	//Route::post('/reply/{id}', 'MailController@store_reply'); //balas mail
});

Route::prefix('archive')->group(function() {
	Route::delete('/delete/{id}', 'ArchiveController@delete_archive')
		->middleware('checkAccess', 'auth', 'checkRole'); //menghapus arsip
	Route::get('/download/{id}', 'ArchiveController@download_archive')
		->middleware('checkAccess', 'auth', 'checkRole'); //download arsip
	Route::get('view/{id}', 'ArchiveController@view')
		->middleware('checkAccess', 'auth', 'checkRole');
});

Route::prefix('archive/surat-masuk')->group(function() {
	Route::get('/', 'ArchiveMasukController@surat_masuk')
		->name('surat-masuk')
		->middleware('auth', 'checkRole'); //lihat semua arsip
	Route::get('/add', 'ArchiveMasukController@create_surat_masuk')
		->middleware('auth', 'checkRole'); //menampilkan page tambah arsip surat masuk
	Route::post('/', 'ArchiveMasukController@store_surat_masuk')
		->middleware('auth', 'checkRole'); //menambah arsip
	Route::get('/{id}/edit', 'ArchiveMasukController@edit')
		->middleware('checkAccess', 'auth', 'checkRole'); //menampilkan page edit arsip
	Route::patch('/{id}', 'ArchiveMasukController@update')
		->middleware('checkAccess', 'auth', 'checkRole'); //edit arsip
});

Route::prefix('archive/surat-keluar')->group(function() {
	Route::get('/', 'ArchiveKeluarController@surat_keluar')
		->name('surat-keluar')
		->middleware('auth', 'checkRole'); //lihat semua arsip
	Route::get('/add', 'ArchiveKeluarController@create_surat_keluar')
		->middleware('auth', 'checkRole'); //menampilkan page tambah arsip surat masuk
	Route::post('/', 'ArchiveKeluarController@store_surat_keluar')
		->middleware('auth', 'checkRole'); //menambah arsip
	Route::get('/{id}/edit', 'ArchiveKeluarController@edit')
		->middleware('checkAccess', 'auth', 'checkRole'); //menampilkan page edit arsip
	Route::patch('/{id}', 'ArchiveKeluarController@update')
		->middleware('checkAccess', 'auth', 'checkRole'); //edit arsip
});

Route::prefix('archive/memo')->group(function() {
	Route::get('/', 'ArchiveMemoController@memo')
		->name('memo')
		->middleware('auth', 'checkRole'); //lihat semua arsip
	Route::get('/add', 'ArchiveMemoController@create_memo')
		->middleware('auth', 'checkRole'); //menampilkan page tambah arsip surat masuk
	Route::post('/', 'ArchiveMemoController@store_memo')
		->middleware('auth', 'checkRole'); //menambah arsip
	Route::get('/{id}/edit', 'ArchiveMemoController@edit')
		->middleware('checkAccess', 'auth', 'checkRole'); //menampilkan page edit arsip
	Route::patch('/{id}', 'ArchiveMemoController@update')
		->middleware('checkAccess', 'auth', 'checkRole'); //edit arsip
});

Route::prefix('admin')->group(function() {
	Route::get('/users', 'AdminController@show_users')
		->name('users')
		->middleware('auth', 'checkRole'); //lihat semua user
	Route::get('/change-role/{id}', 'AdminController@edit_role')
		->middleware('auth', 'checkRole'); //view change role
	Route::patch('/update-role/{id}', 'AdminController@update_role')
		->middleware('auth', 'checkRole'); //update role
	Route::patch('/update-password/{id}', 'AdminController@update_password')
		->middleware('auth', 'checkRole'); //update password
	Route::delete('/delete/{id}', 'AdminController@delete_user')
		->middleware('auth', 'checkRole'); //delete user
	Route::get('/view-roles', 'AdminController@view_roles')
		->name('roles')
		->middleware('auth', 'checkRole'); //view change role
	Route::get('/view-sub-roles', 'AdminController@view_sub_roles')
		->name('sub_roles')
		->middleware('auth', 'checkRole'); //view change role
	Route::get('/create-role', 'AdminController@create_role')
		->middleware('auth', 'checkRole'); //view create role
	Route::post('/create-role', 'AdminController@store_role')
		->middleware('auth', 'checkRole'); //store role
	Route::get('/create-sub-role', 'AdminController@create_sub_role')
		->middleware('auth', 'checkRole'); //view create sub role
	Route::post('/create-sub-role', 'AdminController@store_sub_role')
		->middleware('auth', 'checkRole'); //store sub role
});

Route::prefix('kode-surat')->group(function() {
	Route::get('all', 'CodeSuratController@index')
		->name('code-surat')
		->middleware('auth', 'checkRole');
	Route::get('add', 'CodeSuratController@add')
		->middleware('auth', 'checkRole');
	Route::post('add', 'CodeSuratController@store')
		->middleware('auth', 'checkRole');
	Route::get('edit/{id}', 'CodeSuratController@edit')
		->middleware('auth', 'checkRole');
	Route::patch('edit/{id}', 'CodeSuratController@update')
		->middleware('auth', 'checkRole');
	Route::delete('delete/{id}', 'CodeSuratController@destroy')
		->middleware('auth', 'checkRole');
});

use Illuminate\Http\Request;

Route::get('err', function (Request $request) {
	return view('archives.error-akses-file', ['pesan_error' => $request->session()->get('pesan_error'), 'title' => 'Pesan Error']);
})->name('err_access');

/*Route::get('testing', function () {
	try {
		DB::beginTransaction();

		$id = $mail_id = \App\Mail::create([
			'from' => Auth::id(),
			'subject' => 'wawas',
			'mail_category_id' => '1'
		]);

		DB::commit();
	} catch (Exception $e) {
		DB::rollBack();
		//echo "Message : ".$e->getMessage();
        $request->session()->flash('pesan_error', $e->getMessage());
        return redirect()->route('err_access');
	}	
});*/

/*Route::post('/testing', function(Request $request) { 
	$waw = $request->input('waha');
	return dd($waw['file']);
}); //testing*/

/*Route::get('/getFile', function () {
	return asset('storage/Archives/a.jpg');
	//return response()->download(storage_path('app/Archives/b.pdf'));
});*/