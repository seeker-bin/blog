<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Code\CodeController;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller{
    
    public function index(){
    	return view('admin.index');
    }


    public function info(){
    	return view('admin.info');
    }


    public function login(){
    	if($input = Input::all()){
    		$code = new CodeController();
    		$_code = $code->get();
    		echo $_code;die;
    		if(strtoupper($input['code']) == $_code){
    			$user = User::first();
    			if($user->username != $input['username'] || Crypt::decrypt($user->password) != $input['password']){
    				return back()->with('msg', '用户名或密码错误！');
    			}
    			session(['user'=>$user]);
    			return redirect('admin/index');
    		}else{
    			return back()->with('msg', '验证码错误');
    		}
    	}else{
    		session(['aaaa'=>'aaaaaaa']);
    		return view('admin.login');
    	}
    }


    public function code(){
    	$code = new CodeController();
    	$code->make();
    }
}
