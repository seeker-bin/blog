<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Links;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class LinksController extends Controller
{

    /**
     * get admin/links
     */
    public function index() {
        $data = Links::orderBy('link_order', 'asc')->get();
        return view('admin.links.index', compact('data'));
    }

    /**
     * get admin/links/create 添加友情链接
     */
    public function create() {
        return view('admin.links.add');
    }

    /**
     * post /admin/links 添加友情链接
     */
    public function store() {
        $input = Input::except('_token');
        $rules = [
            'link_name'=>'required',
            'link_url' =>'required',
        ];

        $message = [
            'link_name.required'=>'链接名称不能为空！',
            'link_url.required' =>'链接地址不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $res = Links::create($input);
            if($res){
                return redirect('admin/links');
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
        $link = Links::find($input['link_id']);
        $link->link_order = $input['link_order'];
        $res = $link->update();
        if($res){
            $data = [
                'status' => 1,
                'msg' => '友情链接排序更新成功',
            ];
        }else{
            $data = [
                'status' => 0,
                'msg' => '友情链接排序更新失败',
            ];
        }
        return $data;
    }

    /**
     * get admin/links/{links}/edit  修改友情链接
     */
    public function edit($link_id){
        $info = Links::find($link_id);
        return view('admin.links.edit', compact('info'));
    }

    /**
     * put admin/links/{links}  更新友情链接
     */
    public function update($link_id){
        $input = Input::except('_token', '_method');
        $res = Links::where('link_id', $link_id)->update($input);
        if($res){
            return redirect('admin/links');
        }else{
            return back()->with('errors', '友情链接更新失败，稍后重试!');
        }
    }

    /**
     * delete admin/links/{links} 删除单个友情链接
     */
    public function destroy($link_id){
        $res = Links::where('link_id', $link_id)->delete();
        if($res){
            $data = [
                'status' => 1,
                'msg'    => '友情链接删除成功！',
            ];
        }else{
            $data = [
                'status' => 0,
                'msg'    => '友情链接删除失败！',
            ];
        }
        return $data;
    }

    /**
     * get admin/links/{links}
     */
    public function show() {

    }
}
