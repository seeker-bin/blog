<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Navs;
use Illuminate\Support\Facades\View;

class CommonController extends Controller
{
    public function __construct() {
        //自定义导航
        $navs = Navs::orderBy('nav_order', 'asc')->get();

        View::share('navs', $navs);
    }
}
