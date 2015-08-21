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

            function cheakuser(){

            }

</script>

</head>

<body id="add">

  <!-- End #sidebar -->


    <div style="margin-top:80px;">

      <noscript>
      <!-- Show a notification if the user has disabled javascript -->
          <div class="notification error png_bg">
              <div> Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
              Download From
              </div>
          </div>
      </noscript>



      <div class="content-box" style="height:600px">
        <!-- Start Content Box -->
        <div class="content-box-header">
          <h3></h3>
        </div>

        <div class="content-box-content">
            <div style="text-align:center; font-size:35px">
              <p><b>齐装订餐注册</b></p>
            </div>
            <!-- This is the target div. id must match the href of this div's tab -->
            <form action="save_user" method="POST" accept-charset="utf-8" id="order">

                  <div class="" style="width:700px;margin:0 auto;margin-top:30px">

                    <div class="control-group" >
                      <label class="control-label">用户名：</label>
                      <div class="controls">
                        <input class="text-input" id="username" name="username" type="text" value="">
                        <img src="/order/Public/images/icons/tick_circle" alt="">
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label">密码：</label>
                      <div class="controls">
                        <input class="text-input" name="password" id="pw1" type="text" value="">
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label">确认密码：</label>
                      <div class="controls">
                        <input class="text-input" id="pw2" type="text" value="">
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label">姓名：</label>
                      <div class="controls">
                        <input class="text-input" name="name" type="text" value="">
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label">电话：</label>
                      <div class="controls">
                        <input class="text-input" name="tel" type="text" value="">
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label">部门：</label>
                      <div class="controls">
                        <input class="text-input" name="department" type="text" value="<?php echo ($user_info["department"]); ?>">
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label">验证码：</label>
                      <div class="controls">
                        <input class="text-input" name="" type="text" value="">
                      </div>
                    </div>
                    <div class="control-group" style="text-align:center">
                        <img src="/order/admin.php/Home/Common/verify" onclick="show(this)">
                    </div>


                    <div class="control-group" style="margin:20px 0px 0px 150px">
                      <button type="" class="button control-group">注册</button>
                      <button type="reset" class="button control-group" >取消</button></a>
                    </div>
                  </div>

              <!--  -->
            </form>
          <!-- End #tab1-->
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