<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">  
</head>
<body>
       <h1>添加页面</h1>
       <form role="form" action="{{url('/student/store')}}" method="post">
       @csrf
       <table border=1>
            <div class="form-group">
                <label for="name">名称</label>
                <input type="text" class="form-control" name="student_name" id="name" placeholder="请输入名称">
            </div>
            <div class="form-group">
                <label for="inputfile">性别</label>
                <input type="radio" id="inputfile" name="student_sex" values="1" checked>男
                <input type="radio" id="inputfile" name="student_sex" values="2">女               
            </div>
            <div>
                <select name="class_id" id="">
                 <option value="0">请选择班级</option>
                 <option value="1">1班</option>
                 <option value="2">2班</option>
                 <option value="3">3班</option>
                </select>
            </div>

            <button type="submit" class="btn btn-default">提交</button>
            </table>
</body>
</html>