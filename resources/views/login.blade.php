<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
      <form action="{{url('/dologin')}}" method="post">
      <!-- @csrf -->
      {{csrf_field()}}
        <input type="text" name="name">姓名<br>
        <input type="password" name="pwd">密码<br>
        <button>提交</button>
      </form>
</body>
</html>