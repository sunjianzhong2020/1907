<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
class BookController extends Controller
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
            $where[] = ['book_name','like',"%$word%"];
        }
        $data = Book::where($where)->paginate(2);
        $query = request() -> all();
        return view('admin.book.index',['data'=>$data,'query'=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'book_name' => 'required|unique:book|max:255',
            'book_author'=>'required'
        ],[
             'book_name.required' => '图书名称必须填写',
            'book_name.unique' => '图书名称已存在',
            'book_author.required' => '图书作者必须填写',
        ]);
        $post = $request ->except('_token');
//        dd($post);
        //        文件上传
        if($request->hasFile('book_img')){
            $post['book_img'] = $this->upload('book_img');
        }
//        dd($post);
        // $res = DB::table('brand')->insert($post);
        $res = Book::create($post);
        if($res){
            return redirect('/book');
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
        //
    }
}
