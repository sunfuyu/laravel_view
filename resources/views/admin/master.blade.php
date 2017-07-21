
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>视频管理系统</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <script>
        //模块配置项
        var hdjs = {
            //框架目录
            'base': '/node_modules/hdjs',
            //上传文件后台地址
            'uploader': '/component/upload',
            //获取文件列表的后台地址
            'filesLists': '/component/filesLists?',
        };
    </script>
    <link href="/node_modules/hdjs/css/bootstrap.min.css" rel="stylesheet">
    <link href="/node_modules/hdjs/css/font-awesome.min.css" rel="stylesheet">
    <script src="/node_modules/hdjs/app/util.js"></script>
    <script src="/node_modules/hdjs/require.js"></script>
    <script src="/node_modules/hdjs/config.js"></script>
    <link href="/admin/css/hdcms.css" rel="stylesheet">
    <script>
        require(['jquery'], function ($) {
            //为异步请求设置CSRF令牌
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        })
        if (navigator.appName == 'Microsoft Internet Explorer') {
            if (navigator.userAgent.indexOf("MSIE 5.0") > 0 || navigator.userAgent.indexOf("MSIE 6.0") > 0 || navigator.userAgent.indexOf("MSIE 7.0") > 0) {
                alert('您使用的 IE 浏览器版本过低, 推荐使用 Chrome 浏览器或 IE8 及以上版本浏览器.');
            }
        }
    </script>
</head>
<body class="site">
<div class="container-fluid admin-top">
    <!--导航-->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <ul class="nav navbar-nav">

                    <li>
                        <a href="/" target="_blank">
                            <i class="fa fa-reply-all"></i> 返回系统
                        </a>
                    </li>


                    <li class="top_menu active">
                        <a href="/admin/index">
                            <i class="'fa-w fa fa-comments-o"></i> 系统功能                        </a>
                    </li>
                    <li class="top_menu">
                        <a href="" target="_blank">
                            <i class="'fa-w fa fa-cubes"></i> 实战视频                        </a>
                    </li>

                </ul>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="fa fa-w fa-user"></i>
                            {{Auth::guard('admin')->user()->username}}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="/admin/changePass">我的帐号</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/admin/out">退出</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--导航end-->
</div>
<!--主体-->
<div class="container-fluid admin_menu">
    <div class="row">
        <div class="col-xs-12 col-sm-3 col-lg-2 left-menu">
            <div class="search-menu">
                <input class="form-control input-lg" type="text" placeholder="输入菜单名称可快速查找"
                       onkeyup="search(this)">
            </div>
            <!--扩展模块动作 start-->
            <div class="panel panel-default">
                <!--系统菜单-->


                <div class="panel-heading">
                    <h4 class="panel-title">系统管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="javascript:;">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus">
                    <li class="list-group-item" >
                        <a href="/admin/changePass">我的账号</a>
                    </li>
                </ul>
                <div class="panel-heading">
                    <h4 class="panel-title">视频管理</h4>
                    <a class="panel-collapse" data-toggle="collapse" href="javascript:;">
                        <i class="fa fa-chevron-circle-down"></i>
                    </a>
                </div>
                <ul class="list-group menus">
                    <li class="list-group-item" id="86">
                        <a href="/admin/tag">内容标签</a>
                    </li>
                    <li class="list-group-item" id="86">
                        <a href="/admin/lesson">视频管理</a>
                    </li>
                </ul>



                <!----------返回模块列表 start------------>
                <!--模块列表-->
                <!--模块列表 end-->
            </div>
        </div>
        <div class="col-xs-12 col-sm-9 col-lg-10">
            <!--有模块管理时显示的面包屑导航-->
            @yield('content')
        </div>
    </div>
</div>
<script src="http://dev.hdcms.com/resource/js/menu.js"></script>
<script src="http://dev.hdcms.com/resource/js/quick_navigate.js"></script>
<script>
    require(['bootstrap']);
</script>

</body>
</html>

<style>
    table{
        table-layout: fixed;
    }
</style>
@include('admin.error')
@include('flash::message')
<script>
    require(['bootstrap'],function($){
        $('#modal-error').modal('show');
        setTimeout(function(){
            $('#modal-error').modal('hide');
        },3000)
    });
</script>
