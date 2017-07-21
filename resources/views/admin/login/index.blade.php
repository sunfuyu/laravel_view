<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('admin/css/ch-ui.admin.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('admin/js/bootstrap.js')}}">
    <link rel="stylesheet" href="{{asset('admin/font/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/cms.css')}}">

</head>
<body class="login">
<div class="container logo">
    <div style="background: url('{{asset('admin/img/title.jpg')}}') no-repeat; background-size: contain;height: 60px;"></div>
</div>
<div class="container well">
    <div class="row ">
        <div class="col-md-6">
            <form method="post" action="{{asset('/admin/login')}}" >
                {{csrf_field()}}
                <div class="form-group">
                    <label>帐号</label>

                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-w fa-user"></i></div>
                        <input type="text" name="name" class="form-control input-lg"
                               placeholder="请输入帐号">
                    </div>
                </div>
                <div class="form-group">
                    <label>密码</label>

                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-w fa-key"></i></div>
                        <input type="password" name="password"
                               class="form-control input-lg" placeholder="请输入密码">
                    </div>
                </div>
                @if(session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                <button type="submit" class="btn btn-primary btn-lg">登录</button>
            </form>
        </div>
        <div class="col-md-6">
            <img src="{{asset('admin/img/welcome.jpg')}}" style="height:230px;"/>
        </div>
    </div>
    <div class="copyright">
        Powered by sunfuyu v1.0
    </div>
</div>
</body>
</html>