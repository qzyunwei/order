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
            <li> <a href="/order/admin.php/Home/member/index" ><span class="nav-top-item">会员管理</span></a></li>
         </ul>

    </div>
  </div>
  <!-- End #sidebar -->
  <!-- End #sidebar -->
  <!-- 浅色导航 -->
  <div class="menu">
          <ul>
            <li>首页</li>
            <li>></li>
            <li>会员管理</li>
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

    <div class="clear"></div>
    <!-- 菜单目录 -->
    <div class="content-box">

      <!-- 菜单目录导航 -->
      <div class="content-box-header">
        <h3>会员管理</h3>
        <ul class="content-box-tabs">
          <li><a href="#tab1" class="default-tab">目前会员人数(共<?php echo ($new_count); ?>个)</a></li>
        </ul>
      </div>
      <!-- 菜单目录导航----结束 -->
      <!-- 目录内部信息 -->


      <div class="content-box-content">
          <a href=""><input type="button" class="button" style="margin-bottom:10px" name="" value="添加会员"></a>
          <!-- This is the target div. id must match the href of this div's tab -->
          <!-- 表头 -->
          <table>
            <thead>
              <tr>
                <th width="20%">会员</th>
                <th width="20%">姓名</th>
                <th width="20%">联系方式</th>
                <th width="10%">部门</th>
                <th width="10%">备注</th>
                <th width="10%">创建时间</th>
                <th width="10%">操作</th>
              </tr>
            </thead>

            <!-- 表内容部分 -->
            <tbody>
              <?php if(is_array($user_list)): $i = 0; $__LIST__ = $user_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                  <td><?php echo ($vo["username"]); ?> </td>
                  <td><?php echo ($vo["name"]); ?> </td>
                  <td><?php echo ($vo["tel"]); ?></a></td>
                  <td><?php echo ($vo["department"]); ?></td>
                  <td><?php echo ($vo["info"]); ?></td>
                  <td><?php echo (date('Y/m/d',$vo["createtime"])); ?></td>
                  <td>
                    <!-- 操作按钮 -->
                    <a href="/order/admin.php/Home/Member/del_menu/id/<?php echo ($vo["id"]); ?>" title="删除"><img src="/order/Public/Images/admin/icons/cross.png" alt="删除" /></a>
                  </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
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
            <!-- 表尾----结束 -->
          </table>
          <!-- 表单----结束 -->

      </div>
      <!-- 目录内部信息----结束 -->
    </div>
    <!-- 菜单目录----结束 -->

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