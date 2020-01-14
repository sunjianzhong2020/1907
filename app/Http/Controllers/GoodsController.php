<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Brand;
use App\Category;
use App\Goods;
use App\Mail\SendCode;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
class GoodsController extends Controller
{
    //封装一个方法
    //发送邮件
    public function sendemail(){
       Mail::to('2416118299@qq.com')->send(new SentCode());
    } 




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageSize = config('app.pagezsize');
        $data = Goods::select('goods.*','brand.brand_name','category.cate_name')
                        ->leftjoin('category','category.cate_id','=','goods.cate_id')
                        ->leftjoin('brand','brand.brand_id','=','goods.brand_id')
                        ->orderBy('goods_id','desc')
                        ->paginate($pageSize);
            foreach($data as $v){
                 if($v->goods_imgs){
                     $v->goods_imgs = explode('|',$v->goods_imgs);
                 }
            }
        return view('admin.goods.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $brand = Brand::get();
        $category = Category::get();
        $category = createTree($category);
        return view('admin.goods.create',['brand'=>$brand],['category'=>$category]);
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
    //   单个文件上传
    if($request->hasFile('goods_img')){
        $post['goods_img'] = upload('goods_img');
    }
    // 多文件上传
    //   1.给个判断看看多文件上传有没有值
    //   2.封装一个多文件上传的方法(在公共文件中)
        //  2-1  先给个判断值是不是为空
        //  2-2  接收传过来的值
        //  2-3   进行foreach循环（循环上传）
    //dd($post);die;
    if(isset($post['goods_imgs'])){
        $post['goods_imgs'] = moreupload('goods_imgs');
        $post['goods_imgs'] = implode('|',$post['goods_imgs']);
    }
    $post['add_time'] = time();
    $post['update_time'] = time();
    $res = Goods::insert($post);
    if($res){
        return redirect('/goods');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {      
        // 访问量
        Redis::setnx('show_'.$id,1);
        
        $current = Redis::get('show_'.$id);

          $goods = Goods::find($id);
          return view('admin.goods.show',['goods' => $goods,'current' => $current]);
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
        //
    }
//   添加购物车
    public function addcart()
    {
        $goods_id = request() -> goods_id;
        // echo $goods_id;
        // 判断用户是否登录
        $user = session('admin');
       if($this->isLogin()){
           echo json_encode(['code'=>'00001','msg'=>'未登录，请登录']);die;
       }
    }


 public function isLogin(){
     $user = session('admin');
     if(!$user){
       return false;
     }
       return true;
 }

}
