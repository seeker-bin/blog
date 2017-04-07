<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Navs;
use App\Http\Models\Category;
use Illuminate\Support\Facades\View;

class CommonController extends Controller
{
    public function __construct() {
        //自定义导航
        $navs = Navs::orderBy('nav_order', 'asc')->get();
        foreach ($navs as $k => $v) {
        	if($v->haschild == 1){
        		$cate_id = Category::where('cate_url', $v->nav_url)->value('cate_id');
        		$navs[$k]->child = Category::select('cate_name', 'cate_url')->where('cate_pid', $cate_id)->get();
        	}
        }
        View::share('navs', $navs);
    }
}
