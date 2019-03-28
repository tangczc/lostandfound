@extends('layouts.default')
@section('title', '发布信息')


@section('centent')

    <header>
        <div class="header1">
            <p>发布信息</p>
        </div>
        <div class="header1-left">
            <img src="{{asset('/img/title.png')}}" style="height:60px;width:60px; margin-left:20px;margin-top:3px;" /> 
            <h2 class="title" style="color:#ffff;margin-top:-49px;margin-left:100px;">发布信息</h2>
        </div>

        <div class="left">
            <br>
            <img src="https://img.icons8.com/cotton/64/000000/graduation-cap.png">
            <h3 style="color:#ffff">校园失物招领</h3>
            <p><a href="{{route('show_article',$id = $user -> id)}}">我的首页</a></p>
            <p><a href="{{route('article_add',$id = $user -> id)}}">发布信息</a></p>
            <p><a href="{{route('user_info',$id = $user -> id)}}">个人信息</a></p>
        </div>
    </header>
    <div class="user-info">
        @if ($user -> avatar != null)
            <img src="{{$user -> avatar}}" class="avatar"/>
        @else
            <img src="{{asset('/img/default.jpg')}}" class="avatar"/>
        @endif
        <h1>{{$user -> name}}</h1>
        @if ($user -> signature != null)
            <p>{{$user -> signature}}</p>
        @else
            <p></p>
        @endif
        <div style="padding-top:30px;">
            <img src="https://img.icons8.com/ultraviolet/32/000000/gender-neutral-user.png" class="img-class"/>
            <span style="margin-left:10px;">{{$user -> class}}</span>
        </div>
        <div style="padding-top:20px;">
            <img src="https://img.icons8.com/color/48/000000/flow-chart.png" class="img-class" />
            <span style="margin-left:10px;">{{$user -> college}}</span>
        </div>
        <div style="padding-top:80px;">
            <img src="https://img.icons8.com/color/32/000000/address.png" class="img-class"/>   
            <span style="margin-left:10px;">{{$user -> address}}</span> 
        </div>
        <div style="padding-top:30px;">
            <img src="{{asset('/img/line.jpg')}}" style="margin-left:30px"/>
            <img src="{{asset('/img/line.jpg')}}" style="margin-left:30px;margin-top:100px;"/>
        </div>
    </div>
    <div class="article">
        <h1 style="text-align:center;">发布信息</h1>
        <form action="{{route('articles.store')}}" method="post" enctype ="multipart/form-data">
        <input type="hidden" name="user_id" value="{{$user -> id}}"/>
            {{ csrf_field()}}
            <div class="row">
                <div class="col-md-12 ">
                    <div class="input-group" id="input-group" style="width:500px;">
                        <h2>标题：</h2>
                        <input type="text" class="form-control" placeholder="请填写标题" name="title" required>
                    </div>
                    <div class="input-group" id="input-group"> 
                         <h2>描述：</h2>
                        <textarea name="informations" style="width:500px;height:200px;" type="text" class="form-control" placeholder="在填写内容的时候务必留下您的联系方式" name="title" required></textarea>
                    </div>
                    <div class="input-group" id="input-group">
                        <input type="radio" name="type" value="1" checked>拾物
                        <input type="radio" name="type" value="0">失物
                    </div>
                    &nbsp;
                    <div class="input-group">
                        <input type="file" name="image"/>
                    </div>
                </div>
                
            </div>
                <span class="input-group-btn">
                    <button class="btn btn-default" id="btn" type="submit">添加</button>
                </span>
        </form>
    </div>
@stop