<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ArchiveController extends Controller
{

    /*public function create_surat_keluar()
    {
        $penerima = \App\Role::with('sub_roles')->with('sub_roles.users')->get();

        $file_category = \App\File_category::all();

        //dd($penerima->toArray());
        
        return view('archives.new-archive');
    }*/

    public function download_archive($id)
    {
        $path = \App\File::find($id);
        return response()->download(storage_path('app/public/'.$path->location));;
    }

    public function delete_archive($id, Request $request)
    {

        $file = \App\File::find($id);

        try {
            DB::beginTransaction();

            DB::table('files_access')->where('file_id', $id)->delete();

            \App\File::where('id', $id)->delete();

            DB::commit();

            Storage::disk('public')->delete($file->location);
        } catch (Exception $e) {
            DB::rollBack();
            //echo 'Message : '.$e->getMessage();
            $request->session()->flash('pesan_error', $e->getMessage());
            return redirect()->route('err_access');
        }

        return redirect()->route($request->input('redirect'));
    }

    public function view($id)
    {
        $archive = \App\File::find($id);

        return view('archives.view-archive', ['archive' => $archive, 'title' => 'Arsip']);
    }

}
