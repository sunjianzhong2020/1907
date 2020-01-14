<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artisan;
use App\Category;
class ArtisanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $word = request() -> word ?? '';
        $where = [];
        if($word){
             $where[] = ['a_name','like',"%$word%"];
        }
        $data = Artisan::where($where)->orderBy('a_id','desc')->paginate(2);
        $query = request() -> all();
//         dd($query);
//         if(request()->ajax()){
//             return view('admin.brand.ajaxindex',['data' => $data,'query' => $query]);
//         }
         return view('admin.artisan.index',['data'=>$data,'query' => $query]);
        //  return view('admin.artisan.index',['data'=>$data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data = Category::get();
        return view('admin.artisan.create',['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'a_name' => 'required|unique:artisan|max:255',
        //     'cate_id' => 'required',
        //     'is_important' => 'required',
        //     'is_show' => 'required',
        // ],[
        //     'a_name.required'=>'文章名称必须填写',
        //     'a_name.unique'=>'文章名称已存在',
        //     'cate_id.required'=>'分类必须填写',
        //     'is_important.required'=>'是否重要必须填写',
        //     'is_show.required'=>'是否显示必须填写',
        // ]);
        $post = $request -> except('_token');
        // dd($post);
        if($request->hasFile('a_img')){
            $post['a_img'] = $this->upload('a_img');
        }
        $res = Artisan::create($post);
        if($res){
            return redirect('/artisan');
        }
    }
    
     /**
     * 单个文件上传
     * @param $filename
     * @return false|string
     */
    public function upload($filename){
        if (request()->file($filename)->isValid()){
        //    接收文件
            $photo = request()->file($filename);
        //   上传文件
            $store_result = $photo->store('uploads');
            return $store_result;
        }
       exit('没有文件上传或者文件上传出错');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Artisan::destroy($id);
        if($res){
            return redirect('/artisan');
        }
    }
}
