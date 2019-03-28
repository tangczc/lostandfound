<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', [            
            'except' => ['show','sgin_up']
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.login');
    }
    public function sgin_up(){
        return view('users.sgin_up');
    }
    /**
     * 用户注册
     */
    public function sginUp(Request $request){
        //验证规则
        $validatedData = $request->validate([
            //姓名不能为空
            'user_name' => 'required',
            //邮箱格式为Email不能为空最大255
            'user_email' => 'required|email|max:255',
            //两次密码一样不能为空最大16
            'password' => 'required|confirmed|max:16',
        ]);
        //从请求中获取email
        $email = $request -> input('user_email');
        //查询该email在数据库中是否存在
        $email = DB::select("select * from users where email = ?",[$email]);
        //如果为空则进行注册
        if(empty($email)){
            $name = $request -> input("user_name");
            $email = $request -> input('user_email');
            $password = bcrypt($request->password);
            $signature = $request -> input("user_signature");
            $address = $request -> input("user_address");
            $college = $request -> input("user_college");
            $class = $request -> input("user_class");
            $year = $request -> input("user_year");
            $sex = $request -> input("user_sex");
            $class = $class.$year;
            DB::insert("insert into users (name,email,password,sex,signature,address,college,class) values (?,?,?,?,?,?,?,?)",[$name,$email,$password,$sex,$signature,$address,$college,$class]);
            session() -> flash('success','注册成功');
            return redirect() -> action("UsersController@index");
        }else{
            session() -> flash('warning','邮箱已经存在');
            return back();
        }
    }
    /**
     * 用户登录
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tpye = 0;
        //验证规则
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {
            session()->flash('success', '欢迎回来！');
            return redirect()->route('users.show', [Auth::user()]);
        } else {
            session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
            return redirect()->back();
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $find = DB::select("select count(*) as count from informations where type = 1");
        $lost = DB::select("select count(*) as count from informations where type = 0");
        foreach($find as $key){
            $find = $key -> count; 
        }
        foreach($lost as $key){
            $lost = $key -> count; 
        }
        $articles = DB::select("select * from informations order by created_at desc");
        return view('mains.show', compact('user','articles','find','lost'));
    }
    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show_add(Request $request){
        $tpye = $request -> id;
            $user = DB::select("select * from users where id = ?",[$tpye]);
            foreach($user as $key){
                $user = $key;
        }
        return view('mains.add', compact('user','tpye')); 
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show_article(Request $request){
        
        $tpye = $request -> id;
        $user = DB::select("select * from users where id = ?",[$tpye]);
        $articles = DB::select("select * from informations");
        $find = DB::select("select count(*) as count from informations where type = 1");
        $lost = DB::select("select count(*) as count from informations where type = 0"); 
        foreach($find as $key){
            $find = $key -> count; 
        }
        foreach($lost as $key){
            $lost = $key -> count; 
        }
        foreach($user as $key){
                $user = $key;
        }
        return view('mains.show', compact('user','articles','find','lost'));
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function user_info(Request $request){
        $id = $request -> id;
            $user = DB::select("select * from users where id = ?",[$id]);
            foreach($user as $key){
                $user = $key;
        }
        return view('mains.info', compact('user')); 
    }

}
