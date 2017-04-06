<?php

namespace App\Http\Controllers\Home;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Home\CommonController;
use App\Http\Models\Article;
use App\Http\Models\Navs;
use App\Http\Models\Comment;

class IndexController extends CommonController{
    
    public function index(){
    	$new = Article::orderBy('add_time', 'desc')->limit(10)->get();
    	$hot = Article::orderBy('view', 'desc')->limit(6)->get();
    	$top = Article::where('is_top', 1)->orderBy('aid', 'desc')->limit(4)->get();
    	$comment = Comment::orderBy('id', 'desc')->take(6)->get();
    	$tags = Article::select('tag', DB::raw('count(*) as nums'))->groupBy('tag')->get();
    	return view('blog.index', compact('new', 'hot', 'top', 'comment', 'tags'));
    }

}
