@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 文章管理
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">
        <table class="search_tab">
            <tr>
                <th width="120">状态:</th>
                <td>
                    <select onchange="javascript:location.href=this.value;">
                        <option value="/AdminActor/index/<?php if(isset($gid)) echo $gid;?>">不限</option>
                        <option <?php if(isset($status) && $status == 1):?>selected<?php endif;?> value="/AdminActor/index/<?php if(isset($gid)) echo $gid;?>?status=1">正常</option>
                        <option <?php if(isset($status) && $status == 2):?>selected<?php endif;?> value="/AdminActor/index/<?php if(isset($gid)) echo $gid;?>?status=2">隐藏</option>
                    </select>
                </td>
                <th width="60">置顶:</th>
                <td>
                    <select onchange="javascript:location.href=this.value;">
                        <option value="/AdminActor/index/<?php if(isset($gid)) echo $gid;?>">不限</option>
                        <option <?php if(isset($is_top) && $is_top == 1):?>selected<?php endif;?> value="/AdminActor/index/<?php if(isset($gid)) echo $gid;?>?is_top=1">是</option>
                        <option <?php if(isset($is_top) && $is_top == 0):?>selected<?php endif;?> value="/AdminActor/index/<?php if(isset($gid)) echo $gid;?>?is_top=0">否</option>
                    </select>
                </td>
                <th width="60">上班状态:</th>
                <td>
                    <select onchange="javascript:location.href=this.value;">
                        <option value="/AdminActor/index/<?php if(isset($gid)) echo $gid;?>">不限</option>
                        <option <?php if(isset($work_status) && $work_status == 1):?>selected<?php endif;?> value="/AdminActor/index/<?php if(isset($gid)) echo $gid;?>?work_status=1">上班</option>
                        <option <?php if(isset($work_status) && $work_status == 0):?>selected<?php endif;?> value="/AdminActor/index/<?php if(isset($gid)) echo $gid;?>?work_status=0">下班</option>
                    </select>
                </td>
                <th width="60">待班状态:</th>
                <td>
                    <select onchange="javascript:location.href=this.value;">
                        <option value="/AdminActor/index/<?php if(isset($gid)) echo $gid;?>">不限</option>
                        <option <?php if(isset($is_wait) && $is_wait == 1):?>selected<?php endif;?> value="/AdminActor/index/<?php if(isset($gid)) echo $gid;?>?is_wait=1">待班</option>
                        <option <?php if(isset($is_wait) && $is_wait == 0):?>selected<?php endif;?> value="/AdminActor/index/<?php if(isset($gid)) echo $gid;?>?is_wait=0">无待班</option>
                    </select>
                </td>
                <td><input type="text" name="keywords" placeholder="请输入牌号或艺名" value="<?php if(isset($keywords) && $keywords) echo $keywords;?>"></td>
                <td><input type="submit" name="sub" value="搜索"></td>
            </tr>
        </table>
    </div>
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc">ID</th>
                        <th class="tc">标题</th>
                        <th class="tc">点击</th>
                        <th class="tc">发布人</th>
                        <th class="tc">发布时间</th>
                        <th class="tc">操作</th>
                    </tr>
                    @foreach($article as $v)
                        <tr>
                            <td class="tc">{{$v->aid}}</td>
                            <td><a href="#">{{$v->title}}</a></td>
                            <td class="tc">{{$v->view}}</td>
                            <td class="tc">{{$v->author}}</td>
                            <td class="tc">{{date('Y-m-d H:i:s', $v->add_time)}}</td>
                            <td class="tc">
                                <a style="float: none;" href="{{url('admin/article/'.$v->aid.'/edit')}}">修改</a>
                                <a style="float: none;" href="javascript:;" onclick="delArticle({{$v->aid}})">删除</a>
                            </td>
                        </tr>
                    @endforeach
                </table>

                <div class="page_list">
                    {{$article->links()}}
                </div>
                <style>
                    .result_content ul li span{
                        font-size: 15px;
                        padding: 6px 12px;
                    }
                </style>
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->

<script>
    //删除
    function delArticle(aid){
        layer.confirm('确定要删除该文章吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            var URL = '{{url('admin/article')}}/' + aid;
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