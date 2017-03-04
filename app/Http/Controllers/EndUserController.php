<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\User;
use DB;
use Illuminate\Support\Facades\Hash;

class EndUserController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('user');
    //     $this->middleware('admin');
    // }

    public function index(){
        return view('user.index');
    }

    public function profile(){
    	$id = Sentinel::getUser()->id;
    	$user = DB::table('users')
            ->join('role_users', 'users.id', '=', 'role_users.user_id')
            ->join('roles', 'role_users.role_id', '=', 'roles.id')
            ->where('users.id', $id)
            ->select('users.*', 'role_users.user_id', 'roles.name')
            ->first();
        return view('profile.index')->with('user', $user);
    }

    // public function editProfile(){
    //     return view('profile.edit');
    // }

    public function changePassword(){
        return view('profile.changePassword');
    }

    public function updatePassword(Request $request, $id){
        $hasher = Sentinel::getHasher();

        $oldPassword = $request->old_password;
        $password = $request->password;
        $users = Sentinel::getUser();
        if ($hasher->check($oldPassword, $users->password)) {
            Sentinel::update($users, array('password' => $password));
            \Session::flash('flash_msg', 'Password changed successfully');
            $id = Sentinel::getUser()->id;
            $user = DB::table('users')
            ->join('role_users', 'users.id', '=', 'role_users.user_id')
            ->join('roles', 'role_users.role_id', '=', 'roles.id')
            ->where('users.id', $id)
            ->select('users.*', 'role_users.user_id', 'roles.name')
            ->first();
            return view('profile.index')->with('user', $user);

        }else{
            \Session::flash('flash_msg', 'Old Password did not matched.');
            return view('profile.changePassword');
        }
    }
}
