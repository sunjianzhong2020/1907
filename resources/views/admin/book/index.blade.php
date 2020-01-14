<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
</head>
<body>
<form>
    <input type="text" name="word" value="{{$query['word']??''}}" placeholder="请输入关键字"/>
    <button>搜索</button>
</form>
      <table border="1">
          <tr>
              <td>id</td>
              <td>图书名称</td>
              <td>图书作者</td>
              <td>图书价格</td>
              <td>图书封面</td>
          </tr>
          @foreach($data as $v)
              <tr>
                  <td>{{$v -> book_id}}</td>
                  <td>{{$v -> book_name}}</td>
                  <td>{{$v -> book_author}}</td>
                  <td>{{$v -> book_price}}</td>
                  <td><img src="{{env('UPLOAD_URL')}}{{$v -> book_img}}" width="100"/></td>
              </tr>
          @endforeach
      </table>
      <tr>
          <td colspan="4">{{ $data->links() }}</td>
      </tr>
</body>
</html>