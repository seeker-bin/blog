@extends('layouts.admin')
@section('content')
        <!--面包屑配置 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; <a href="{{url('admin/config')}}">网站配置管理</a> &raquo; 添加网站配置
</div>
<!--面包屑配置 结束-->

<!--结果集标题与配置组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>添加网站配置</h3>
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
    <div class="result_content">
        <div class="short_wrap">
            <a href="{{url('admin/config/create')}}"><i class="fa fa-plus"></i>添加配置</a>
            <a href="{{url('admin/config')}}"><i class="fa fa-recycle"></i>网站配置列表</a>
        </div>
    </div>
</div>
<!--结果集标题与配置组件 结束-->

<div class="result_wrap">
    <form action="{{url('admin/config')}}" method="post">
        {{csrf_field()}}
        <table class="add_tab">
            <tbody>
            <tr>
                <th><i class="require">*</i>配置项标题：</th>
                <td>
                    <input type="text" class="md" name="conf_title">
                    <span><i class="fa fa-exclamation-circle yellow"></i>配置项标题必须填写</span>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>配置项名称：</th>
                <td>
                    <input type="text" class="md" name="conf_name">
                    <span><i class="fa fa-exclamation-circle yellow"></i>配置项名称必须填写</span>
                </td>
            </tr>
            <tr>
                <th>配置项类型：</th>
                <td>
                    <input type="radio" name="conf_type" value="input" onclick="showTr('input')">input　
                    <input type="radio" name="conf_type" value="textarea" onclick="showTr('textarea')">textarea　
                    <input type="radio" name="conf_type" value="radio" onclick="showTr('radio')">radio　
                </td>
            </tr>
            <tr class="conf_value">
                <th>配置项类型值：</th>
                <td>
                    <input type="text" class="lg" name="conf_value">
                    <p><i class="fa fa-exclamation-circle yellow"></i>只有在radio下才需要配置，格式 1|开启, 0|关闭</p>
                </td>
            </tr>
            <tr>
                <th>配置项值：</th>
                <td>
                    <textarea cols="30" rows="10" name="conf_content"></textarea>
                </td>
            </tr>
            <tr>
                <th>排序：</th>
                <td>
                    <input type="text" class="sm" name="conf_order" value="0">
                </td>
            </tr>
            <tr>
                <th>配置项说明：</th>
                <td>
                    <textarea cols="30" rows="10" name="conf_tips"></textarea>
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input type="submit" value="提交">
                    <input type="button" class="back" onclick="history.go(-1)" value="返回">
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
<script>
    showTr();
    function showTr(){
        var type = $('input[name=conf_type]:checked').val();
        if(type == 'radio'){
            $('.conf_value').show();
        }else{
            $('.conf_value').hide();
        }
    }
</script>
@endsection
