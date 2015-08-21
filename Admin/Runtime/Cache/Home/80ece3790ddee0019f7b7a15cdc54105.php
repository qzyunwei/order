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
  <!-- 浅色导航 -->
  <div class="menu">
          <ul>
            <li>首页</li>
            <li>></li>
            <li>订餐详情</li>
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



      <!-- <ul class="shortcut-buttons-set">
        <li>
          <a class="shortcut-button" href="/order/admin.php/Home/OrderIndex/delete_all">
              <span>
                  <img src="/order/Public/Images/admin/icons/pencil_48.png" alt="icon" /><br />
                  清除全部订单
              </span>
          </a>
        </li>
      </ul>
       -->


    <div class="clear"></div>



    <div class="content-box">

      <!-- Start Content Box -->
      <div class="content-box-header">
        <h3></h3>
        <ul class="content-box-tabs">
          <li><a href="#tab1" class="default-tab">订餐列表(共<?php echo ($news_count); ?>人)</a></li>
          <!-- href must be unique and match the id of target div -->
          <!-- <li><a href="#tab2">登录记录</a></li> -->
        </ul>
        <div class="clear"></div>
      </div>

      <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
          <!-- This is the target div. id must match the href of this div's tab -->
          <div class="notification attention png_bg"> <a href="#" class="close"><img src="/order/Public/Images/admin/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
            <div>您好，<?php echo ($username); ?>，下面是订餐信息！ </div>
          </div>

          <!-- 表头 -->
          <table >
            <thead>
              <tr>

                <th >订餐</th>
                <th>餐厅</th>
                <th>订餐人</th>
                <th>数量</th>
                <th>订餐时间</th>
                <th>价格</th>
                <th>备注</th>
                <th>订餐支付</th>
                <th>支付确认</th>
                <th>操作</th>
              </tr>
            </thead>

            <!-- 表内容部分 -->
            <tbody>
              <?php if(is_array($order_list)): $i = 0; $__LIST__ = $order_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>

                <td><?php echo ($vo["order_food"]); ?> </td>
                <td><?php echo ($vo["order_res"]); ?></td>
                <td><?php echo ($vo["order_name"]); ?></td>
                <td><?php echo ($vo["order_num"]); ?></td>
                <td><?php echo (date('m/d H:i',$vo["order_time"])); ?> </td>
                <td><?php echo ($vo["order_price"]); ?> </td>
                <th><?php echo ($vo["order_other"]); ?></th>
                <td><?php echo ($vo["pay_price"]); ?> </td>
                <td><?php echo ($vo["confirm_price"]); ?> </td>
                <td>
                  <!-- 操作按钮 -->
                  <a href="/order/admin.php/Home/OrderIndex/edit/id/<?php echo ($vo["id"]); ?>" title="编辑"><img src="/order/Public/Images/admin/icons/pencil.png" alt="编辑" /></a>
                  <a href="/order/admin.php/Home/OrderIndex/delete/id/<?php echo ($vo["id"]); ?>" title="删除"><img src="/order/Public/Images/admin/icons/cross.png" alt="删除" /></a>

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
        </div>



        <!-- End #tab1 -->
        <!-- <div class="tab-content" id="tab2">
          <form action="#" method="post">
            <fieldset>
            Set class to "column-left" or "column-right" on fieldsets to divide the form into columns
            <p>
              <label>Small form input</label>
              <input class="text-input small-input" type="text" id="small-input" name="small-input" />
              <span class="input-notification success png_bg">Successful message</span>
              Classes for input-notification: success, error, information, attention
              <br />
              <small>A small description of the field</small> </p>
            <p>
              <label>Medium form input</label>
              <input class="text-input medium-input datepicker" type="text" id="medium-input" name="medium-input" />
              <span class="input-notification error png_bg">Error message</span> </p>
            <p>
              <label>Large form input</label>
              <input class="text-input large-input" type="text" id="large-input" name="large-input" />
            </p>
            <p>
              <label>Checkboxes</label>
              <input type="checkbox" name="checkbox1" />
              This is a checkbox
              <input type="checkbox" name="checkbox2" />
              And this is another checkbox </p>
            <p>
              <label>Radio buttons</label>
              <input type="radio" name="radio1" />
              This is a radio button<br />
              <input type="radio" name="radio2" />
              This is another radio button </p>
            <p>
              <label>This is a drop down list</label>
              <select name="dropdown" class="small-input">
                <option value="option1">Option 1</option>
                <option value="option2">Option 2</option>
                <option value="option3">Option 3</option>
                <option value="option4">Option 4</option>
              </select>
            </p>
            <p>
              <label>Textarea with WYSIWYG</label>
              <textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="79" rows="15"></textarea>
            </p>
            <p>
              <input class="button" type="submit" value="Submit" />
            </p>
            </fieldset>
            <div class="clear"></div>
            End .clear
          </form>
        </div> -->
        <!-- End #tab2 -->
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
          <p> 备用 </p>
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
          <p> 备用 </p>
        </div>

      </div>

    </div> -->

    <div class="clear"></div>


    <div id="footer"> <small>
      <!-- Remove this notice or replace it with whatever you want -->
      &#169; Copyright 2010 qizuang.com | Powered by szy | <a href="#">Top</a> </small> </div>
    <!-- End #footer -->
  </div>
  <!-- End #main-content -->
  <!-- End #main-content -->
</div>
</body>
<!-- Download From www.exet.tk -->
</html>