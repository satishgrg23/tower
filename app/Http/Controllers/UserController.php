<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use DB;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $users= DB::table('users')->get();
        $users = DB::table('users')
            ->join('role_users', 'users.id', '=', 'role_users.user_id')
            ->join('roles', 'role_users.role_id', '=', 'roles.id')
            ->select('users.*', 'role_users.user_id', 'roles.name')
            ->get();
        return view('admin.users.index')->with('users', $users);
    }

    public function create(){
        $roles = DB::table('roles')->get();
        return view('admin.users.create')->with('roles', $roles);
    }

    public function store(Request $request){
        $user = Sentinel::registerAndActivate($request->all());
        $role = Sentinel::findRoleById($request->role);
        $role->users()->attach($user);
        \Session::flash('flash_msg','User added successfully');
        return redirect('admin/users');
    }

    public function editProfile(){
        // $roles = DB::table('roles')->get();
        // return view('admin.users.create')->with('roles', $roles);
    }

    public function changePassword(){
        // $roles = DB::table('roles')->get();
        // return view('admin.users.create')->with('roles', $roles);
    }
}
