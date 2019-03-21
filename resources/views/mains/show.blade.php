@extends('layouts.default')
@section('title', '我的首页')


@section('centent')

    <header>
        <div class="header1">
            <p>首页</p>
            <form action="" method="get" class="form">
                <div class="row" style="margin-left:70%;">
                    <div class="col-md-12 ">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">搜索</button>
                            </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="header1-left">
            <img src="{{asset('/img/title.png')}}" style="height:60px;width:60px; margin-left:20px;margin-top:3px;" /> 
            <h2 class="title" style="color:#ffff;margin-top:-49px;margin-left:100px;">我的首页</h2>
        </div>

        <div class="left">
            <br>
            <img src="https://img.icons8.com/cotton/64/000000/graduation-cap.png">
            <h3 style="color:#ffff">校园失物招领</h3>
            <p><a href="#">我的首页</a></p>
            <p><a href="#">发布信息</a></p>
            <p><a href="#">个人信息</a></p>
        </div>
    </header>
@stop