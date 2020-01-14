
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
  <!-- <tr>
      <td colspan="4">{{ $data->appends($query)->links() }}</td>
  </tr> -->