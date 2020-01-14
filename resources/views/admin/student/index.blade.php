<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
      <table border="1">
          <tr>
              <td>id</td>
              <td>名字</td>
              <td>性别</td>
              <td>班级</td>
              <td>操作</td>
          </tr>
         @foreach($data as $v)
          <tr>
              <td>{{$v -> student_id}}</td>
              <td>{{$v -> student_name}}</td>
              <td>{{$v -> student_sex == "1" ? "selected" : "" }}</td>
              <td>{{$v -> class_id}}</td>
              <td><a href="">删除</a></td>
          </tr>
          @endforeach
      </table>
</body>
</html>