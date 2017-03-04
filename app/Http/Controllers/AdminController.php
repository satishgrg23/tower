<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TowerReport;
use App\Events\NotificationSystem;
use Excel;
use Zipper;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        return view('admin.index');
    }

    public function towerReport(){
        $towerReport = TowerReport::all();
        return view('admin.towerReport.index')->with('towerReport', $towerReport);
    }

    public function exportReport(){
        
        Excel::create('TowerReport', function($excel) {

            $excel->sheet('new', function($sheet) {
                $towerReport = TowerReport::all();
                $sheet->loadView('admin.towerReport.report')->with('towerReport', $towerReport);

            });

        })->export('xls');
               
    }

    public function viewTable(){
        $towerReport = TowerReport::all();
        return view('admin.towerReport.report')->with('towerReport', $towerReport);
    }

    public function exportPhotos(){
        $files = glob(public_path('uploads/reportImage/*'));
        $zip = Zipper::make('test.zip')->add($files);
        return response()->download(public_path('test.zip'));
        
    }

    public function exportSpecificPhoto($name){
        $files = glob(public_path('uploads/reportImage/'.$name));
        $zip = Zipper::make('test.zip')->add($files);
        return response()->download(public_path('test.zip'));
        
    }

    public function showDirectory(){
        // $directories = Storage::disk('local')->directories('uploads');
        $folder = [];
        $filesInFolder = \File::directories('uploads/reportImage');

        foreach($filesInFolder as $path)
        {
            $folder[] = pathinfo($path);
        }
        // dd($manuals);
        return view('admin.photos.index')->with('folder', $folder);
    }

    public function broadcast(){
        \Event::fire(new NotificationSystem('Satish'));
    }


}


