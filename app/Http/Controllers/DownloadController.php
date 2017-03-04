<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\Download;


class DownloadController extends Controller
{
    //
	public function __construct(){
		$this->middleware('admin')->only('create');
	}

    public function index(){
    	$downloads = Download::all();
    	return view('downloads.index')->with('downloads', $downloads);
    }

    public function create(){
    	return view('downloads.create');
    }

    public function store(Request $request){
    	if ($request->hasFile('download_file')) {
            //Get the tmp and orginal name of file
            $fileTempName = $request->file('download_file');
            $fileName = $request->file('download_file')->getClientOriginalName();
            //Rename file name
            $finalfileName  = time() . '.' . $fileName;
            //Provide the destination path and Move it to the folder
            $path = public_path() . '/uploads/files/';
            $res=$fileTempName->move($path , $finalfileName);
            $download=new Download();
            $download->name = $request->name;
            $download->file = $finalfileName;
            $download->save();
            \Session::flash('flash_msg','Download file is successfully added!');
            return redirect('/downloads');
        }else{
            \Session::flash('flash_msg','Please upload the file!');
            return redirect('/downloads');
        }

    }

    public function destroy($id){
    	$downloads = Download::findOrFail($id);

        $myfile=public_path('uploads/files/'.$downloads->file);
        if (file_exists($myfile)){
          unlink($myfile);
          $downloads->delete();
          \Session::flash('flash_msg','Download File is successfully deleted!');
          return redirect('/downloads');   
        }else{
          $downloads->delete();
          \Session::flash('flash_msg','Download File is successfully deleted!');
          return redirect('/downloads');
        }
    }

    public function downloadFile($file){

        $file_path= public_path(). "/uploads/files/".$file;
        if (file_exists($file_path)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file_path).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file_path));
            readfile($file_path);
        exit;
        }

    }
}
