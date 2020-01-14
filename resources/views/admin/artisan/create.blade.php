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

<form class="form-horizontal" role="form" action="{{url('artisan/store')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">文章标题</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="a_name" id="firstname" placeholder="请输入名字">
      <b style="color: red">{{ $errors->first('brand_name')}}</b>
    </div>
  </div>

  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">分类</label>
    <div class="col-sm-10">
             <select name="cate_id" id="">
                  <option value="">请选择</option>
                  @foreach($data as $v)
                  <option value="{{$v -> cate_id}}">{{$v -> cate_name}}</option>
                  @endforeach
             </select>
    </div>
  </div>

  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">是否重要</label>
    <div class="col-sm-10">
      <input type="radio"  id="firstname" name="is_important" value="1" checked>是
      <input type="radio"  id="firstname" name="is_important" value="2">否
    </div>
  </div>

  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">是否显示</label>
    <div class="col-sm-10">
      <input type="radio" id="firstname" name="is_show" value="1">是
      <input type="radio" id="firstname" name="is_show" value="2" checked>否
    </div>
  </div>
  
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">文章作者</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="a_author" id="firstname" placeholder="请输入作者">
      <!-- <b style="color: red">{{ $errors->first('brand_name')}}</b> -->
    </div>
  </div>

  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">文章名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="a_email" id="firstname" placeholder="请输入邮箱">
      <!-- <b style="color: red">{{ $errors->first('brand_name')}}</b> -->
    </div>
  </div>

  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">文章关键字</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="a_word" id="firstname" placeholder="请输入关键字">
      <!-- <b style="color: red">{{ $errors->first('brand_name')}}</b> -->
    </div>
  </div>

  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">品牌描述</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="firstname" name="a_desc" placeholder="请输入文章描述"></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">文章关键字</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" name="a_img" id="firstname">
      <!-- <b style="color: red">{{ $errors->first('brand_name')}}</b> -->
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">添加</button>
      <button type="reset" class="btn btn-default">重置</button>
    </div>
  </div>
</form>
</body>
</html>