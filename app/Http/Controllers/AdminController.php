<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class AdminController extends Controller
{
    public function show_users()
    {

    	$users = \App\User::with('sub_role')->with('sub_role.role')->get();

    	return view('admin.show-users', ['users' => $users, 'title' => 'Users']);
    }

    public function edit_role($id)
    {
    	$roles = \App\Role::with('sub_roles')->get();

    	$user = \App\User::find($id);

    	return view('admin.change-role', ['roles' => $roles, 'user' => $user, 'title' => 'Role']);
    }

    public function update_role($id, Request $request)
    {
		$validatedData = $request->validate([
			'role' => 'required'
		]);

		try {
			DB::beginTransaction();

			\App\User::find($id)->update(['sub_role_id' => $request->input('role')]);

			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			//echo "Message : ".$e->getMessage();
			$request->session()->flash('pesan_error', $e->getMessage());
            return redirect()->route('err_access');
		}

		return redirect()->route('users');
    }

    public function update_password($id, Request $request)
    {
    	$validatedData = $request->validate([
			'password' => 'required|string|min:6|confirmed',
		]);

		try {
			DB::beginTransaction();

			\App\User::find($id)->update(['password' => bcrypt($request->input('password'))]);

			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
			//echo "Message : ".$e->getMessage();
			$request->session()->flash('pesan_error', $e->getMessage());
            return redirect()->route('err_access');
		}

		return redirect()->route('users');
    }

    public function delete_user($id, Request $request)
    {
    	try {
    		DB::beginTransaction();

    		$user = \App\User::find($id);

            $user->delete();

    		DB::commit();
    	} catch (Exception $e) {
    		DB::rollback();
			//echo "Message : ".$e->getMessage();
			$request->session()->flash('pesan_error', $e->getMessage());
            return redirect()->route('err_access');
    	}

        return redirect()->route('users');
    }

    public function view_roles()
    {
        $roles = \App\Role::all();

        return view('admin.show-roles', ['roles' => $roles, 'title' => 'Role']);
    }

    public function view_sub_roles()
    {
        $sub_roles = \App\Sub_role::with('role')->get();

        return view('admin.show-sub-roles', ['sub_roles' => $sub_roles, 'title' => 'Sub_Role']);
    }

    public function create_role()
    {
        return view('admin.create-role');
    }

    public function store_role(Request $request)
    {
        $validatedData = $request->validate([
            'role' => 'required'
        ]);

        try {
            DB::beginTransaction();

            \App\Role::create(['title' => $request->input('role')]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();

            $request->session()->flash('pesan_error', $e->getMessage());
            return redirect()->route('err_access');
        }

        return redirect()->route('roles');
    }

    public function create_sub_role()
    {
        $roles = \App\Role::all();
        return view('admin.create-sub-role', ['roles' => $roles]);
    }

    public function store_sub_role(Request $request)
    {
        $validatedData = $request->validate([
            'role' => 'required',
            'sub_role' => 'required'
        ]);

        try {
            DB::beginTransaction();

            \App\Sub_role::create(['title' => $request->input('sub_role'), 'role_id' => $request->input('role')]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();

            $request->session()->flash('pesan_error', $e->getMessage());
            return redirect()->route('err_access');
        }

        return redirect()->route('sub_roles');
    }
}
