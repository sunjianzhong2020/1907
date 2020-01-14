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
      <a href="{{url('category/create')}}">添加</a>
      <table class="table table-bordered">
  <caption>边框表格布局</caption>
  <thead>
    <tr>
      <th>分类id</th>
      <th>分类名称</th>
      <th>父级id</th>
      <th>是否显示</th>
      <th>是否导航显示</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $v)
      <tr>
          <td>{{$v -> cate_id}}</td>
          <td>{{$v -> cate_name}}</td>
          <td>{{str_repeat('|--',$v -> level)}}{{$v->cate_name}}</td>
          <td>{{$v->is_show=='1' ? "√" : "×"}}</td>
          <td>{{$v->is_nav_show=='2' ? "√" : "×"}}</td>
          <td>
              <a class="btn btn-danger" href="{{url('/category/del/'.$v->cate_id)}}">删除</a>
              <a class="btn btn-warning" href="{{url('/category/edit/'.$v->cate_id)}}">编辑</a>
          </td>
      </tr>
  @endforeach
  </tbody>
</table>

</body>
{{--ajax分页--}}
<script>
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