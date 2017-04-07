<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Home\CommonController;
use App\Http\Models\Message;

class AboutController extends CommonController
{
    
    public function me(){
    	echo md5('cblovepcx');die;
    	return view('blog.me');
    }

    public function message(){
    	return view('blog.message');
    }

    public function sendMessage(Request $request){
    	if(strtoupper($request->get('code')) == session('mcode')){
    		$input = $request->except('_token', 'code', 'submit');
    		$input['add_time'] = time();
    		if(Message::create($input)){
    			return redirect('message/me');
    		}else{
    			return back()->with('errors', '网络错误，请稍后重试！');
    		}
    	}else{
    		return back()->with('errors', '验证码错误');
    	}
    }
}
