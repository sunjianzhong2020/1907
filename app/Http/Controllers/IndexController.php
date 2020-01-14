<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function test(){
        $name = '孙建忠';
        return view('hello',['name'=>$name]);
    }
    public function login(){
        $post = request() -> all();
        dump($post);
        return view('login');
       
    }
    public function dologin(){
        $post = request() -> all();
        dd($post);
    }
    public function goods($id){
       return $id;
    } 
    public function getgoods($id,$name = '张三'){
      echo 'id是：'.$id;
      echo '名字是：'.$name;
    }
}
