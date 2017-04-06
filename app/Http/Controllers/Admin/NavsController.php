<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Navs;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class NavsController extends Controller
{

    /**
     * get admin/navs
     */
    public function index() {
        $data = Navs::orderBy('nav_order', 'asc')->get();
        return view('admin.navs.index', compact('data'));
    }

    /**
     * get admin/navs/create 添加自定义导航
     */
    public function create() {
        return view('admin.navs.add');
    }

    /**
     * post /admin/navs 添加自定义导航
     */
    public function store() {
        $input = Input::except('_token');
        $rules = [
            'nav_name'=>'required',
            'nav_url' =>'required',
        ];

        $message = [
            'nav_name.required'=>'链接名称不能为空！',
            'nav_url.required' =>'链接地址不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $res = Navs::create($input);
            if($res){
                return redirect('admin/navs');
            }else{
                return back()->with('errors', '数据填充失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    /**
     * 异步修改排序
     */
    public function changeOrder() {
        $input = Input::all();
        $nav = Navs::find($input['nav_id']);
        $nav->nav_order = $input['nav_order'];
        $res = $nav->update();
        if($res){
            $data = [
                'status' => 1,
                'msg' => '自定义导航排序更新成功',
            ];
        }else{
            $data = [
                'status' => 0,
                'msg' => '自定义导航排序更新失败',
            ];
        }
        return $data;
    }

    /**
     * get admin/navs/{navs}/edit  修改自定义导航
     */
    public function edit($nav_id){
        $info = Navs::find($nav_id);
        return view('admin.navs.edit', compact('info'));
    }

    /**
     * put admin/navs/{navs}  更新自定义导航
     */
    public function update($nav_id){
        $input = Input::except('_token', '_method');
        $res = Navs::where('nav_id', $nav_id)->update($input);
        if($res){
            return redirect('admin/navs');
        }else{
            return back()->with('errors', '自定义导航更新失败，稍后重试!');
        }
    }

    /**
     * delete admin/navs/{navs} 删除单个自定义导航
     */
    public function destroy($nav_id){
        $res = Navs::where('nav_id', $nav_id)->delete();
        if($res){
            $data = [
                'status' => 1,
                'msg'    => '自定义导航删除成功！',
            ];
        }else{
            $data = [
                'status' => 0,
                'msg'    => '自定义导航删除失败！',
            ];
        }
        return $data;
    }

    /**
     * get admin/navs/{navs}
     */
    public function show() {

    }
}
