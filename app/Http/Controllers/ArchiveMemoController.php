<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ArchiveMemoController extends Controller
{
    public function memo()
    {
        $memos = \App\File::with('uploader')->whereExists(function($query) {
                $query->select(DB::raw(1))
                    ->from('files_access')
                    ->whereRaw('files_access.user_id = '.Auth::id().' AND files_access.file_id = files.id');
            })->where('file_category_id', '2')->get();

        //dd($archives);

        return view('archives.list-memo', ['memos' => $memos->toArray()]);
    }

    public function create_memo()
    {
    	$penerima = \App\Role::with('sub_roles')->with('sub_roles.users')->get();

    	$file_category = \App\File_category::all();

    	//dd($penerima->toArray());
    	
    	return view('archives.add-memo', ['penerima' => $penerima, 'file_category' => $file_category]);
    }

    public function store_memo(Request $request)
    {

    	$validatedData = $request->validate([
    		'archive' => 'file',
            'description' => 'required',
    		'nomor_surat' => 'required',
    		'hak_akses' => 'required',
    		'title' => 'required'
    	]);

    	try {
    		DB::beginTransaction();

    		$path = $request->archive->storeAs('Archives/Memo', $request->input('title').'_'.time().'.'.$request->archive->getClientOriginalExtension(), 'public');

    		$file = \App\File::create([
    			'nomor_surat' => $request->input('nomor_surat'),
    			'title' => $request->input('title'),
    			'location' => $path,
                'description' => $request->input('description'),
    			'file_category_id' => 2,
    			'uploader' => Auth::id(),
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
            echo 'Message : '.$e->getMessage();
    	}

        return redirect()->route('memo');
    }

    public function edit($id)
    {
        $archive = \App\File::find($id);

        return view('archives.edit-memo', ['archive' => $archive]);
    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'nomor_surat' => 'required',
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
            echo "Message : ".$e->getMessage();
        }
        return redirect()->route('memo');
    }
}
