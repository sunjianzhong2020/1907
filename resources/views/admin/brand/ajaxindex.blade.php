
@foreach($data as $v)
    <tr>
        <td>{{$v -> brand_id}}</td>
        <td>{{$v -> brand_name}}</td>
        <td>{{$v -> brand_url}}</td>
        <td>{{date("Y-m-d h:i:s",$v -> add_time)}}</td>
        <td><img src="{{env('UPLOAD_URL')}}{{$v -> brand_logo}}" width="100"/></td>
        <td>{{$v -> brand_desc}}</td>
        <td>
            <a onclick="ajaxdel({{$v -> brand_id}})" class="btn btn-danger" href="javascript:void(0)">删除</a>
            <a class="btn btn-warning" href="{{url('/brand/edit/'.$v->brand_id)}}">编辑</a>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="4">{{ $data->appends($query)->links() }}</td>
</tr>

