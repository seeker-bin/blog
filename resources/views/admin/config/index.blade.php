@extends('layouts.admin')
@section('content')
    <!--面包屑配置项 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 网站配置管理
    </div>
    <!--面包屑配置项 结束-->

    <!--搜索结果页面 列表 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>网站配置列表</h3>
            @if(count($errors)>0)
                <div class="mark">
                    @if(is_object($errors))
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    @else
                        <p>{{$errors}}</p>
                    @endif
                </div>
            @endif
        </div>
        <!--快捷配置项 开始-->
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/config/create')}}"><i class="fa fa-plus"></i>添加网站配置</a>
                <a href="{{url('admin/config')}}"><i class="fa fa-recycle"></i>网站配置列表</a>
            </div>
        </div>
        <!--快捷配置项 结束-->
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <form action="{{url('admin/config/changeContent')}}" method="post">
                {{csrf_field()}}
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%">排序</th>
                        <th class="tc" width="5%">ID</th>
                        <th>配置项标题</th>
                        <th>配置项名称</th>
                        <th>配置项内容</th>
                        <th>操作</th>
                    </tr>
                    @foreach($config as $v)
                        <tr>
                            <td class="tc">
                                <input type="text" name="ord[]" value="{{$v->conf_order}}" onchange="editOrder(this,{{$v->conf_id}})">
                            </td>
                            <td class="tc">{{$v->conf_id}}</td>
                            <td>
                                <a href="{{$v->conf_title}}" target="_blank">{{$v->conf_title}}</a>
                            </td>
                            <td>{{$v->conf_name}}</td>
                            <td>
                                <input type="hidden" name="conf_id[]" value="{{$v->conf_id}}">
                                {!! $v->_html !!}
                            </td>
                            <td>
                                <a href="{{url('admin/config/'.$v->conf_id.'/edit')}}">修改</a>
                                <a href="javascript:;" onclick="delCate({{$v->conf_id}})">删除</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="btn_group">
                    <input type="submit" value="提交">
                </div>
            </form>
        </div>
    </div>
<!--搜索结果页面 列表 结束-->

<script>
    //修改排序
    function editOrder(obj, conf_id){
        var URL = '{{url('admin/config/changeOrder')}}';
        var conf_order = $(obj).val();
        $.post(URL, {'_token':'{{csrf_token()}}', 'conf_id':conf_id, 'conf_order':conf_order}, function(data){
            if(data.status == 1){
                layer.msg(data.msg, {icon:6});
                setTimeout(function () {
                    window.location.reload();
                }, 3000);
            }else{
                layer.msg(data.msg, {icon:5});
            }
        });
    }

    //删除
    function delCate(conf_id){
        layer.confirm('确定要删除该网站配置吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            var URL = '{{url('admin/config')}}/' + conf_id;
            $.post(URL, {'_method':'delete', '_token':'{{csrf_token()}}'}, function(data){
                if(data.status == 1){
                    layer.msg(data.msg, {icon:6});
                    setTimeout(function () {
                        window.location.reload();
                    }, 3000);
                }else{
                    layer.msg(data.msg, {icon:5});
                }
            })
        }, function(){

        });
    }
</script>

@endsection