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
            <li>餐厅菜单</li>
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
        <h3>菜单目录</h3>
        <ul class="content-box-tabs">
          <li><a href="#tab1" class="default-tab">菜单列表(共<?php echo ($news_count); ?>个)</a></li>
        </ul>
      </div>
      <!-- 菜单目录导航----结束 -->
      <!-- 目录内部信息 -->
      <div class="content-box-content">

          <!-- This is the target div. id must match the href of this div's tab -->
          <!-- 表头 -->
          <table>
            <thead>
              <tr>
                <th></th>
                <th>菜单</th>
                <th>价格</th>
                <th>餐厅</th>
                <th>操作</th>
              </tr>
            </thead>

            <!-- 表内容部分 -->
            <tbody>
              <?php if(is_array($menu_list)): $i = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                  <td></td>
                  <td><?php echo ($vo["food_name"]); ?> </td>
                  <td><?php echo ($vo["food_price"]); ?></a></td>
                  <td><?php echo ($vo["shopname"]); ?></td>
                  <td>
                    <!-- 操作按钮 -->
                    <a href="/order/admin.php/Home/Menu/edit/id/<?php echo ($vo["id"]); ?>/str/menu" title="编辑"><img src="/order/Public/Images/admin/icons/pencil.png" alt="编辑" /></a>
                    <a href="/order/admin.php/Home/Menu/del_menu/id/<?php echo ($vo["id"]); ?>" title="删除"><img src="/order/Public/Images/admin/icons/cross.png" alt="删除" /></a>

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

          <a href="/order/admin.php/Home/Menu/add_menu" ><button type="button" class="button">新增菜单</button></a>
      </div>
      <!-- 目录内部信息----结束 -->
    </div>
    <!-- 菜单目录----结束 -->


        <!-- <div class="tab-content" id="tab2">
          <form action="/order/admin.php/Home/Menu/save" method="post">
            <fieldset>
            Set class to "column-left" or "column-right" on fieldsets to divide the form into columns
            <p>
              <label>菜单</label>
              <input class="text-input small-input" type="text" id="small-input" name="food_name" />
              <span class="input-notification success png_bg">Successful message</span>
              Classes for input-notification: success, error, information, attention
              <br />
              <small>输入菜名！</small>
            </p>
            <p>
              <label>价格</label>
              <input class="text-input medium-input datepicker" type="text" id="medium-input" name="food_price" />
              <span class="input-notification error png_bg">Error message</span>
            </p>
            <p>
              <label>餐厅</label>
              <input class="text-input large-input" type="text" id="large-input" name="food_res" />
            </p> -->
            <!-- <p>
              <label>Checkboxes</label>
              <input type="checkbox" name="checkbox1" />
              This is a checkbox
              <input type="checkbox" name="checkbox2" />
              And this is another checkbox </p>
            <p>
              <label>Radio buttons</label>
              <input type="radio" name="radio1" />
              This is a radio button<br />
              <input type="radio" name="radio1" />
              This is another radio button </p>
            <p>
              <label>This is a drop down list</label>
              <select name="dropdown" class="small-input">
                <option value="option1">Option 1</option>
                <option value="option2">Option 2</option>
                <option value="option3">Option 3</option>
                <option value="option4">Option 4</option>
              </select></p>
            <p>
              <label>Textarea with WYSIWYG</label>
              <textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="79" rows="15"></textarea>
            </p> -->
           <!--  <p>
             <input class="button" type="submit" value="保存" />
           </p>
           </fieldset>
           <div class="clear"></div>
           End .clear
                     </form>
                   </div> -->
        <!-- End #tab2 -->




    <!-- 订餐餐厅的显示 -->
    <div class="content-box" style="margin-top:50px">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h3>餐厅</h3>
      </div>

      <div class="content-box-content">
        <div class="tab-content default-tab">
          <!-- This is the target div. id must match the href of this div's tab -->
          <!-- 表头 -->
          <table>
            <thead>
              <tr>
                <th></th>
                <th>餐厅</th>
                <th>联系电话</th>
                <th>地址</th>
                <th>起送价格</th>
                <th>备注</th>
                <th>操作</th>
              </tr>
            </thead>

            <!-- 表内容部分 -->
            <tbody>
              <?php if(is_array($shop_list)): $i = 0; $__LIST__ = $shop_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td></td>
                <td><?php echo ($vo["shopname"]); ?> </td>
                <td><?php echo ($vo["phone"]); ?></td>
                <td><?php echo ($vo["address"]); ?></td>
                <td><?php echo ($vo["start_price"]); ?></td>
                <td><?php echo ($vo["info"]); ?></td>
                <td>
                  <!-- 操作按钮 -->
                  <a href="/order/admin.php/Home/Menu/edit/id/<?php echo ($vo["id"]); ?>/str/shop" title="编辑"><img src="/order/Public/Images/admin/icons/pencil.png" alt="编辑" /></a>
                  <a href="/order/admin.php/Home/Menu/del_shop/id/<?php echo ($vo["id"]); ?>" title="删除"><img src="/order/Public/Images/admin/icons/cross.png" alt="删除" /></a>

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
          </table>
          <a href="/order/admin.php/Home/Menu/add_shop" ><button type="button" class="button">新增餐厅</button></a>
        </div>
      </div>
    </div>
    <!-- End .content-box -->
    <!-- <div class="content-box column-left">
      <div class="content-box-header">
        <h3>内容框 左</h3>
      </div>
      End .content-box-header
      <div class="content-box-content">
        <div class="tab-content default-tab">
          <h4>测试</h4>
          <p> 备用 </p>
        </div>
        End #tab3
      </div>
      End .content-box-content
    </div>
    End .content-box
    <div class="content-box column-right closed-box">
      <div class="content-box-header">
        Add the class "closed" to the Content box header to have it closed by default
        <h3>内容框 右</h3>
      </div>
      End .content-box-header
      <div class="content-box-content">
        <div class="tab-content default-tab">
          <h4>哈哈</h4>
          <p> 备用 </p>
        </div>
        End #tab3
      </div>
      End .content-box-content
    </div>
    End .content-box
    <div class="clear"></div> -->


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