<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Models\Category;

class CategoryController extends Controller
{
    /**
     * get admin/category
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cate_tree = (new Category)->tree();
        return view('admin.category.index', compact('cate_tree'));
    }

    /**
     * get admin/category/create
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $first_cate = Category::where('cate_pid', 0)->get();
        return view('admin.category.add', compact('first_cate'));
    }

    /**
     * post admin/category
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('_token');
        $rules = [
            'cate_name' => 'required',
        ]; 
        $message = [
            'cate_name.required' => '分类名称不能为空！',
        ];
        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
            $res = Category::create($input);
            if($res){
                return redirect('admin/category');
            }else{
                return back()->with('errors', '数据填充失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    /**
     * get admin/category/{category}/edit
     * Show the form for editing the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = Category::find($id);
        $first_cate = Category::where('cate_pid', 0)->get();
        return view('admin.category.edit', compact('info', 'first_cate'));
    }

    /**
     * put admin/category/{category}
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->except('_token', '_method');
        if(Category::where('cate_id', $id)->update($input)){
            return redirect('admin/category');
        }else{
            return back()->with('errors', '分类信息更新失败，稍后重试!');
        }
    }

    /**
     * delete admin/category/{category}
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Category::where('cate_id', $id)->delete();
        Category::where('cate_pid', $id)->update(['cate_pid'=>0]);
        if($res){
            $data = [
                'status' => 1,
                'msg'    => '分类删除成功！',
            ];
        }else{
            $data = [
                'status' => 0,
                'msg'    => '分类删除失败！',
            ];
        }
        return $data;
    }


    public function changeOrder(Request $request){
        $input = $request->all();
        $cate = Category::find($input['cate_id']);
        $cate['cate_order'] = $input['cate_order'];
        if($cate->update()){
            $data = [
                'status' => 1,
                'msg' => '分类排序更新成功',
            ];
        }else{
            $data = [
                'status' => 0,
                'msg' => '分类排序更新失败',
            ];
        }
        return $data;
    }
}
