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
      <a href="{{url('brand/create')}}">添加</a>
      <h3>欢迎【{{session('admin') -> user_name ??""}}】登陆</h3> <a href="{{url('login/login_out')}}">退出</a>
      <form>
          <input type="text" name="word" value="{{$query['word']??''}}" placeholder="请输入关键字"/>
          <button>搜索</button>
      </form>
      <table class="table table-bordered">
  <caption>边框表格布局</caption>
  <thead>
    <tr>
      <th>品牌id</th>      
      <th>品牌名称</th>
      <th>品牌网址</th>
      <th>添加时间</th>
      <th>品牌LOGO</th>
      <th>品牌描述</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $v)
      <tr>
          <td>{{$v -> brand_id}}</td>
          <td>{{$v -> brand_name}}</td>
          <td>{{$v -> brand_url}}</td>
          <td>{{date("Y-m-d h:i:s",$v -> add_time)}}</td>
          <td><img src="{{env('UPLOAD_URL')}}{{$v -> brand_logo}}" width="100"/></td>
          <td>{{$v -> brand_desc}}</td>
          <td>
              <a onclick="ajaxdel({{$v -> brand_id}})" class="btn btn-danger" href="javascript:void(0)">删除</a>
              <a class="btn btn-warning" href="{{url('/brand/edit/'.$v->brand_id)}}">编辑</a>
          </td>
      </tr>
  @endforeach
  <tr>
      <td colspan="4">{{ $data->appends($query)->links() }}</td>
  </tr>
  </tbody>
</table>

</body>

<script>
//   ajax删除
     function ajaxdel(id){
        //  alert(id);
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

        $.ajax({
            method:'POST',
            url:"/brand/del/"+id,
            data:'',
            dataType:'json'
        }).done(function(msg){
            if('msg.code == 00000'){
                alert(msg.msg);
                location.reload();
            }
        });
     }



// <!-- {{--ajax分页--}} -->
      // $('.pagination a').click(function(){
          $(document).on('click','.pagination a',function(){
              var url = $(this).attr('href');
          // alert(url);
          $.get(url,function(res){
            // alert(res);
              $('tbody').html(res);
          });
          return false;
      })

</script>
</html>