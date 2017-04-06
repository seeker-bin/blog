<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    
    public function doUpload(Request $request){
    	$file = $request->file('Filedata');
        if($file->isValid()){
            //上传文件的后缀.
            $entension = $file -> getClientOriginalExtension();
            $newName = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path = $file -> move(base_path().'/public/uploads',$newName);

            $filePath = '/uploads/'.$newName;
            return $filePath;
        }
    }
}
