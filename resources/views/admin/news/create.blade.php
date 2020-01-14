<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
@foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
@endforeach
        </ul>
    </div>
@endif
        <form action="{{url('news/store')}}" method="post">
            @csrf
                <table border="3" align="center">
                        <tr>
                            <td>新闻标题</td>
                            <td><input type="text" name="news_name"></td>
                        </tr>
                        <tr>
                            <td>新闻分类</td>
                            <td>
                                <select name="cate_id" id="">
                                    <option value="">请选择</option>
                                    @foreach($data as $v)
                                        <option value="{{$v -> cate_id}}">{{$v->cate_name}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>新闻作者</td>
                            <td><input type="text" name="news_author"></td>
                        </tr>
                        <tr>
                            <td><button>添加</button></td>
                            <td></td>
                        </tr>
                </table>
        </form>
</body>
</html>