<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Brand;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     * 列表页
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $word = request() -> word ?? '';
        $where = [];
        if($word){
             $where[] = ['brand_name','like',"%$word%"];
        }
        $data = Brand::where($where)->orderBy('brand_id','desc')->paginate(2);
        // $data = DB::table('brand')->orderBy('brand_id','desc')->paginate(2);
        // dd($data);
        $query = request() -> all();
//        dd($query);
        if(request()->ajax()){
            return view('admin.brand.ajaxindex',['data' => $data,'query' => $query]);
        }
        return view('admin.brand.index',['data' => $data,'query' => $query]);
    }

    /**
     * Show the form for creating a new resource.
     *  添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *  执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        第一种验证
        $validatedData = $request->validate([
            'brand_name' => 'required|unique:brand|max:255',
            'brand_url' => 'required',
        ],[
            'brand_name.required'=>'品牌名称必须填写',
            'brand_name.unique'=>'品牌名称已存在',
            'brand_url.required'=>'品牌网址必须填写',
        ]);

        $post = $request -> except('_token');
//        dump($post);
//        文件上传
        if($request->hasFile('brand_logo')){
            $post['brand_logo'] = upload('brand_logo');
        }
        $post['add_time'] = time();
//        dd($post);
        // $res = DB::table('brand')->insert($post);
        $res = Brand::create($post);
        if($res){
            return redirect('/brand');
        }
    }

   
    /**
     * Display the specified resource.
     * 详情页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * 编辑页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data = DB::table('brand') -> where('brand_id',$id) ->first();
        $data = Brand::find($id);
        return view('admin.brand.edit',['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     * 执行修改
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = $request -> except('_token');
        // $res = DB::table('brand')->where('brand_id',$id)->update($post);
        $res = Brand::where('brand_id',$id)->update($post);
        if($res!==false){
            return redirect('/brand');
        }
    }

    /**
     * Remove the specified resource from storage.
     * 删除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $res = DB::table('brand')->where('brand_id',$id)->delete();
        // echo $id;die;
        $res = Brand::destroy($id);
        if($res){
          if(request() -> ajax()){
               echo json_encode(['code'=>'00000','msg'=>'删除成功']);die;
          }
            return redirect('/brand');
        }
    }
  

    //   ajax验证唯一性
     public function checkOnly(){
         $brand_name = request() -> brand_name;
         $where = [];
         if($brand_name){
             $where['brand_name'] = $brand_name;
         }

         $count = Brand::where($where)->count();
         echo intval($count);
     }


}
