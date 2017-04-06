<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Article;
use App\Http\Models\Category;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::orderBy('aid', 'desc')->paginate(10);
        return view('admin.article.index', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = (new Category())->tree();
        return view('admin.article.add', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('_token');
        $input['slug'] = translug($input['title']);
        $input['add_time'] = time();
        $rules = [
            'title' => 'required',
            'content' => 'required',
        ];
        $message = [
            'title.required'=>'文章标题不能为空！',
            'content.required'=>'文章内容不能为空！',
        ];
        $validator = Validator::make($input, $rules, $message);
        if($validator->passes()){
            if(Article::create($input)){
                return redirect('admin/article');
            }else{
                return back()->with('errors', '数据填充失败，请稍后重试!');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $info = Article::find($id);
        $category = (new Category())->tree();
        return view('admin.article.edit', compact('info', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->except(['_token', '_method']);
        $input['slug'] = translug($input['title']);
        if(Article::where('aid', $id)->update($input)){
            return redirect('admin/article');
        }else{
            return back()->with('errors', '文章更新失败，请稍后重试!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Article::where('aid', $id)->delete()){
            $data = [
                'status' => 1,
                'msg'    => '文章删除成功！',
            ];
        }else{
            $data = [
                'status' => 0,
                'msg'    => '文章删除失败！',
            ];
        }
        return $data;
    }
}
