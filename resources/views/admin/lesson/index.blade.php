@extends('admin.master')
@section('content')
    <!-- TAB NAVIGATION -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="/admin/lesson" >课程管理</a></li>
        <li><a href="/admin/lesson/create" >课程视频添加</a></li>
    </ul>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">课程视频添加</h3>
        </div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>课程名称</th>
                    <th>预览图</th>
                    <th>视频数量</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($field as $d)
                    <tr>
                        <td>{{$d['id']}}</td>
                        <td>{{$d['title']}}</td>
                        <td><img src="{{$d['preview']}}" width="50" alt=""></td>
                        <td>{{$d->videos()->count()}}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="/admin/lesson/{{$d['id']}}/edit" class="btn btn-primary">编辑</a>
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
                            url:'/admin/lesson/'+id,
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
