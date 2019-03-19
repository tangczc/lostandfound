<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.login');
    }

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
        $email = $request -> input('email');
        //查询该email在数据库中是否存在
        $email = DB::select("select * from users where email = ?",[$email]);
        //如果为空则进行注册
        if(empty($email)){
            $name = $request -> input(user_name);
            $password = $request -> input(password);
            $signature = $request -> input(user_signature);
            $address = $request -> input(user_address);
            $college = $request -> input(user_college);
            $class = $request -> input(user_class);
            $year = $request -> input(user_year);
            $sex = $request -> input(user_sex);
            $avatar = null;
            DB::insert("insert into users ( name,email,password,sex,signature,address,college,class,avatar) values (?,?,?,?,?,?,?,?,?)",[$name,$email,$password,$sex,$signature,$address,$college,$class + $year,$avatar]);
            session() -> flash('success','注册成功');
            return redirect() -> action("UsersController@index");
        }else{
            session() -> flash('warning','邮箱已经存在');
            return back();
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * 用户登录
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //验证规则
        $validatedData = $request->validate([
            //邮箱格式为Email不能为空最大255
            'email' => 'required|email|max:255',
            //密码不能为空最大16
            'password' => 'required|max:16',
        ]);
        //从请求中获取email
        $email = $request -> input('email');
        //查询该email在数据库中是否存在
        $email1 = DB::select("select * from users where email = ?",[$email]);
        //从请求中获取password
        $password = $request -> input('password');
        //通过Email查询密码
        $password1 = DB::select("select password from users where password = ?",[$email]);
        //取出查询到的密码
        foreach($password1 as $key){
            $password1 =  $key -> password;
        }
        //Email存在并且密码匹配则登陆成功
        if((!empty($email1))&&($password == $password1)){
            session() -> flash('success','登陆成功');
            return redirect() ->route('user.showAll');
        }else{
            session() -> flash('warning','用户名或密码输入错误');
            return back();
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
