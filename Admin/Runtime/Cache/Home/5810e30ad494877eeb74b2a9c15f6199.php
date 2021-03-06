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

        <h1 id="sidebar-title">
          <a href="#">Order Admin</a>
        </h1>
        <img id="logo" src="/order/Public/Images/admin/logo.png" alt="Simpla Admin logo" />

        <div id="profile-links">
          您好,
          <a href="#" title="当前用户:<?php echo ($username); ?>"><?php echo ($username); ?></a>
          |
          <a href="/order/admin.php/Home/MenuEntry/quit" title="退出">退出</a>
        </div>

        <ul id="main-nav">
          <!-- 类型为nav-top-itrm current 表示选中时的样式 -->
          <li>
            <a  href="#" class="nav-top-item current">订单 Order</a>
            <ul>
              <li>
                <a class="current" href="#">当前订单</a>
              </li>
              <!-- <li>
              <a href="#">获奖项目</a>
            </li>
            <li>
              <a href="#">开发课题</a>
            </li>
            -->
          </ul>
        </li>

        <li>
          <a href="#" class="nav-top-item">菜单 Menu</a>
          <ul>
            <li>
              <a href="/order/admin.php/Home/menu/index">今日菜单</a>
            </li>
            <li>
              <a href="#">菜单录入</a>
            </li>
          </ul>
        </li>

        <!-- <li>
        <a href="#" class="nav-top-item">研究生 Student</a>
        <ul>
          <li>
            <a href="#">研究生招收</a>
          </li>
          <li>
            <a href="#">研究生教育</a>
          </li>
          <li>
            <a href="#">在读研究生</a>
          </li>
          <li>
            <a href="#">毕业研究生</a>
          </li>
        </ul>
      </li>

      <li>
        <a href="#" class="nav-top-item">其他 Others</a>
        <ul>
          <li>
            <a href="#">软件</a>
          </li>
          <li>
            <a href="#">出版物</a>
          </li>
        </ul>
      </li>
      -->
    </ul>

  </div>
</div>
<!-- End #sidebar -->
in
<div id="main-content">

  <noscript>
    <!-- Show a notification if the user has disabled javascript -->
    <div class="notification error png_bg">
      <div>
        Javascript is disabled or is not supported by your browser. Please
        <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a>
        your browser or
        <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a>
        Javascript to navigate the interface properly.
        Download From
      </div>
    </div>
  </noscript>

  <!-- Page Head -->
  <h2>菜单收录系统</h2>
  <br></br>

<!-- <ul class="shortcut-buttons-set">
<li>
  <a class="shortcut-button" href="/order/admin.php/Home/OrderIndex/delete_all">
    <span>
      <img src="/order/Public/Images/admin/icons/pencil_48.png" alt="icon" />
      <br />
      清除全部订单
    </span>
  </a>
</li>
-->
</ul>

<div class="clear"></div>

<div class="content-box">

<!-- Start Content Box -->
<div class="content-box-header">

  <div class="clear"></div>
</div>
<div class="content-box-content">
  <div class="tab-content default-tab" id="tab1">
    <!-- This is the target div. id must match the href of this div's tab -->
    <div class="notification attention png_bg">
      <a href="#" class="close">
        <img src="/order/Public/Images/admin/icons/cross_grey_small.png" title="Close this notification" alt="close" />
      </a>
      <div>您好，<?php echo ($username); ?>，下面是订餐信息！</div>
    </div>

    <!-- 表头 -->
    <table>


      <!-- 表内容部分 -->
      <tbody>
        <p>
          <label>菜单：</label>
          <input  class="text-input" type="text" name='foot_name'>
        </p>

        <p>
          <label>价格：</label>
          <input  class="text-input" type="text" name='foot_price'>
        </p>

        <p>
          <label>餐厅名：</label>
          <input  class="text-input" type="text" name='foot_res'>
        </p>


      </tbody>

      <!-- 表尾 -->
      <tfoot>
        <tr>
          <td colspan="6">
            <div class="pagination">
              <?php echo ($page_method); ?>
              <!--
              <a href="#" title="First Page">&laquo; First</a>
              <a href="#" title="Previous Page">&laquo; Previous</a>
              <a href="#" class="number" title="1">1</a>
              <a href="#" class="number" title="2">2</a>
              <a href="#" class="number current" title="3">3</a>
              <a href="#" class="number" title="4">4</a>
              <a href="#" title="Next Page">Next &raquo;</a>
              <a href="#" title="Last Page">Last &raquo;</a>
              -->
            </div>
            <div class="clear"></div>
          </td>
        </tr>
      </tfoot>
    </table>
</div>

</div>
<!-- End .content-box-content -->
</div>
<!-- End .content-box -->
<!-- <div class="content-box column-left">
<div class="content-box-header">
<h3>内容框 左</h3>
</div>

<div class="content-box-content">
<div class="tab-content default-tab">
<h4>测试</h4>
<p>备用</p>
</div>
</div>
</div>

<div class="content-box column-right closed-box">
<div class="content-box-header">
<h3>内容框 右</h3>
</div>
<div class="content-box-content">
<div class="tab-content default-tab">
<h4>哈哈</h4>
<p>备用</p>
</div>

</div>
-->
</div>

<div class="clear"></div>

<!-- <div id="footer">
<small>
Remove this notice or replace it with whatever you want
&#169; Copyright 2015 qzw | Powered by
<a href="http://www.qizuang.com">szy</a>
|
<a href="#">Top</a>
</small>
</div>
-->
<!-- End #footer -->
</div>
<!-- End #main-content -->
</div>
</body>
<!-- Download From www.exet.tk-->
</html>