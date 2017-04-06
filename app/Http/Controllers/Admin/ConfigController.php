<?php

namespace App\Http\Controllers\Admin;

use App\Http\Models\Config;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ConfigController extends Controller
{

    /**
     * get admin/config 网站配置列表
     */
    public function index() {
        $config = Config::orderBy('conf_order', 'asc')->get();
        foreach($config as $k=>$v){
            switch($v->conf_type){
                case 'input':
                    $config[$k]['_html'] = '<input type="text" class="lg" name="conf_content[]" value="'.$v->conf_content.'">';
                    break;
                case 'textarea':
                    $config[$k]['_html'] = '<textarea class="lg" name="conf_content[]">'.$v->conf_content.'</textarea>';
                    break;
                case 'radio':
                    $arr = explode(',', $v->conf_value);
                    $str = '';
                    foreach($arr as $m=>$n) {
                        $r = explode('|', $n);
                        $c = $v->conf_content == $r[0] ? 'checked' :'';

                        $str .= '<input type="radio" name="conf_content[]" value="'.$r[0].'" '.$c.'>'.$r[1].'　';
                    }
                    $config[$k]['_html'] = $str;
                    break;
            }
        }
        return view('admin.config.index', compact('config'));
    }

    /**
     * get admin/config/create 添加网站配置
     */
    public function create() {
        return view('admin.config.add');
    }

    /**
     * post /admin/config 添加网站配置
     */
    public function store() {
        $input = Input::except('_token');
        $rules = [
            'conf_name'=>'required',
            'conf_title' =>'required',
        ];

        $message = [
            'conf_name.required'=>'配置项名称不能为空！',
            'conf_title.required' =>'配置项地址不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            foreach ($input as $k => $v) {
                if(empty($v)){
                    unset($input[$k]);
                }
            }
            $res = Config::create($input);
            if($res){
                return redirect('admin/config');
            }else{
                return back()->with('errors', '配置项添加败，请稍后重试！');
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
        $nav = Config::find($input['conf_id']);
        $nav->conf_order = $input['conf_order'];
        $res = $nav->update();
        if($res){
            $data = [
                'status' => 1,
                'msg' => '网站配置排序更新成功',
            ];
        }else{
            $data = [
                'status' => 0,
                'msg' => '网站配置排序更新失败',
            ];
        }
        return $data;
    }

    /**
     * 修改配置项
     */
    public function changeContent() {
        $input = Input::except('_token', 'ord');
        foreach($input['conf_id'] as $k=>$v){
            Config::where('conf_id', $v)->update(['conf_content'=>$input['conf_content'][$k]]);
        }
        $this->putFile();
        return back()->with('errors', '配置项更新成功！');
    }


    public function putFile() {
        $config = Config::pluck('conf_content', 'conf_name')->all();
        $path = base_path().'/config/web.php';
        $str = '<?php return '.var_export($config, true).';';
        file_put_contents($path, $str);
    }


    /**
     * get admin/config/{config}/edit  修改网站配置
     */
    public function edit($conf_id){
        $info = Config::find($conf_id);
        return view('admin.config.edit', compact('info'));
    }

    /**
     * put admin/config/{config}  更新网站配置
     */
    public function update($conf_id){
        $input = Input::except('_token', '_method');
        $res = Config::where('conf_id', $conf_id)->update($input);
        if($res){
            $this->putFile();
            return redirect('admin/config');
        }else{
            return back()->with('errors', '网站配置更新失败，稍后重试!');
        }
    }

    /**
     * delete admin/config/{config} 删除单个网站配置
     */
    public function destroy($conf_id){
        $res = Config::where('conf_id', $conf_id)->delete();
        if($res){
            $this->putFile();
            $data = [
                'status' => 1,
                'msg'    => '网站配置删除成功！',
            ];
        }else{
            $data = [
                'status' => 0,
                'msg'    => '网站配置删除失败！',
            ];
        }
        return $data;
    }

    /**
     * get admin/config/{config}
     */
    public function show() {

    }
}
