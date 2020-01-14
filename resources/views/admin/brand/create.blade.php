<!DOCTYPE html>
<html lang="en">
<head>
<h1>添加页面</h1>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
    <script src="/static/admin/js/jquery.min.js"></script>
</head>
<body>
{{--@if ($errors->any())--}}
  {{--<div class="alert alert-danger">--}}
    {{--<ul>--}}
      {{--@foreach ($errors->all() as $error)--}}
        {{--<li>{{ $error }}</li>--}}
      {{--@endforeach--}}
    {{--</ul>--}}
  {{--</div>--}}
{{--@endif--}}
<form class="form-horizontal" role="form" action="{{url('brand/store')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">品牌名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="brand_name" id="firstname" placeholder="请输入名字">
      <b style="color: red">{{ $errors->first('brand_name')}}</b>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">品牌网址</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="firstname" name="brand_url" placeholder="请输入名字">
      <b style="color: red">{{ $errors->first('brand_url')}}</b>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">品牌LOGO</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" id="firstname" name="brand_logo" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">品牌描述</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="firstname" name="brand_desc" placeholder="请输入名字"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="button" class="btn btn-default">添加</button>
    </div>
  </div>
</form>
</body>
   <script>

 

    //  品牌名称
      $("input[name='brand_name']").blur(function(){
        $(this).next().text('');
        var brand_name =  $(this).val();
        // alert(brand_name);
        checkname(brand_name);
      });
// 品牌网址
    $("input[name='brand_url']").blur(function(){
        $(this).next().text('');
        var brand_url =  $(this).val();
        checkUrl(brand_url);
      });
      
      function checkUrl(brand_url){
        var reg = /^http:\/\/*/;
        if(!reg.test(brand_url)){
          $("input[name='brand_url']").next().text('网址需要以http开头');
           return false;
        } 
           return true;
      }

      function checkname(brand_name){
          var flag = true;
          var reg = /^[\u4e00-\u9fa5\w.\-]{1,16}$/;
            if(!reg.test(brand_name)){
              $("input[name='brand_name']").next().text('品牌名称由数字字母下划线组成');
              return false;
            } 
              
          // ajax验证唯一性
          $.ajax({
              method:'get',
              url:"/brand/checkOnly",
              data:{brand_name:brand_name},
              async:false,
          }).done(function(res){
          if(res!=0){
                $("input[name='brand_name']").next().text('品牌名称已存在');
                flag = false;
          }
       });
          return flag;
        }


      // 提交验证
    $('[type="button"]').click(function(){
        // 名称
        $("input[name='brand_name']").next().text('');
        var brand_name = $("input[name='brand_name']").val();
         var nameflag = checkname(brand_name);
    
      // 网址验证
      $("input[name='brand_url']").next().text('');
        var brand_url =  $("input[name='brand_url']").val();
        var urlflag = checkUrl(brand_url);
        // alert(nameflag);
        // alert(urlflag);
        if(nameflag == true && urlflag == true){
            $('form').submit();
        }

    });
   </script>
</html>