@extends('layouts.userhome')

@section('userhomecontent')

<div class="layui-body">
    <div class="layui-col-md6 layui-col-xs12" style="padding: 15px;">
        <form class="layui-form layui-form-pane" method="POST" >
            <div class="layui-form-item " style="margin-top:10px;">
                <label class="layui-form-label">文章标题</label>
                <div class="layui-input-inline">
                    <input id="kw" type="text" class="layui-input"  value="" autocomplete="off" placeholder="请输入文章标题">
                </div>
                <div class="layui-word-aux">
                    <button class="layui-btn" type="button" id='search'>查询</button>
                </div>
            </div>
        </form>

        <table class="layui-table"  lay-filter="articles" lay-data="{id:'article_table',url:'/userhome/articles',method: 'post',page: true,limit: 20,groups: 3,response: { statusName: 'code', statusCode: 0 , msgName: 'msg' , countName: 'count', dataName: 'data'}}">
            <thead>
                <tr>
                    <th lay-data="{field:'id', width:98, sort: true}">ID</th>
                    <th lay-data="{field:'title', width:300}">标题</th>
                    <th lay-data="{field:'author', width:120}">作者</th>
                    <th lay-data="{field:'read', width:100}">已读</th>
                    <th lay-data="{field:'like', width:100}">获赞</th>
                    <th lay-data="{field:'right', width:100, toolbar: '#bar'}">操作</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<script type="text/html" id="bar">
    <a class="layui-btn layui-btn-mini" lay-event="detail">查看</a>
</script>

@endsection
