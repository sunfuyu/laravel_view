@extends('admin.master')
@section('content')
    <!-- TAB NAVIGATION -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="/admin/tag" >标签列表</a></li>
        <li><a href="/admin/tag/create" >标签添加</a></li>
    </ul>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">标签列表</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>标签名称</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($field as $d)
                    <tr>
                        <td>{{$d['id']}}</td>
                        <td>{{$d['name']}}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/admin/tag/{{$d['id']}}/edit" class="btn btn-primary">编辑</a>
                                <a href="javascript:;" onclick="del({{$d['id']}})"  class="btn btn-danger">删除</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div>
            {{$field->links()}}
        </div>
        <script>
            function del(id) {
                require(['util'],function(util){
                    util.confirm('确定删除吗',function(responce){
                        $.ajax({
                            url:'/admin/tag/'+id,
                            method:'DELETE',
                            success:function(responce){
                                if(responce.valid){
                                    //执行成功
                                    util.message(responce.message,'refresh','success');
                                }
                            }
                        });
                    })
                })
            }
        </script>
@endsection