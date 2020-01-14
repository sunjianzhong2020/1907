<!DOCTYPE html>
<html lang="en">
<head>
<h1>添加页面</h1>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
</head>
<body>
     <center><h1>登录</h1></center>
     <b style="color: red">{{session('msg')}}</b>
{{--@if ($errors->any())--}}
  {{--<div class="alert alert-danger">--}}
    {{--<ul>--}}
      {{--@foreach ($errors->all() as $error)--}}
        {{--<li>{{ $error }}</li>--}}
      {{--@endforeach--}}
    {{--</ul>--}}
  {{--</div>--}}
{{--@endif--}}
<form class="form-horizontal" role="form" action="{{url('login/do_login')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">用户名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="user_name" id="firstname" placeholder="请输入名字">
      {{--<b style="color: red">{{ $errors->first('brand_name')}}</b>--}}
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">用户密码</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="firstname" name="user_pwd" placeholder="请输入密码">
      {{--<b style="color: red">{{ $errors->first('brand_url')}}</b>--}}
    </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">登录</button>
    </div>
  </div>
</form>
</body>
</html>