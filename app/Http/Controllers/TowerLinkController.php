<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Towerlink;
use App\User;
use App\TowerReport;
use App\Notification;
use Sentinel;
use DB;
use Carbon\Carbon;

class TowerLinkController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $tower = Towerlink::all();	
        return view('admin.towerlink.index')->with('tower', $tower);
    }

    public function create(){
        // $user = User::all();
        $user = DB::table('users')
            ->join('role_users', 'users.id', '=', 'role_users.user_id')
            ->join('roles', 'role_users.role_id', '=', 'roles.id')
            ->where('roles.slug','user')
            ->select('users.*', 'role_users.user_id', 'roles.name')
            ->get();
        return view('admin.towerlink.create')->with('user', $user);
    }

    public function store(Request $request){
        $towerlink = new Towerlink;
        $notification = new Notification;
        $id = DB::table('towerlinks')->max('id')+1;
        $user = Sentinel::findById($request->user_id);
        $user->permissions = $user->permissions+[
            'report.'.$id => true,
        ];
        $user->save();
        $towerlink->tower_link = $request->tower_link;
        $towerlink->user_id = $request->user_id;
        $notification->title = ("You have been assigned ".$request->tower_link." site.");
        $notification->created_at = (Carbon::now('Asia/Kathmandu'));
        $notification->save();
        $nid = DB::table('notifications')->max('id');
        $user->notification()->attach($nid);
        $towerlink->save();
    	\Session::flash('flash_msg','Towerlink added successfully');
        return redirect('admin/towerlink');
    }

    public function edit($id){
    	$towerlink = Towerlink::findOrFail($id);
    	$user = DB::table('users')
            ->join('role_users', 'users.id', '=', 'role_users.user_id')
            ->join('roles', 'role_users.role_id', '=', 'roles.id')
            ->where('roles.slug','user')
            ->select('users.*', 'role_users.user_id', 'roles.name')
            ->get();	
    	// return to 404 page
        if(!$towerlink){
          abort(404);
        }
    	return view('admin.towerlink.edit')->with('towerlink', $towerlink)->with('user', $user);

    }

    public function update(Request $request, $id){
    	$towerlink = Towerlink::findOrFail($id);
    	$towerlink->tower_link = $request->tower_link;
    	$towerlink->user_id = $request->user_id;
    	$towerlink->save();
    	\Session::flash('flash_msg','Towerlink updated successfully');
        return redirect('admin/towerlink');
    }

    public function destroy($id){
    	$towerlink = Towerlink::findOrFail($id);
    	$towerlink->delete();
    	\Session::flash('flash_msg','Towerlink deleted successfully');
        return redirect('admin/towerlink');
    }

    public function show($id){
        $towerReport = TowerReport::where('tower_link_id', $id)->get();  
        return view('admin.towerReport.show')->with('towerReport', $towerReport);
    }

}
