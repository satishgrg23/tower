<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

class LoginController extends Controller
{
    //
	public function create(){
    	return view('authentication.login');
    }

    public function validateUser(Request $request){
    	if ($user = Sentinel::authenticate($request->all())){
            if (Sentinel::getUser()->roles()->first()->slug == 'admin') {
                return redirect('admin/dashboard');
            }elseif (Sentinel::getUser()->roles()->first()->slug == 'user'){
                return redirect('user/dashboard');
            }
        }else{
            \Session::flash('flash_msg','Credentials did not match');
    	    return redirect("/login");
        }

    }

    public function logout(){
    	Sentinel::logout();
    	return redirect('/login');
    }
}
