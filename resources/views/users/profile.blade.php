@extends('shared.prototype')

@section('content')
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <div class="page-header">
                            <h1>基本设置<small class="offset-right">个人资料</small></h1>
                        </div>
                        @include('features.builtIn-alert')

                        <form class="form-horizontal" method="POST" action="{{ route('user.updateProfile', $user->id) }}" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-offset-2 col-sm-10">
                                    <label for="avatar" class="sr-only">头像</label>
                                    <p>
                                        <img class="media-object img-circle avatar-xl" src="{{ $user->gravatar(128) }}" alt="头像" />
                                    </p>
                                    <input type="file" name="avatar" />
                                    <p class="help-block"><b>头像</b>：正方形图片最佳，推荐尺寸：128x128 像素</p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">用户名</label>
                                <div class="col-sm-4">
                                    <input type="text" name="username" id="username" class="form-control" value="{{ $user->name }}" disabled="disabled" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">注册邮箱</label>
                                <div class="col-sm-6">
                                    <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}" disabled="disabled" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">性别</label>
                                <div class="col-sm-4">
                                    <label class="radio-inline">
                                        <input name="gender" id="gender1" value="male" type="radio" @if ($user->gender === 'male') checked="checked" @endif /><span class="form-label">男</span>
                                    </label>
                                    <label class="radio-inline">
                                        <input name="gender" id="gender2" value="female" type="radio" @if ($user->gender === 'female') checked="checked" @endif /><span class="form-label">女</span>
                                    </label>
                                    <label class="radio-inline">
                                        <input name="gender" id="gender3" value="secret" type="radio" @if ($user->gender === 'secret') checked="checked" @endif /><span class="form-label">保密</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="location" class="col-sm-2 control-label">所在地</label>
                                <div class="col-sm-6">
                                    <input type="text" name="location" id="location" class="form-control" placeholder="您目前所在的城市" value="{{ $user->location }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nickname" class="col-sm-2 control-label">用户昵称</label>
                                <div class="col-sm-4">
                                    <input type="text" name="nickname" id="nickname" class="form-control" placeholder="替代用户名显示的昵称" value="{{ $user->nickname }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="introduction" class="col-sm-2 control-label">个人简介</label>
                                <div class="col-sm-6">
                                    <textarea name="introduction" id="introduction" class="form-control" rows="3" placeholder="对您自己的简短介绍">{{ $user->introduction }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">更新基本设置</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
@stop

@section('sidebar')
                @include('users.setting-menu')
@stop