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
      <a href="{{url('goods/create')}}">添加</a>
      <!-- <h3>欢迎【{{session('admin') -> user_name ??""}}】登陆</h3> <a href="{{url('login/login_out')}}">退出</a> -->
      <!-- <form>
          <input type="text" name="word" value="{{$query['word']??''}}" placeholder="请输入关键字"/>
          <button>搜索</button>
      </form> -->
      <table class="table table-bordered">
  <caption>边框表格布局</caption>
  <thead>
    <tr>
      <th>商品id</th>      
      <th>商品名称</th>
      <th>商品货号</th>
      <th>分类名称</th>
      <th>品牌名称</th>
      <th>商品价格</th>
      <th>商品库存</th>
      <th>商品图片</th>
      <th>商品相册</th>
      <th>商品描述</th>
      <th>添加时间</th>
      <th>修改时间</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $v)
      <tr>
          <td>{{$v -> goods_id}}</td>
          <td>{{$v -> goods_name}}</td>
          <td>{{$v -> goods_sn}}</td>
          <td>{{$v -> cate_name}}</td>
          <td>{{$v -> brand_name}}</td>
          <td>{{$v -> goods_price}}</td>
          <td>{{$v -> goods_number}}</td>
          <td><img src="{{env('UPLOAD_URL')}}{{$v -> goods_img}}" width="100"/></td>
          <td>
          @if($v -> goods_imgs)
          @foreach($v->goods_imgs as $vv)
                <img src="{{env('UPLOAD_URL')}}{{$vv}}" width="50"/>
          @endforeach
          @endif
          </td>
          <td>{{$v -> content}}</td>
          <td>{{date("Y-m-d h:i:s",$v -> add_time)}}</td>
          <td>{{date("Y-m-d h:i:s",$v -> update_time)}}</td>
          <td>
              <a onclick="ajaxdel({{$v -> goods_id}})" class="btn btn-danger" href="javascript:void(0)">删除</a>
              <a class="btn btn-warning" href="{{url('/goods/edit/'.$v->goods_id)}}">编辑</a>
              <a class="btn btn-warning" href="{{url('/goods/show/'.$v->goods_id)}}">详情</a>
          </td>
      </tr>
  @endforeach
  <tr>
      <td colspan="4">{{ $data->links() }}</td>
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