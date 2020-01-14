<?php
function createTree($data,$parent_id = 0,$level = 0){
//    给一个静态方法
     static $new_array = [];
//     判断传过来的值是否有  没有的话直接停止掉
    if(!$data){
        return;
    }
//    开始循环值
     foreach($data as $k=>$v){
//         取出那一条值
        if($v -> parent_id == $parent_id){
            $v -> level = $level;
//          放入一个新的容器中
            $new_array[] = $v;
//            调用自身
      createTree($data,$v -> cate_id,$level+1);
        }
     }
//     将最后的值返回
     return $new_array;
 }


  /**
     * 单个文件上传
     * @param $filename
     * @return false|string
     */
    function upload($filename){
        if (request()->file($filename)->isValid()){
        //    接收文件
            $photo = request()->file($filename);
        //   上传文件
            $store_result = $photo->store('uploads');
            return $store_result;
        }
       exit('没有文件上传或者文件上传出错');
    }


    function moreupload($filename){
          if(!$filename){
              return;
          }  
          $imgs = request() -> file($filename);
          $result = [];
          foreach($imgs as $v){
             $result[] = $v -> store('upload');
          }

          return $result;
    } 