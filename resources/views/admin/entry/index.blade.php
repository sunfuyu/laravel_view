@extends('admin.master')
@section('content')
    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="#">项目介绍</a></li>
    </ul>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">项目信息</h3>
        </div>
        <table class="table table-bordered table-hover">
            <tbody>
            <tr>
                <td>php版本</td>
                <td>{{PHP_VERSION}}</td>
            </tr>
            <tr>
                <td>框架版本</td>
                <td>laravel - {{app()->version()}}</td>
            </tr>
            <tr>
                <td>项目作者</td>
                <td>孙付玉</td>
            </tr>
            <tr>
                <td>tel</td>
                <td>18535741189</td>
            </tr>
            <tr>
                <td>email</td>
                <td>wubin.mail@foxmail.com</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection

