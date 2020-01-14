<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$goods -> goods_name}}</title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
    <script src="/static/admin/js/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
      <h1>详情页面</h1>
         <span>
            浏览量：{{$current}}
         </span>
         <h3>名称：{{$goods -> goods_name}}</h3>
         <hr>
         <p>内容：{{$goods -> content}}</p>
         <hr>
         <p>价格：{{$goods -> goods_price}}</p>
         <button>购买</button>

</body>
<script>
      $('button').click(function(){
      //     alert('aaa');
        var goods_id = {{$goods -> goods_id}};
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        $.post('/goods/addcart',{goods_id:goods_id},function(res){
                   alert(res);
        });
      });
</script>
</html>