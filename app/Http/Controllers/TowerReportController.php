<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Towerlink;
use App\TowerReport;
use App\Notification;
use Carbon\Carbon;
use Sentinel;
use DB;

class TowerReportController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('user');
        // $this->middleware('admin');
    }

    public function index(){
        $user_id= Sentinel::getUser()->id;
        $towerlink =Towerlink::where('user_id', $user_id)->get();
        return view('user.towerReport.index')->with('towerlink', $towerlink);
    }

   public function create(Request $request){
        //Geting parament
        $tower_link_id = $request->id;
        $site_id = $request->site_id;
        //Getting current user
        $user_id= Sentinel::getUser()->id;
        $user = Sentinel::findById($user_id);

        //Checking if the user has premission to the given report or not
        if ($user->hasAccess(['report.'.$tower_link_id]))
        {
            // Execute this code if the user has permission
            //Getting the data of the current report 
            $data = DB::table('tower_reports')
            ->where('site_id', $site_id)
            ->where('tower_link_id', $tower_link_id)
            ->first();
            //Checking if user has already created this report or not
            if(count($data)== 0){
                //Redirect to create page if user has not created the report
                $towerlink = Towerlink::findOrFail($tower_link_id);
                return view('user.towerReport.create')->with('site_id', $site_id)->with('towerlink', $towerlink);
            }else{
                //Redirect to edit page if user has created the report
                $towerlink = Towerlink::findOrFail($tower_link_id);
                return view('user.towerReport.edit')->with('site_id', $site_id)->with('towerlink', $towerlink)->with('data', $data);
            }
        }
        else
        {
            // Execute this code if the permission check failed
            return view('user.towerReport.error');
        }
         
   }

   public function store(Request $request){

        $notification = new Notification;
        $id = $request->tower_link_id;
        $user_id= Sentinel::getUser()->id;
        $username= Sentinel::getUser()->full_name;
        $user = Sentinel::findById($user_id);
        if ($user->hasAccess(['report.'.$id]))
        {
            // Execute this code if the user has permission
            $data = $request->all();
            $image_array = ['rsl_image','llvd_image','rod_installation_image','odu_grounding_image','poe_grounding_image',
            'secure_cable_image','duct_pipe_image','cable_routing_image','cable_tied_image','cable_taped_image','hose_clamp_image','levelling_image','marking_image','check_atn_image','mw_attena_image'];
            $length = count($image_array);
            for( $i=0; $i<$length; $i++){
                if ($request->hasFile($image_array[$i])) {
                    //Get the tmp and orginal name of image
                    $imageTempName = $request->file($image_array[$i]);
                    $imageName = $request->file($image_array[$i])->getClientOriginalName();
                    //Rename image name
                    $finalImageName  =  $data['site_id'].'-'.$image_array[$i].'.'.\File::extension($imageName);
                    //Provide the destination path and Move it to the folder
                    $path = public_path() . '/uploads/reportImage/'.$data['tower_link']."/".$data['site_id']."/";
                    $res=$imageTempName->move($path , $finalImageName);    
                    $data[$image_array[$i]] = $finalImageName;
                }
            }
            $notification->title = ($username." has added ".$request->tower_link." site.");
            $notification->created_at = (Carbon::now('Asia/Kathmandu'));
            $notification->save();
            $nid = DB::table('notifications')->max('id');
            $role = Sentinel::findRoleBySlug('admin');
            foreach ($role->users as $key => $user) {
                # code...
                $user->notification()->attach($nid);
            }
            $towerReport = TowerReport::create($data);
            \Session::flash('flash_msg','Tower Report submitted successfully');
            $user_id= Sentinel::getUser()->id;
            $towerlink =Towerlink::where('user_id', $user_id)->get();
            return view('user.towerReport.index')->with('towerlink', $towerlink);
        }
        else
        {
            // Execute this code if the permission check failed
           return view('user.towerReport.error');
        }

                          
   }

   public function show($id){
        $user_id= Sentinel::getUser()->id;
        $user = Sentinel::findById($user_id);
        if ($user->hasAccess(['report.'.$id]))
        {
            $site = DB::table('towerlinks')->where('id', $id)->pluck('tower_link')->first();
            $site_id = explode('_', $site);
            $tower_link_id= $id;
            return view('user.towerReport.option')->with('site_id', $site_id)->with('tower_link_id', $tower_link_id);
        }
        else
        {
            // Execute this code if the permission check failed
           return view('user.towerReport.error');
        }
   }

    public function view($id){
        $id = $id;
        $user_id= Sentinel::getUser()->id;
        $user = Sentinel::findById($user_id);
        if ($user->hasAccess(['report.'.$id]))
        {   
            $towerReport = TowerReport::where('tower_link_id', $id)->get();
            return view('user.towerReport.view')->with('towerReport', $towerReport);
        }
        else
        {
            // Execute this code if the permission check failed
           return view('user.towerReport.error');
        }
    }

    public function edit($id){
        $user_id= Sentinel::getUser()->id;
        $user = Sentinel::findById($user_id);
        if ($user->hasAccess(['report.'.$id]))
        {
            $site = DB::table('towerlinks')->where('id', $id)->pluck('tower_link')->first();
            $site_id = explode('_', $site);
            $towerlink = Towerlink::findOrFail($id);
            $towerReport = TowerReport::where('tower_link_id', $id)->get();
            return view('user.towerReport.edit')->with('towerReport', $towerReport)->with('site_id', $site_id)->with('towerlink',$towerlink);
        }
        else
        {
            // Execute this code if the permission check failed
           return view('user.towerReport.error');
        }
    }

    public function update(Request $request, $id){    
        $report_id = $id;
        $user_id= Sentinel::getUser()->id;
        $user = Sentinel::findById($user_id);
        if ($user->hasAccess(['report.'.$request->tower_link_id]))
        {
            // Execute this code if the user has permission
            $data = $request->all();
            $image_array = ['rsl_image','llvd_image','rod_installation_image','odu_grounding_image','poe_grounding_image','secure_cable_image','duct_pipe_image','cable_routing_image','cable_tied_image','cable_taped_image','hose_clamp_image','levelling_image','marking_image','check_atn_image','mw_attena_image'];
            $image_array_old = ['rsl_image_old','llvd_image_old','rod_installation_image_old','odu_grounding_image_old','poe_grounding_image_old','secure_cable_image_old','duct_pipe_image_old','cable_routing_image_old','cable_tied_image_old','cable_taped_image_old','hose_clamp_image_old','levelling_image_old','marking_image_old','check_atn_image_old','mw_attena_image_old'];

            $length = count($image_array);
            for( $i=0; $i<$length; $i++){
                if ($request->hasFile($image_array[$i])) {
                    if ($request->hasFile($image_array_old[$i])){
                        $oldImage = public_path('img/'.$data[$image_array_old[$i]]);
                        if (file_exists($oldImage)){
                            unlink($oldImage);
                        }
                    }
                    //Get the tmp and orginal name of image
                    $imageTempName = $request->file($image_array[$i]);
                    $imageName = $request->file($image_array[$i])->getClientOriginalName();

                    //Rename image name
                    $finalImageName  =  $data['site_id'].'-'.$image_array[$i].'.'.\File::extension($imageName);
                    //Provide the destination path and Move it to the folder
                    $path = public_path() . '/uploads/reportImage/'.$data['tower_link']."/".$data['site_id']."/";
                    $res=$imageTempName->move($path , $finalImageName);    
                    $data[$image_array[$i]] = $finalImageName;
                }
            }
            $towerReport = TowerReport::findOrFail($report_id);
            
            // $notification->title = ($username." has updated ".$request->tower_link." site.");
            // $notification->created_at = (Carbon::now('Asia/Kathmandu'));
            // $notification->save();
            // $nid = DB::table('notifications')->max('id');
            // $role = Sentinel::findRoleBySlug('admin');
            // foreach ($role->users as $key => $user) {
            //     # code...
            //     $user->notification()->attach($nid);
            // }

            $towerReport->update($data);
            \Session::flash('flash_msg','Tower Report updated successfully');
            $user_id= Sentinel::getUser()->id;
            $towerlink =Towerlink::where('user_id', $user_id)->get();
            return view('user.towerReport.index')->with('towerlink', $towerlink);
        }
        else
        {
            // Execute this code if the permission check failed
           return view('user.towerReport.error');
        }
            
    }
           
}
