@extends('admin.master')
@section('content')
    <!-- TAB NAVIGATION -->
    <ul class="nav nav-tabs" role="tablist">
        <li ><a href="/admin/lesson" >课程列表</a></li>
        <li class="active"><a href="admin/lesson/{$lesson['id']}/edit" >课程编辑</a></li>
    </ul>
    <form action="/admin/lesson/{{$lesson['id']}}" method="POST" class="form-horizontal" role="form">
        {{csrf_field()}}
        {{ method_field('PUT') }}
        {{--课程管理--}}
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">课程添加</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">课程名称</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" value="{{$lesson['title']}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">课程介绍</label>
                    <div class="col-sm-10">
                        <textarea name="introduce"class="form-control"   cols="15" rows="5">{{$lesson['introduce']}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">预览图</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="preview" readonly="" value="{{$lesson['preview']}}">
                            <div class="input-group-btn">
                                <button onclick="upImage(this)" class="btn btn-default" type="button">选择图片</button>
                            </div>
                        </div>
                        <div class="input-group" style="margin-top:5px;">
                            <img src="{{$lesson['preview']}}" class="img-responsive img-thumbnail" width="150">
                            <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="removeImg(this)">×</em>
                        </div>
                    </div>
                    <script>
                        //上传图片
                        function upImage(obj) {
                            require(['util'], function (util) {
                                options = {
                                    multiple: false,//是否允许多图上传
                                    //data是向后台服务器提交的POST数据
                                    data:{name:'后盾人',year:2099},
                                };
                                util.image(function (images) {          //上传成功的图片，数组类型

                                    $("[name='preview']").val(images[0]);
                                    $(".img-thumbnail").attr('src', images[0]);
                                }, options)
                            });
                        }

                        //移除图片
                        function removeImg(obj) {
                            $(obj).prev('img').attr('src', 'resource/images/nopic.jpg');
                            $(obj).parent().prev().find('input').val('');
                        }
                    </script>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">是否热门</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label>
                                <input type="radio" name="ishot" value="1" @if($lesson['ishot']==1) checked @endif>是
                            </label>
                            <label>
                                <input type="radio" name="ishot" value="0" @if($lesson['ishot']==0) checked @endif>否
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">是否推荐</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label>
                                <input type="radio" name="iscommend" value="1" @if($lesson['iscommend']==1) checked @endif>是
                            </label>
                            <label>
                                <input type="radio" name="iscommend" value="0" @if($lesson['iscommend']==0) checked @endif>否
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">点击次数</label>
                    <div class="col-sm-10">
                        <input type="text" name="click" class="form-control" value="{{$lesson['click']}}">
                    </div>
                </div>
            </div>
        </div>
        {{--课程管理--}}
        {{--视频添加--}}
        <div class="panel panel-default" id="app">
            <div class="panel-heading">
                <h3 class="panel-title">视频管理</h3>
            </div>
            {{--每一条视频--}}
            <div class="panel-body" v-for="(v,k) in videos">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">视频标题</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" v-model="v.title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">视频地址</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" v-model="v.path">
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-danger btn-sm" @click.prevent="del(k)">删除视频</button>
                    </div>
                </div>
            </div>
            {{--每一条视频--}}
            <div class="panel-footer">
                <button class="btn btn-success btn-sm" @click.prevent="add">添加视频</button>
            </div>
            <textarea name="videos" hidden>@{{videos}}</textarea>
        </div>
        {{--视频添加结束--}}
        <button class="btn btn-primary">确定编辑</button>
    </form>
    <script>
        require(['vue'],function(Vue){
            new Vue({
                el:'#app',
                data:{
                    videos:JSON.parse('{!! $videos !!}'),
                },
                methods:{
                    del(k){
                        this.videos.splice(k,1);
                    },
                    add(){
                        this.videos.push({title:'',path:''});
                    }
                }
            })
        })
    </script>
@endsection