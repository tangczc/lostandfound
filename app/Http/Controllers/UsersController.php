<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;

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
        // return "s";
        return view('mains.show', compact('user'));
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
