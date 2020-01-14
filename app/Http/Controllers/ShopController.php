<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = Shop::paginate(2);
        $query = request() -> all();
        return view('admin.shop.index',['data'=>$data,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $request -> except('_token');
        // dd($post);
        if($request->hasFile('shop_logo')){
            $post['shop_logo'] = $this->upload('shop_logo');
        }
        $post['add_time'] = time();
       $res = Shop::create($post);
       if($res){
        return redirect('/shop');
       }
    }
    /**
     * 
     * 单个文件上传
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
        $res = Shop::destroy($id);
        if($res){
            return redirect('/shop');
        }
        // if($res){
        //   if(request() -> ajax()){
        //        echo json_encode(['code'=>'00000','msg'=>'删除成功']);
        //   }
        //     return redirect('/shop');
        // }
    }
}
