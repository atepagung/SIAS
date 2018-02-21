<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class CodeSuratController extends Controller
{
    public function index()
    {
    	$code_surat = \App\Code_surat::all();

    	return view('code-surat.list-code-surat', ['code_surat' => $code_surat, 'title' => 'Code Surat', 'red' => 'kode-surat']);
    }

    public function add()
    {
    	return view ('code-surat.add-code-surat', ['title' => 'Tambah Code Surat']);
    }

    public function store(Request $request)
    {
    	$validatedData = $request->validate([
    		'code' => 'required',
            'judul_naskah' => 'required',
    	]);

    	try {
    		DB::beginTransaction();

    		$code_surat = new \App\Code_surat;

    		$code_surat->code = $request->input('code');
    		$code_surat->judul_naskah = $request->input('judul_naskah');
    		
    		$code_surat->save();

    		DB::commit();
    	} catch (Exception $e) {
    		DB::rollBack();
            //echo 'Message : '.$e->getMessage();
            $request->session()->flash('pesan_error', $e->getMessage());
            return redirect()->route('err_access');
    	}

    	return redirect()->route('code-surat');
    }

    public function edit($id)
    {
    	$code_surat = \App\Code_surat::find($id);

    	return view('code-surat.edit-code-surat', ['code_surat' => $code_surat, 'title' => 'Edit Kode Surat']);
    }

    public function update(Request $request, $id)
    {
    	$validatedData = $request->validate([
    		'code' => 'required',
            'judul_naskah' => 'required',
    	]);

    	try {
    		DB::beginTransaction();

    		$code_surat = \App\Code_surat::find($id);

    		$code_surat->code = $request->input('code');
    		$code_surat->judul_naskah = $request->input('judul_naskah');
    		
    		$code_surat->save();

    		DB::commit();
    	} catch (Exception $e) {
    		DB::rollBack();
            //echo 'Message : '.$e->getMessage();
            $request->session()->flash('pesan_error', $e->getMessage());
            return redirect()->route('err_access');
    	}

    	return redirect()->route('code-surat');
    }

    public function destroy($id)
    {
    	try {
    		DB::beginTransaction();

    		$code_surat = \App\Code_surat::find($id);

    		$code_surat->delete();

    		DB::commit();
    	} catch (Exception $e) {
    		DB::rollBack();
            //echo 'Message : '.$e->getMessage();
            $request->session()->flash('pesan_error', $e->getMessage());
            return redirect()->route('err_access');
    	}

    	return redirect()->route('code-surat');
    }
}
