<!doctype html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
        <meta name="author" content="">
        <link rel="icon" href="{{ URL::asset('favicon.ico') }}">
        <title>脉达传播</title>
        <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('assets/css/auth/login.css') }}" rel="stylesheet">
        <style>
            body{
                background-color: #F4F5F5;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div id="error-show"></div>
            </div>
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4" id="logindev">
                    <h3 class="text-center" style="margin-bottom: 30px;">
                        <img class="logo-img" width="45px" height="45px;" src="{{ URL::asset('maidaM.png') }}">
                        <span>脉达传播</span>
                    </h3>
                        <form class="login form">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <input type="text" name="email" class="form-control"  placeholder="请输入邮箱账号">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control"  placeholder="请输入账号密码">
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" name="captcha"  class="form-control" placeholder="请输入验证码">
                                    <span class="input-group-addon" style="padding: 0 0">
                                        <img id="captcha" src="" alt="验证码" title="点击刷新验证码" onclick="onCaptcha()">
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label class="pull-left">
                                        <input type="checkbox" name="remember"> 记住我
                                    </label>
                                    <label class="pull-right">
                                        <span><a href="/auth/forget">忘记密码了？</a></span>
                                    </label>
                                </div>
                            </div>
                            <div class="clearfix" style="margin-bottom: 10px;"></div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">登录</button>
                            </div>
                            <a class="btn btn-success btn-block" href="/auth/register">注册账号</a>
                        </form>
                </div>
            </div>
        </div>

    </body>
    <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrapValidator.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/auth/login.js') }}"></script>
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?06e07bf90fd55acbde35acbf954c0506";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</html>