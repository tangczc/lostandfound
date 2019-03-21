<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>用户登录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="/css/app.css">
    <script src="/js/login.js"></script>
</head>
<body>
   
    <div class="tile">
        
        <div class="tile-header">
        @include('layouts._errors')
        @include('layouts._messages')
            <h2 style="color: white; opacity: .75; font-size: 4rem; display: flex; justify-content: center; align-items: center; height: 100%;">LOGIN</h2>
        </div>
    
        <div class="tile-body">
            <form id="form" action="{{ route('users.store')}}" method="post">
            {{ csrf_field()}}
                    <label class="form-input">
                    <i class="material-icons">person</i>
                    <input type="text" autofocus="true" name="email" required />
                    <span class="label">邮&nbsp;箱</span>
                    <span class="underline"></span>
                </label>
        
                <label class="form-input">
                    <i class="material-icons">lock</i>
                    <input type="password" name="password" required />
                    <span class="label">密&nbsp;码</span>
                    <div class="underline"></div>
                </label>
        
                <div class="submit-container clearfix" style="margin-top: 2rem;">          
                    <input role="button" type="submit" class="btn btn-irenic float-left" tabindex="0" value = "登陆">
                    <a href="/sgin_up" role="button" type="button" class="btn btn-irenic float-right" tabindex="0">注册</a>
                    <div class="login-pending">
                        <div class=spinner>
                            <span class="dot1"></span>
                            <span class="dot2"></span>
                        </div>     
                        <div class="login-granted-content">
                            <i class="material-icons">done</i>
                        </div>
                    </div>
                </div>
        </form>
    </div>
    </div>
</body>
</html>