@extends('admin.master')
@section('content')
    <!-- TAB NAVIGATION -->
    <ul class="nav nav-tabs" role="tablist">
        <li><a href="/admin/lesson">课程列表</a></li>
        <li class="active"><a href="/admin/lesson/create">课程添加</a></li>
    </ul>
    <form action="/admin/lesson" method="POST" class="form-horizontal" role="form">
        {{csrf_field()}}
        {{--课程管理--}}
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">课程添加</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">课程名称</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">课程介绍</label>
                    <div class="col-sm-10">
                        <textarea name="introduce" class="form-control" cols="15" rows="5"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">预览图</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" name="preview" readonly="" value="">
                            <div class="input-group-btn">
                                <button onclick="upImage(this)" class="btn btn-default" type="button">选择图片</button>
                            </div>
                        </div>
                        <div class="input-group" style="margin-top:5px;">
                            <img src="{{asset('admin/img/nopic.jpg')}}" class="img-responsive img-thumbnail"
                                 width="150">
                            <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片"
                                onclick="removeImg(this)">×</em>
                        </div>
                    </div>
                    <script>
                        //上传图片
                        function upImage(obj) {
                            require(['util'], function (util) {
                                options = {
                                    multiple: false,//是否允许多图上传
                                    //data是向后台服务器提交的POST数据
                                    data: {name: '你好', year: 2099},
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
                                <input type="radio" name="ishot" value="1">是
                            </label>
                            <label>
                                <input type="radio" name="ishot" value="0" checked>否
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">是否推荐</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label>
                                <input type="radio" name="iscommend" value="1">是
                            </label>
                            <label>
                                <input type="radio" name="iscommend" value="0" checked>否
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">点击次数</label>
                    <div class="col-sm-10">
                        <input type="text" name="click" class="form-control">
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
                                <div class="input-group">
                                    <input type="text" class="form-control" v-model="v.path">
                                    <span class="input-group-btn">
												<button class="btn btn-default" type="button" :id="'pickVideo'+v.id">上传文件</button>
											</span>
                                </div>
                                <br>
                                <div class="progress" :id="'progress'+v.id" style="display: none">
                                    <div class="progress-bar" :id="'progress-bar'+v.id" role="progressbar"
                                         aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                                        0%
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-danger btn-sm" @click.prevent="del(k)">删除视频</button>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button class="btn btn-success btn-sm" @click.prevent="add">添加视频</button>
            </div>
            <textarea name="videos" hidden>@{{videos}}</textarea>
        </div>
        <button class="btn btn-primary">确定添加</button>
    </form>

    <script>
        require(['vue'], function (Vue) {
            new Vue({
                el: '#app',
                data: {
                    videos: []
                },
                methods: {
                    del(k){
                        this.videos.splice(k, 1);
                    },
                    add(){
                        var field = {title: '', path: '', id: Date.parse(new Date())};
                        this.videos.push(field);
                        setTimeout(function () {
                            upload(field);
                        }, 200)
                    }
                }
            })
        })
        function upload(field) {
            require(['oss'], function (oss) {
                var id = '#pickVideo' + field.id;
                var uploader = oss.upload({
                    //获取签名
                    serverUrl: '/component/oss?',
                    //上传目录
                    dir: 'houdunwang/',
                    //按钮元素
                    pick: id,
                    accept: {
                        title: 'Images',
                        extensions: 'mp4',
                        mimeTypes: 'video/mp4'
                    }
                });
                //上传开始
                uploader.on('startUpload', function () {
                    $('#progress' + field.id).show();
                    //console.log('开始上传');
                });
                //上传成功
                uploader.on('uploadSuccess', function (file, response) {
                    field.path = oss.oss.host + '/' + oss.oss.object_name;
                    //console.log('上传完成,文件名:' + oss.oss.host + '/' + oss.oss.object_name);
                });
                //上传中
                uploader.on('uploadProgress', function (file, percentage) {
                    $('#progress-bar' + field.id).css({width: parseInt(percentage * 100) + '%'}).text(parseInt(percentage * 100) + '%');
                    //console.log('上传中,进度:' + parseInt(percentage * 100));
                })
                //上传结束
                uploader.on('uploadComplete', function () {
                    $('#progress' + field.id).hide();
                    //console.log('上传结束');
                })
            });
        }
    </script>
@endsection