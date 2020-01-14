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
<!-- {{--@if ($errors->any())--}}
  {{--<div class="alert alert-danger">--}}
    {{--<ul>--}}
      {{--@foreach ($errors->all() as $error)--}}
        {{--<li>{{ $error }}</li>--}}
      {{--@endforeach--}}
    {{--</ul>--}}
  {{--</div>--}}
{{--@endif--}} -->
<form class="form-horizontal" role="form" action="{{url('shop/store')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="shop_name" id="firstname" placeholder="请输入名字">
      <!-- <b style="color: red">{{ $errors->first('brand_name')}}</b> -->
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">所属品牌</label>
    <div class="col-sm-10">
         <select name="brand_id" id="">
           <option name="brand_name" value="0">请选择</option>
           <option name="brand_name" value="1">耐克</option>
           <option name="brand_name" value="2">阿迪</option>
           <option name="brand_name" value="3">李宁</option>
         </select>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品图片</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" id="firstname" name="shop_logo">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">商品描述</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="firstname" name="shop_desc" placeholder="请输入商品描述"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">添加</button>
    </div>
  </div>
</form>
</body>
</html>