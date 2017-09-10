@extends('layouts.admin')

@section('admincontent')

<div class="layui-body">
    <!-- 内容主体区域 -->
    <div class="layui-col-md6 layui-col-xs12" style="padding: 15px;">
        <div class="layui-tab">
            <ul class="layui-tab-title">
                <li class="layui-this">文章内容</li>
                <li></li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">

                    <form class="layui-form layui-form-pane login-box" method="POST" >
                        <input type="hidden" name='id' value='{{ $article->id or '' }}'>
                        <input type="hidden" name='token' value='{{ $token or '' }}'>
                        <div class="layui-form-item ">
                            <label class="layui-form-label">文章标题</label>
                            <div class="layui-input-block">
                                <input id="title" type="text" class="layui-input" lay-verify="required|title" name="title" value="{{ $article->title or  '' }}"  autocomplete="off" placeholder="请输入文章标题">
                            </div>
                        </div>

                        
                        <div class="layui-form-item">
                            <label class="layui-form-label">所属分类</label>
                            <div class="layui-input-inline">
                                <select name="mid">
                                    @foreach($menus as $menu)
                                    <option value="{{ $menu['id'] }}" @if(isset($article->mid) && $article->mid == $menu['id']) selected @endif>{{ $menu['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="layui-form-item layui-form-text">
                            <label class="layui-form-label">文章内容</label>
                            <div class="layui-input-block ">
                                <textarea id="content" name="content" lay-verify="content">{{ $article->content or '' }}</textarea>
                            </div>
                        </div>

                        <div class="layui-form-item login-btn-box">
                            <button class="layui-btn" lay-submit="" lay-filter="article-box">发表</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            $($(".layui-nav-item").children("a[href='/admin/dashboard']")).parent('li').addClass('layui-this');
            layui.use(['form', 'layedit', 'laydate'], function () {
                var form = layui.form, layer = layui.layer, layedit = layui.layedit;
                layedit.set({
                    uploadImage: {
                        url: '/upload-img' //接口url  {"code": 0 ,"msg": "" ,"data": {"src": "图片路径","title": "图片名称"}
                        , type: 'post' //默认post
                    }
                });
                var index = layedit.build('content', {
                    tool: [
                        'strong' //加粗
                                , 'italic' //斜体
                                , 'underline' //下划线
                                , 'del' //删除线
                                , '|' //分割线
                                , 'left' //左对齐
                                , 'center' //居中对齐
                                , 'right' //右对齐
                                , 'link' //超链接
                                , 'unlink' //清除链接
                                , 'face' //表情
                                , 'image' //插入图片
                                , 'code' //帮助
                    ]
                });
                //自定义验证规则
                form.verify({
                    title: function (val) {
                        if (val == '' || $.trim(val).length === 0) {
                            return '标题不能为空';
                        }
                    }
                    , content: function (val) {
                        if (val == '' || $.trim(val).length === 0) {
                            return '内容不能为空';
                        }
                        layedit.sync(index);
                    }
                });
                //事件监听
                form.on('submit(article-box)', function (data) {
                    var data = data.field;
                    $.post('/admin/edit-article', {data}, function (res) {
                        if (res.code == 0) {
                            layer.msg('操作成功', {icon: 1});
                            setTimeout(function () {
                                window.location.href = "/admin/dashboard";
                            }, 2000);
                        } else {
                            layer.msg(res.msg, {icon: 5});
                        }
                        return false;
                    });
                    return false;
                });
            });

        </script>
    </div>
</div>
@endsection