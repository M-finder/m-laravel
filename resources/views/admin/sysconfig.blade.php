@extends('layouts.admin')

@section('content')

<div class="layui-col-md6 layui-col-xs12" style="padding: 15px;">
    <div class="layui-tab">
        <ul class="layui-tab-title">
            <li class="layui-this">网站设置</li>
            <li></li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">

                <form class="layui-form layui-form-pane login-box" method="POST" >
                    <div class="layui-form-item ">
                        <label class="layui-form-label">网站名称</label>
                        <div class="layui-input-block">
                            <input id="web_name" type="text" class="layui-input" lay-verify="required|web_name" name="web_name" value="{{ $sysconfig->web_name or  '' }}"  autocomplete="off" placeholder="请输入网站名称">
                        </div>
                    </div>
                    <div class="layui-form-item ">
                        <label class="layui-form-label">网站Title</label>
                        <div class="layui-input-block">
                            <input id="web_title" type="text" class="layui-input" lay-verify="required|web_title" name="web_title" value="{{ $sysconfig->web_title or  '' }}"  autocomplete="off" placeholder="请输入网站Title">
                        </div>
                    </div>
                    <div class="layui-form-item ">
                        <label class="layui-form-label">网站关键词</label>
                        <div class="layui-input-block">
                            <input id="web_keywords" type="text" class="layui-input" lay-verify="required" name="web_keywords" value="{{ $sysconfig->web_keywords or  '' }}"  autocomplete="off" placeholder="请输入网站关键词">
                        </div>
                    </div>

                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">网站描述</label>
                        <div class="layui-input-block " style="overflow: hidden;border:1px solid #e6e6e6;">
                            <textarea id="web_description" name="web_description" lay-verify="content">{{ $sysconfig->web_description or '' }}</textarea>
                        </div>
                    </div>

                    <div class="layui-form-item login-btn-box">
                        <button class="layui-btn" lay-submit="" lay-filter="sysconfig-box">发表</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection