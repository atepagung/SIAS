<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ArchiveKeluarController extends Controller
{
    public function surat_keluar()
    {
        if (Auth::user()->sub_role->title == 'Administrator') {
            $lengkap = \App\File::with('uploader')->where('file_category_id', '3')->where('ket_surat_keluar_id', '1')->orderBy('created_at', 'desc')->get();

            $nomor = \App\File::with('uploader')->where('file_category_id', '3')->where('ket_surat_keluar_id', '2')->orderBy('created_at', 'desc')->get();

            $review = \App\File::with('uploader')->where('file_category_id', '3')->where('ket_surat_keluar_id', '3')->orderBy('created_at', 'desc')->get();    
        }else {
            $lengkap = \App\File::with('uploader')->whereExists(function($query) {
                    $query->select(DB::raw(1))
                        ->from('files_access')
                        ->whereRaw('files_access.user_id = '.Auth::id().' AND files_access.file_id = files.id');
                })->where('file_category_id', '3')->where('ket_surat_keluar_id', '1')->orderBy('created_at', 'desc')->get();

            $nomor = \App\File::with('uploader')->whereExists(function($query) {
                    $query->select(DB::raw(1))
                        ->from('files_access')
                        ->whereRaw('files_access.user_id = '.Auth::id().' AND files_access.file_id = files.id');
                })->where('file_category_id', '3')->where('ket_surat_keluar_id', '2')->orderBy('created_at', 'desc')->get();

            $review = \App\File::with('uploader')->whereExists(function($query) {
                    $query->select(DB::raw(1))
                        ->from('files_access')
                        ->whereRaw('files_access.user_id = '.Auth::id().' AND files_access.file_id = files.id');
                })->where('file_category_id', '3')->where('ket_surat_keluar_id', '3')->orderBy('created_at', 'desc')->get();
        }

        //dd($review->toArray());

        return view('archives.list-surat-keluar', ['lengkap' => $lengkap->toArray(), 'nomor' => $nomor->toArray(), 'review' => $review->toArray(), 'title' => 'Arsip Keluar']);
    }

    public function create_surat_keluar()
    {
    	$penerima = \App\Role::with('sub_roles')->with('sub_roles.users')->get();

    	//$file_category = \App\File_category::all();
    	
    	$ket_surat_keluar = \App\Ket_surat_keluar::all();

    	//dd($penerima->toArray());
    	
    	return view('archives.add-surat-keluar', ['penerima' => $penerima, 'ket_surat_keluar' => $ket_surat_keluar, 'title' => 'Arsip Keluar']);
    }

    public function store_surat_keluar(Request $request)
    {
    	$validatedData = $request->validate([
    		'archive' => 'file',
            'description' => 'required',
    		'hak_akses' => 'required',
    		'title' => 'required',
    		'ket_surat_keluar' => 'required',
    	]);

    	try {
    		DB::beginTransaction();

    		if ($request->input('ket_surat_keluar') == 1) {
				$path = $request->archive->storeAs('Archives/Surat_Keluar/complete', $request->input('title').'_'.time().'.'.$request->archive->getClientOriginalExtension(), 'public');    			
    		}elseif ($request->input('ket_surat_keluar') == 2) {
    			$path = $request->archive->storeAs('Archives/Surat_Keluar/butuh_nomor', $request->input('title').'_'.time().'.'.$request->archive->getClientOriginalExtension(), 'public');
    		}else {
    			$path = $request->archive->storeAs('Archives/Surat_Keluar/review', $request->input('title').'_'.time().'.'.$request->archive->getClientOriginalExtension(), 'public');
    		}

    		$file = \App\File::create([
    			'nomor_surat' => $request->input('nomor_surat'),
    			'title' => $request->input('title'),
    			'location' => $path,
                'description' => $request->input('description'),
    			'file_category_id' => 3,
    			'uploader' => Auth::id(),
    			'ket_surat_keluar_id' => $request->input('ket_surat_keluar')
    		]);

    		//throw new Exception("testing", 1);

            \App\File_access::firstOrCreate(['user_id' => Auth::id(), 'file_id' => $file->id]);

    		foreach ($request->input('hak_akses') as $user) {
                \App\File_access::firstOrCreate(['user_id' => $user, 'file_id' => $file->id]);
    		}

    		DB::commit();
    	} catch (Exception $e) {
    		DB::rollBack();
    		Storage::disk('public')->delete($path);
            //echo 'Message : '.$e->getMessage();
            $request->session()->flash('pesan_error', $e->getMessage());
            return redirect()->route('err_access');
    	}

        return redirect()->route('surat-keluar');
    }

    public function edit($id)
    {
        $archive = \App\File::find($id);

        return view('archives.edit-surat-keluar', ['archive' => $archive, 'title' => 'Surat Keluar']);
    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        try {
            DB::beginTransaction();

            \App\File::where('id', $id)->update([
                'nomor_surat' => $request->input('nomor_surat'),
                'title' => $request->input('title'),
                'description' => $request->input('description')
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            //echo "Message : ".$e->getMessage();
            $request->session()->flash('pesan_error', $e->getMessage());
            return redirect()->route('err_access');
        }
        return redirect()->route('surat-keluar');
    }
}
