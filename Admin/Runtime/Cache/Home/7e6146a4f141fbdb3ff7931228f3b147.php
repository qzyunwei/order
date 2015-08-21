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


<!--   <div id="body-wrapper">

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
            <li> <a href="/order/admin.php/Home/member/index" ><span class="nav-top-item">会员管理</span></a></li>
         </ul>

    </div>
  </div>
  <!-- End #sidebar --> -->
  <!-- 浅色导航 -->
  <div class="menu">
          <ul>
            <li>首页</li>
            <li>></li>
            <li>开始订餐</li>
            <li>></li>
            <li>订餐确认</li>
          </ul>
  </div>

  <div id="main-content">

    <noscript>
    Show a notification if the user has disabled javascript
        <div class="notification error png_bg">
            <div> Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
            Download From
            </div>
        </div>
    </noscript>

    <div class="content-box">

      <!-- Start Content Box -->
      <div class="content-box-header">
      </div>

      <div class="content-box-content">
          <!-- 表头 -->

          <table >
            <thead>
              <tr>
                <th >订餐人</th>
                <th >订餐</th>
                <th>餐厅</th>
                <th>数量</th>
                <th>订餐时间</th>
                <th>价格</th>
                <th>备注</th>
              </tr>
            </thead>

            <!-- 表内容部分 -->
            <tbody>
              <tr>
                <td><?php echo ($order_info["order_name"]); ?> </td>
                <td><?php echo ($order_info["order_food"]); ?> </td>
                <td><?php echo ($order_info["order_res"]); ?></td>
                <td><?php echo ($order_info["order_num"]); ?></td>
                <td><?php echo (date('H:i',$order_info["order_time"])); ?> </td>
                <td><?php echo ($order_info["order_price"]); ?></td>
                <td><?php echo ($order_info["order_other"]); ?></td>
              </tr>


            </tbody>
          </table>
          <a href="/order/admin.php/Home/StartOrder/sure_pay" title="确认支付"><button type="submit" class="button" style="margin:50px 50px 20px 500px">确认支付</button></a>
          <a href="/order/admin.php/Home/StartOrder/index"><button type="button" class="button" style="margin:50px 200px 20px 50px">取消订单</button></a>
      </div>
    </div>

    <div id="footer"> <small>
      <!-- Remove this notice or replace it with whatever you want -->
      &#169; Copyright 2010 qizuang.com | Powered by szy | <a href="#">Top</a> </small> </div>
    <!-- End #footer -->
  </div>
  <!-- End #main-content -->
  </div>
</body>
<!-- Download From www.exet.tk -->
</html>