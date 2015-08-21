<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($title); ?></title>


<link rel="stylesheet" href="/order/Public/Css/admin/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/order/Public/Css/admin/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/order/Public/Css/admin/invalid.css" type="text/css" media="screen" />

<script type="text/javascript" src="/order/Public/Js/admin/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="/order/Public/Js/admin/simpla.jquery.configuration.js"></script>
<script type="text/javascript" src="/order/Public/Js/admin/facebox.js"></script>
<script type="text/javascript" src="/order/Public/Js/admin/jquery.wysiwyg.js"></script>


</head>

<body>
<div id="body-wrapper">

  <div id="sidebar">
    <div id="sidebar-wrapper">

        <h1 id="sidebar-title"><a href="#">Order Admin</a></h1>
        <h2 style = " color:white; margin-left: 20px; margin-top: 20px; margin-bottom: 20px " >齐装订餐系统</h2>


        <div id="profile-links">
            您好,<a href="#" title="当前用户:<?php echo ($username); ?>"><?php echo ($username); ?></a> |
            <a href="/order/admin.php/Home/Public/quit" title="退出">退出</a>
        </div>

        <ul id="main-nav">
            <!-- 类型为nav-top-itrm current 表示选中时的样式
                       nav-top-item 表示没有选中的样式-->
            <li> <a  href="/order/admin.php/Home/AdminOrder/index" ><span class="nav-top-item current">我的订单 My Order</span></a></li>
            <div style="margin-bottom:7px">会员操作</div>
            <li> <a  href="/order/admin.php/Home/StartOrder/index"><span class="nav-top-item">开始订餐</span></a></li>
            <li><a  href="/order/admin.php/Home/ChangeAdmin/index" ><span class="nav-top-item">修改信息 Change Info</span></a></li>
            <div style="margin-bottom:7px">管理</div>
            <li><a href="/order/admin.php/Home/OrderIndex/index"><span class="nav-top-item">订餐详情</span> </a></li>
            <li><a href="#"><span class="nav-top-item">订餐核对</span> </a></li>
            <li> <a href="/order/admin.php/Home/menu/index" ><span class="nav-top-item">餐厅菜单</span></a></li>
            <li> <a href="#" ><span class="nav-top-item">会员管理</span></a></li>
         </ul>

    </div>
  </div>
  <!-- End #sidebar -->
  <!-- End #sidebar -->
    <div class="menu">
          <ul>
            <li>首页</li>
            <li>></li>
            <li>修改密码</li>
          </ul>
    </div>

    <div id="main-content">

      <noscript>
      <!-- Show a notification if the user has disabled javascript -->
          <div class="notification error png_bg">
              <div> Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
              Download From
              </div>
          </div>
      </noscript>



      <div class="content-box">
        <!-- Start Content Box -->
        <div class="content-box-header">
          <h3></h3>
        </div>

        <div class="content-box-content">

            <!-- This is the target div. id must match the href of this div's tab -->
            <form action="save_password" method="POST" accept-charset="utf-8" id="order">
              <fieldset>
                  <div class="controls">
                    <div class="control-group">
                      <label class="control-label" for="focusedInput">用户名：</label>
                      <div class="controls">
                        <p class="text-input" name="shopname" id="focusedInput" type="text" value="sdfghjk"><?php echo ($username); ?></p>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label">旧密码：</label>
                      <div class="controls">
                        <input class="text-input" id="old" name="password_old" type="text" value="">
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label">新密码：</label>
                      <div class="controls">
                        <p><input class="text-input" id="new_pw1" name="password_new" type="text" value="<?php echo ($user_info["tel"]); ?>" onkeyup="validate()"><span id="info_old" style="margin-left:10px" > </span></p>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label">确认密码：</label>
                      <div class="controls">
                        <p><input class="text-input" id="new_pw2" name="password_new_again" type="text" value="<?php echo ($user_info["department"]); ?>" onkeyup="validate()"><span id="info" style="margin-left:10px" > </span></p>

                      </div>
                    </div>



                    <div class="control-group">
                      <p><button type="submit" class="button control-group" id="submit">修改</button>
                      <input class="button control-group" type="reset" value="重置"/></p>
                    </div>
                  </div>
              </fieldset>
              <!--  -->
            </form>
          <!-- End #tab1-->
          <script>
            function validate() {
                var old = document.getElementById("old").value;
                var pw1 = document.getElementById("new_pw1").value;
                var pw2 = document.getElementById("new_pw2").value;
                if(old !== pw1){
                  document.getElementById("info_old").innerHTML="<font color='green'>密码输入正确</font>";
                    if(pw2 !== ""){
                        if(pw1 == pw2) {
                          document.getElementById("info").innerHTML="<font color='green'>密码输入正确</font>";
                          document.getElementById("submit").disabled = false;
                        }
                        else {
                          document.getElementById("info").innerHTML="<font color='red'>两次密码不相同</font>";
                          document.getElementById("submit").disabled = true;
                        }
                    }
                }else{
                  document.getElementById("info_old").innerHTML="<font color='red'>新密码不能与原密码一致</font>";
                  document.getElementById("submit").disabled = true;
                }
            }

          </script>

        </div>
        <!-- End .content-box-content -->
      </div>
      <!-- End .content-box -->
      <div id="footer"> <small>
      <!-- Remove this notice or replace it with whatever you want -->
      &#169; Copyright 2010 qizuang.com | Powered by szy | <a href="#">Top</a> </small> </div>
    <!-- End #footer -->
  </div>
  <!-- End #main-content -->
    </div>
</body>
<!-- Download From www.exet.tk-->
</html>