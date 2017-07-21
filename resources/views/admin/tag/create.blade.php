@extends('admin.master')
@section('content')
    <!-- TAB NAVIGATION -->
    <ul class="nav nav-tabs" role="tablist">
        <li ><a href="/admin/tag" >标签列表</a></li>
        <li class="active"><a href="/admin/tag/create" >标签添加</a></li>
    </ul>
    <form action="/admin/tag" method="POST" class="form-horizontal" role="form">
        {{csrf_field()}}
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">标签添加</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">标签名称</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name">
                    </div>
                </div>

            </div>
        </div>
        <button class="btn btn-primary">确定添加</button>
    </form>

@endsection