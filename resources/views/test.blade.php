<!DOCTYPE html>
<html>
<head>
    <title>乐其意-DC</title>
    <meta name="DC"content="测试的哦">
    <meta name="description"content="dc的描述哦"> 
    <script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js" type="text/javascript" charset="utf-8"></script>
    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
        }
        /* latin-ext */
        @font-face {
            font-family: 'Lato';
            font-style: normal;
            font-weight: 100;
            src: local('Lato Hairline'), local('Lato-Hairline'), url({{ URL::asset('assets/fonts/eFRpvGLEW31oiexbYNx7Y_esZW2xOQ-xsNqO47m55DA.woff2') }}) format('woff2');
            unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */
        @font-face {
            font-family: 'Lato';
            font-style: normal;
            font-weight: 100;
            src: local('Lato Hairline'), local('Lato-Hairline'), url({{ URL::asset('assets/fonts/GtRkRNTnri0g82CjKnEB0Q.woff2') }}) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">Test</div>
    </div>
</div>
</body>
<script type="text/javascript" charset="UTF-8">
    wx.config(<?=$js->config(['getLocation', 'onMenuShareTimeline','onMenuShareAppMessage'],false);?>);
    wx.ready(function(){
        wx.checkJsApi({
            jsApiList: [
                'getLocation',
                'onMenuShareTimeline',
                'onMenuShareAppMessage'
            ],
            success: function (res) {
                if(res.checkResult.getLocation !== true){
                   alert('当前设备不支持获取地理位置');
                }
                if(res.checkResult.onMenuShareTimeline !== true){
                    alert('当前设备不支持分享到朋友圈');
                }
                if(res.checkResult.onMenuShareAppMessage !== true){
                    alert('当前设备不支持分享给好友');
                }
            }
        });
//	    wx.onMenuShareAppMessage({
//            title   : '测试哦',
//            desc    : '描述是个什么鬼',
//            link    : 'http://dc.leqiyi.cn/wechat/test/aaa',
//            imgUrl  : 'http://demo.open.weixin.qq.com/jssdk/images/p2166127561.jpg',
//	        type    : '',
//	        dataUrl : '',
//            trigger : function (res) {
//              alert('用户点击发送给朋友');
//            },
//            success : function (res) {
//               alert('已分享');
//            },
//            cancel  : function (res) {
//               alert('已取消');
//            },
//            fail: function (res) {
//               alert(JSON.stringify(res));
//            }
//        });
        wx.onMenuShareAppMessage({
            title: '互联网之子',
            desc: '在长大的过程中，我才慢慢发现，我身边的所有事，别人跟我说的所有事，那些所谓本来如此，注定如此的事，它们其实没有非得如此，事情是可以改变的。更重要的是，有些事既然错了，那就该做出改变。',
            link: 'http://movie.douban.com/subject/25785114/',
            imgUrl: 'http://demo.open.weixin.qq.com/jssdk/images/p2166127561.jpg',
            trigger: function (res) {
                // 不要尝试在trigger中使用ajax异步请求修改本次分享的内容，因为客户端分享操作是一个同步操作，这时候使用ajax的回包会还没有返回
                alert('用户点击发送给朋友');
            },
            success: function (res) {
                alert('已分享');
            },
            cancel: function (res) {
                alert('已取消');
            },
            fail: function (res) {
                alert(JSON.stringify(res));
            }
        });

    });
	

</script>

</html>
