<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller{
    
    public function index(){
    	return view('blog.article.index');
    }

   	public function detail(){
   		return view('blog.article.detail');
   	}
}
