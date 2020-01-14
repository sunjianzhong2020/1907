<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
    <script src="/static/admin/js/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
      <h1>展示页面</h1>
      <a href="{{url('shop/create')}}">添加</a>
      <table class="table table-bordered">
  <caption>边框表格布局</caption>
  <thead>
    <tr>
      <th>商品id</th>      
      <th>商品名称</th>
      <th>商品品牌</th>
      <th>添加时间</th>
      <th>商品LOGO</th>
      <th>商品描述</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $v)
      <tr>
          <td>{{$v -> shop_id}}</td>
          <td>{{$v -> shop_name}}</td>
          <td>{{$v -> brand_id}}</td>
          <td>{{date("Y-m-d h:i:s",$v -> add_time)}}</td>
          <td><img src="{{env('UPLOAD_URL')}}{{$v -> shop_logo}}" width="100"/></td>
          <td>{{$v -> shop_desc}}</td>
          <td>
          <a class="btn btn-warning" href="{{url('/shop/del/'.$v->shop_id)}}">删除</a>              
          </td>
      </tr>
  @endforeach
  </tbody>
</table>
  <tr>
      <td colspan="4">{{ $data->appends($query)->links() }}</td>
  </tr>
</body>
      
<script>
// //   ajax删除
//      function ajaxdel(id){
//         //  alert(id);
//         $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

//         $.ajax({
//             method:'POST',
//             url:"/shop/del/"+id,
//             data:'',
//             dataType:'json'
//         }).done(function(msg){
//             if('msg.code == 00000'){
//                 alert(msg.msg);
//                 location.reload();
//             }
//         })
//      }



// // <!-- {{--ajax分页--}} -->
//       // $('.pagination a').click(function(){
//           $(document).on('click','.pagination a',function(){
//               var url = $(this).attr('href');
//           // alert(url);
//           $.get(url,function(res){
//             // alert(res);
//               $('tbody').html(res);
//           });
//           return false;
//       })

 </script>
</html>