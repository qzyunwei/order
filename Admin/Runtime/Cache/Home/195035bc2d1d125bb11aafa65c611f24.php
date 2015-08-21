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

<script language="javascript" type="text/javascript">
        function IsNum(e) {
            var k = window.event ? e.keyCode : e.which;
            if (((k >= 48) && (k <= 57)) || k == 8 || k == 0) {
            } else {
                if (window.event) {
                    window.event.returnValue = false;
                }
                else {
                    e.preventDefault(); //for firefox
                }
            }
        }
    </script>

</head>

<body onload="refresh()">
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
            <li>餐厅菜单</li>
            <li>></li>
            <li>添加餐厅</li>
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
            <form action="save_menu" method="POST" accept-charset="utf-8" id="order">
              <fieldset>
                  <div class="controls">
                    <div class="control-group">
                      <label class="control-label">菜单名称：</label>
                      <div class="controls">
                        <input class="text-input" name="food_name" type="text" value="<?php echo ($edit_order["food_name"]); ?>">
                      </div>
                    </div>


                    <div class="control-group">
                      <label class="control-label">订餐价格：</label>
                      <div class="controls">
                        <input class="text-input"  name="food_price" type="text" value="<?php echo ($edit_order["food_price"]); ?>" onkeyup="value=value.replace(/[^\d]/g,'') "onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))"><span class="add-on">元</span>
                      </div>
                    </div>

                    <div class="control-group">
                      <label class="control-label">所属餐厅：</label>
                      <div class="controls">
                        <select name="shop_id">
                          <?php if(is_array($show_d)): $i = 0; $__LIST__ = $show_d;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php echo ($vo["is_select"]); ?>><?php echo ($vo["shopname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                      </div>
                    </div>

                    <div class="control-group">
                      <button type="submit" class="button control-group" ><?php echo ($act); ?></button>
                      <a href="/order/admin.php/Home/Menu/index"><button type="button" class="button control-group" >取消</button></a>
                    </div>
                  </div>
              </fieldset>
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