@extends('layouts.default')
@section('title', '我的首页')


@section('centent')

    <header>
        <div class="header1">
            <p>首页</p>
            <!-- <form action="#" method="get" class="form">
            {{ csrf_field()}}
                <div class="row" style="margin-left:70%;">
                    <div class="col-md-12 ">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="查找物品" name="search">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">搜索</button>
                            </span>
                        </div>
                    </div>
                </div>
            </form> -->
        </div>
        <div class="header1-left">
            <img src="{{asset('/img/title.png')}}" style="height:60px;width:60px; margin-left:20px;margin-top:3px;" /> 
            <h2 class="title" style="color:#ffff;margin-top:-49px;margin-left:100px;">我的首页</h2>
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
        <div class="article-title">
            <span>失物({{ $lost }})</span>&nbsp;&nbsp;
            <span>拾物({{ $find }})</span>
        </div>

        <div class="article-info">
            @foreach( $articles as $article)
                <h1>{{$article -> title}}</h1>
                <p>描述</p>
                <p>{{ $article -> describ}}</p>
                <img src="{{asset('photo/'.$article -> image_url)}}"/>
                <hr/>
            @endforeach
        </div>

    </div>
    

@stop