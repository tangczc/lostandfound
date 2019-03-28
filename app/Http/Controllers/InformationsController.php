<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;

class InformationsController extends Controller
{

    /**
     * 添加文章
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request -> title;
        $text = $request -> informations;
        $type = $request -> type;
        //判断hasfile()上传文件是否存在并且isValid()文件是否上传出错：注意这里的photo指的是form表单里的name属性
        if($request->hasfile('image') && $request->file('image')->isValid()){

            //获取请求中的image        
            $photo = $request->file('image');
            //extension()基于文件内容判断文件扩展名
            $extension = $photo->extension();
            //上传到\storage\app\public\photo
            // $store_result = $photo -> store('public/photo');
            //上传到\storage\app\photo并且重命名为test.jpg
            $seed = time().".".$extension ; 
            $store_result = $photo->storeAs('/', $seed);
            DB::insert("insert into informations (title,describ,type,image_url,created_at) values (?,?,?,?,now())",[$title,$text,$type,$seed]);
            
            return redirect()->route('show_article', [$request -> user_id]);
        
        }else{
            return "上传图片出错";
        }
    }
}
