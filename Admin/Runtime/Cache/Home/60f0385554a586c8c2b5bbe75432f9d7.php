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
            //public var num = 0;
            function show(obj){
                obj.src="/order/admin.php/Home/Common/verify/random/"+Math.random();
            }

            function validate(){
              var arr = ["username","pw1","pw2","verify"];
              var i = 0;
              var y = 0;
              document.getElementById("submit").disabled == false;
              while(i < 4){
                if(check(arr[i])){
                  alert("信息输入有误");
                  y = 1;
                  break;
                }
                i++;
              }
              if(y == 1){
                return false;
              }else{
                return true;
              }
            }

            function check(name){
              var x = document.getElementById(name);
              var btn = document.getElementById("submit");
              //alert(name);
              //判断用户名
              //alert(x.value.length);
              if(name == "username"){
                 // var username = document.getElementById("username").value;
                 if(x.value == "" || x.value.length < 2 || x.value.length >7){
                      showtxt("userdiv","账号不正确");
                      return btn.disabled = true;
                  }else{
                      $("#userdiv").load("/order/admin.php/Home/Index/verifyuser",{"user":x.value},function(response){
                      //alert(response);
                      if (response == 2) {
                        //alert(document.getElementById("userdiv").value.size() );
                        showpng("userdiv");
                        return btn.disabled = false;
                        //document.getElementById("submit").disabled = false;
                        //alert(document.getElementById("submit").disabled);
                        //document.getElementById("userdiv").innerHTML = "<img src='/order/public/Images/admin/icons/tick_circle.png' alt='' style='margin:4px 290px 0px 0px;'>";
                      }else{
                        showtxt("userdiv","用户名存在");
                        return btn.disabled = true;
                        //document.getElementById("userdiv").innerHTML = "<label style='margin:2px 230px 0px 0px;'><font color='red'>用户名存在！</font></label>";
                      }
                    });
                  }
              }
              //验证密码输入是否正确
              else if(name == "pw1"){
                if(x.value.length < 9 && x.value.length>5){
                  showpng("pw1div");
                  return btn.disabled = false;
                }
                else{
                  showtxt("pw1div","6-8位密码");
                  return btn.disabled = true;
                }

              }
              //验证密码是否一致
              else if(name == "pw2"){
                var password1 = document.getElementById("pw1").value;
                var password2 = document.getElementById("pw2").value;
                if(password1 == password2 && password2 !== ""){
                  showpng("pw2div");
                  return btn.disabled = false;
                  //document.getElementById("pw2div").innerHTML="<img src='/order/public/Images/admin/icons/tick_circle.png' style='margin:4px 290px 0px 0px'>";
                }
                else{
                  showtxt("pw2div","密码不一致");
                  return btn.disabled = true;
                  //document.getElementById("pw2div").innerHTML="<label style='margin:4px 240px 0px 0px'><font color='red'>密码不一致</font></label>";
                  //document.getElementById('submit').disabled = "disabled";
                }
              }
              //验证 验证码
              else if(name == "verify"){
                //var ver = document.getElementById("verify").value;

                if(x.value !== ""){
                  $("#verifydiv").load("/order/admin.php/Home/Index/addcheckverify",{"ver":x.value},function(response){
                    if(response == 1 && x.value !== ""){

                      showpng("verifydiv");
                      return btn.disabled = false;
                    }else{
                      alert("2");
                      showtxt("verifydiv","验证码错误");
                      return btn.disabled = true;
                      //document.getElementById("pw2div").innerHTML="<label style='margin:4px 240px 0px 0px'><font color='red'>密码不一致</font></label>";
                    }
                  });
                }else{
                  alert("1");
                  showtxt("verifydiv","验证码错误");
                  return btn.disabled = true;
                }
              }
            }


            //显示正确图片
            function showpng(id){
              document.getElementById(id).innerHTML = "<img src='/order/public/Images/admin/icons/tick_circle.png' alt='' style='margin:4px 290px 0px 0px;'>";
            }
            //显示错误的文字
            function showtxt(id,txt){
              document.getElementById(id).innerHTML="<label style='margin:4px 240px 0px 0px'><font color='red'>"+txt+"</font></label>";
            }
            //判断submit的disable属性
            function isdisable(){
              if(document.getElementById("submit").disabled == true){

              }else{
                document.getElementById("submit").disabled = false;
              }
            }

</script>

</head>

<body id="add">

  <!-- End #sidebar -->


    <div style="margin-top:30px;">

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

        <a href="/order/admin.php/Home/Index/index.html"><p style="margin:5px 0px 0px 15px">返回登录</p></a>
        </div>

        <div class="content-box-content">
            <div style="text-align:center; font-size:35px">
              <p><b>齐装订餐注册</b></p>
            </div>
            <!-- This is the target div. id must match the href of this div's tab -->
            <form onSubmit="return validate()" method="POST" accept-charset="utf-8" id="order">

                  <div class="" style="width:700px;margin:0 auto;margin-top:30px">

                    <div class="control-group">
                      <label class="control-label">用户名：</label>
                      <div class="controls">
                        <input class="text-input"  id="username" name="username" type="text" value="" onkeyup="check('username')">
                        <div id="userdiv"  style="float:right;margin-top:4px">
                        </div>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label">密码：</label>
                      <div class="controls" id="pwid">
                        <input class="text-input" name="password" id="pw1" type="password" value="" onkeyup="check('pw1')">
                        <div id="pw1div"  style="float:right;margin-top:4px">
                        </div>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label">确认密码：</label>
                      <div class="controls">
                        <input class="text-input" id="pw2" type="password" value="" onkeyup="check('pw2')">
                        <div id="pw2div"  style="float:right;margin-top:4px">

                        </div>
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
                        <input class="text-input" id="verify" name="" type="text" value="" onkeyup="check('verify')">
                        <div id="verifydiv"  style="float:right;margin-top:4px">
                        </div>
                      </div>
                    </div>
                    <div class="control-group" style="text-align:center">
                        <img src="/order/admin.php/Home/Common/verify" onclick="show(this)">
                    </div>


                    <div class="control-group" style="margin:20px 0px 0px 150px">
                      <button type="submit" id="submit" class="button control-group" value="注册">注册</button>
                      <button type="reset" class="button control-group" >取消</button>
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