<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
    <script src="/static/admin/js/jquery.min.js"></script>
</head>
<body>
      <h1>展示页面</h1>
      <a href="{{url('artisan/create')}}">添加</a>
      <!-- <h3>欢迎【{{session('admin') -> user_name ??""}}】登陆</h3> <a href="{{url('login/login_out')}}">退出</a> -->
      <form>
          <input type="text" name="word" value="{{$query['word']??''}}" placeholder="请输入关键字"/>
          <button>搜索</button>
      </form>
      <table class="table table-bordered">
  <caption>边框表格布局</caption>
  <thead>
    <tr>
      <th>文章id</th>      
      <th>文章名称</th>
      <th>文章分类</th>
      <th>文章重要性</th>
      <th>是否显示</th>
      <th>文章图片</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $v)
      <tr>
          <td>{{$v -> a_id}}</td>
          <td>{{$v -> a_name}}</td>
          <td>{{$v -> cate_name}}</td>
          <td>{{$v -> is_important == "1" ? "√" : "×"}}</td>
          <td>{{$v -> is_show == "2" ? "√" : "×"}}</td>
          <td><img src="{{env('UPLOAD_URL')}}{{$v -> a_img}}" width="100"/></td>
          <td>
              <a class="btn btn-danger" href="{{url('/artisan/del/'.$v->a_id)}}">删除</a>
              <a class="btn btn-warning" href="{{url('/artisan/edit/'.$v->a_id)}}">编辑</a>
          </td>
      </tr>
  @endforeach
  <tr>
      <td colspan="4">{{ $data->links() }}</td>      
  </tr>
  </tbody>
</table>
</body>
<!-- {{--ajax分页--}} -->
<!-- <script>
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

</script> -->
</html>