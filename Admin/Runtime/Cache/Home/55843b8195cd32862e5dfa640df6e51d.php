<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo ($title); ?></title>


<link rel="stylesheet" href="/order/Public/Css/admin/reset.css" type="text/css" media="screen" />
<!-- Main Stylesheet -->
<link rel="stylesheet" href="/order/Public/Css/admin/style.css" type="text/css" media="screen" />
<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
<link rel="stylesheet" href="/order/Public/Css/admin/invalid.css" type="text/css" media="screen" />


<script type="text/javascript" src="/order/Public/Js/admin/jquery-1.3.2.min.js"></script>
<!-- jQuery Configuration -->
<script type="text/javascript" src="/order/Public/Js/admin/simpla.jquery.configuration.js"></script>
<!-- Facebox jQuery Plugin -->
<script type="text/javascript" src="/order/Public/Js/admin/facebox.js"></script>
<!-- jQuery WYSIWYG Plugin -->
<script type="text/javascript" src="/order/Public/Js/admin/jquery.wysiwyg.js"></script>
<script>
            function show(obj){
                obj.src="/order/admin.php/Home/Common/verify/random/"+Math.random();
            }
</script>
</head>

<body id="login">

<div id="login-wrapper" class="png_bg">

    <div id="login-top">
        <h1><?php echo ($title); ?></h1>
        <p class="logo">齐装网订餐系统</p>
        <!-- Logo (221px width) -->
        <!-- <img id="logo" src="/order/Public/Images/admin/logo.png" alt="<?php echo ($title); ?>" /> -->
    </div>

    <!-- Form表单 -->
    <div id="login-content">
        <form action="/order/admin.php/Home/Index/login" method="POST">

            <div>
                <label>用户名</label>
                <input class="text-input" type="text"  name="username"/>
                <a href="/order/admin.php/Home/Index/adduser" style=" margin:10px">注册账号</a>
            </div>

            <div class="clear"></div>

            <div>
                <label>密码</label>
                <input class="text-input" type="password" name="password"/>
                <!-- <a href="/order/admin.php/" style=" margin:10px">忘了密码?</a> -->
            </div>

            <div class="clear"></div>

            <div>
                <label>验证码</label>
                <input class="text-input" type="text" name="verify_code"/>

            </div>

            <div style="margin-left:70px">
                <img src="/order/admin.php/Home/Common/verify" onclick="show(this)">
            </div>


            <!-- <p id="remember-password">
                        <input type="checkbox" />
                          记住我
                      </p> -->

            <div>
                <input class="button" style="margin:20px 0px 0px 50px; width:80px" type="submit" value="登录" />
                <input class="button" style="margin:20px 0px 0px 50px; width:80px" type="reset" value="取消" />
            </div>

        </form>
  </div>

</div>
</body>
</html>