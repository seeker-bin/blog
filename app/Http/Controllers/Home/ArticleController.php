<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Home\CommonController;
use App\Http\Models\Category;
use App\Http\Models\Article;
use App\Http\Models\Comment;

class ArticleController extends CommonController{
    
    public function index(){
    	return view('blog.article');
    }

   	public function detail($aid){
   		Article::where('aid', $aid)->increment('view');
   		$info = Article::join('category', 'category.cate_id', '=', 'article.cate_id')->find($aid);
   		$about = Article::where('cate_id', $info->cate_id)->orwhere('cate_id', $info->cate_pid)->take(6)->get();
   		$hot = Article::where('cate_id', $info->cate_id)->orderBy('view', 'desc')->take(6)->get();
   		$last = Article::select('aid', 'title')->where('aid', '<', $aid)->where('cate_id', $info->cate_id)->first();
   		$next = Article::select('aid', 'title')->where('aid', '>', $aid)->where('cate_id', $info->cate_id)->first();
   		$Comment = Comment::select('id', 'is_repeat', 'repeat_name', 'content', 'add_time')->where('aid', $aid)->get();
   		return view('blog.detail', compact('info', 'about', 'hot', 'last', 'next', 'Comment'));
   	}


   	public function addComment(Request $request){
   		dd($request->all());
    	if(strtoupper($request->get('code')) == session('code')){
   			$input = $request->except('_token', 'code', 'dosubmit');
   			$input['add_time'] = time();
    		if(Comment::create($input)){
    			return redirect($request->get('url'));
    		}else{
    			return back()->with('errors', 'aaa');
    		}
    	}else{
    		return back()->with('errors', 'bbb');
    	}
    }

}
