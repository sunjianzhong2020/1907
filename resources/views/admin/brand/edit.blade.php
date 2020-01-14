<!DOCTYPE html>
<html lang="en">
<head>
<h1>修改页面</h1>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
</head>
<body>
<form class="form-horizontal" role="form" action="{{url('brand/update/'.$data -> brand_id)}}" method="post">
  @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">品牌名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" value="{{$data -> brand_name}}" name="brand_name" id="firstname" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">品牌网址</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  value="{{$data -> brand_url}}" id="firstname" name="brand_url" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">品牌LOGO</label>
    <div class="col-sm-10">
      <input type="file" class="form-control"  value="{{$data -> brand_logo}}" id="firstname" name="brand_logo" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">品牌描述</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="firstname" name="brand_desc" placeholder="请输入名字"> {{$data -> brand_desc}}</textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">修改</button>
    </div>
  </div>
</form>
</body>
</html>