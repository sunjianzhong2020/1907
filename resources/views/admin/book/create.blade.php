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
     <h1>图书添加</h1>
        <form action="{{url('book/store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <table border="3">
                <tr>
                    <td>图书名字</td>
                    <td><input type="text" name="book_name"></td>
                    {{--<b style="color: #ac2925">{{$errors->first('book_name')}}</b>--}}
                </tr>
                <tr>
                    <td>图书作者</td>
                    <td><input type="text" name="book_author"></td>
                    {{--<b style="color: #ac2925">{{$errors->first('book_author')}}</b>--}}
                </tr>
                <tr>
                    <td>售价</td>
                    <td><input type="text" name="book_price"></td>
                </tr>
                <tr>
                    <td>图书封面</td>
                    <td><input type="file" name="book_img"></td>
                </tr>
                <tr>
                    <td><button>添加</button></td>
                    <td></td>
                </tr>
            </table>
        </form>
</body>
</html>