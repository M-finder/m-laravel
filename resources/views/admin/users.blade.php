@extends('layouts.admin')

@section('content')

<div class="layui-col-md8 layui-col-xs12" style="padding: 15px;">
    <form class="layui-form layui-form-pane" method="POST" >
        <div class="layui-form-item " style="margin-top:10px;">
            <label class="layui-form-label">用户名称</label>
            <div class="layui-input-inline">
                <input id="kw" type="text" class="layui-input"  value="" autocomplete="off" placeholder="请输入用户名称">
            </div>
            <div class="layui-word-aux">
                <button class="layui-btn" type="button" id='search'>查询</button>
            </div>
        </div>
    </form>

    <table class="layui-table" lay-filter="users" lay-data="{id:'users_table',url:'/admin/users',method: 'post',page: true,limit: 20,groups: 3,response: { statusName: 'code', statusCode: 0 , msgName: 'msg' , countName: 'count', dataName: 'data'},}">
        <thead>
            <tr>
                <th lay-data="{field:'id', sort: true}">ID</th>
                <th lay-data="{field:'name'}">用户名称</th>
                <th lay-data="{field:'email'}">用户邮箱</th>
                <th lay-data="{field:'sign'}">签名</th>
                <th lay-data="{field:'is_author'}">用户类型</th>
                <th lay-data="{field:'right', width:150, toolbar: '#bar'}">操作</th>
            </tr>
        </thead>
    </table>
</div>
<script type="text/html" id="bar">
    <a class="layui-btn layui-btn-sm" lay-event="edit">编辑</a>
    <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
</script>
@endsection
