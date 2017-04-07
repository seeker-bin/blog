<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Code\CodeController;
use App\Http\Models\User;
use Illuminate\Support\Facades\Crypt;

class AdminController extends Controller{
    
    public function index(){
    	return view('admin.index');
    }


    public function info(){
    	return view('admin.info');
    }


    public function login(Request $request){
    	if($input = $request->all()){
    		$code = new CodeController();
    		$_code = $code->get('lcode');
    		if(strtoupper($input['code']) == $_code){
    			$user = User::first();
    			if($user->username != $input['username'] || Crypt::decrypt($user->password) != $input['password']){
    				return back()->with('msg', '用户名或密码错误！');
    			}
    			session(['user'=>$user]);
    			\Session::save();
    			return redirect('admin/index');
    		}else{
    			return back()->with('msg', '验证码错误');
    		}
    	}else{
    		return view('admin.login');
    	}
    }


    public function code($key){
    	$code = new CodeController();
        $code->session_key = $key;
    	$code->make();
    }
}
