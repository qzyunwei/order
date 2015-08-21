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

<script type="text/javascript" language="JavaScript" charset="utf-8" async defer>
    function getCity(oSelect){
        //oSelect是餐馆下拉框的对象
        //获取shop_list的对象
        //var sltProvince=document.getElementById("shop_list");
        //获得餐馆对象的值，也就是餐馆的id，传到后台获取相应的菜单。
        var value= oSelect.value;
        $("#menus_box").load("/order/admin.php/Home/StartOrder/ajax_menu",{'id':value});

    }
         /*//得到对应省份的城市数组
         var provinceCity=city[sltProvince.selectedIndex - 1];

         //清空城市下拉框，仅留提示选项
         sltCity.length=1;

         //将城市数组中的值填充到城市下拉框中
         for(var i=0;i<provinceCity.length;i++){
             sltCity[i+1]=new Option(provinceCity[i],provinceCity[i]);
         }*/

          //另一种传值方式，学习用
          /*$(function() {
            $("#menus_box").load("/order/admin.php/Home/StartOrder/ajax_menu/id/"+$("#shop_list").val());
            $("#shop_list").change(function(){
              $("#menus_box").load("/order/admin.php/Home/StartOrder/ajax_menu/id/"+$("#shop_list").val());
            });
          });*/


</script>

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
                       <li> <a  href="/order/admin.php/Home/StartOrder/index"><span class="nav-top-item">开始订餐</span></a></li>

            <div style="margin-bottom:7px">会员操作</div>

            <li> <a  href="/order/admin.php/Home/AdminOrder/index" ><span class="nav-top-item current">我的订单 My Order</span></a></li>
            <li><a  href="#" ><span class="nav-top-item">修改信息 Change Info</span></a></li>
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
            <li>开始订餐</li>
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
            <form action="start_order" method="POST" accept-charset="utf-8" id="order">
              <fieldset>
                <div class="control-group">
                  <label class="control-label" for="shop_list">餐馆</label>
                  <div class="controls">
                    <select id="shop_list"  data-rel="chosen" name="shop_id" onchange="getCity(this)">
                      <OPTION>请选择餐馆 </OPTION>
                      <?php if(is_array($shop)): $i = 0; $__LIST__ = $shop;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["shopname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="usergroup">菜单</label>
                  <div class="controls">
                    <span id="menus_box">
                      <select data-rel="chosen" id="txthint" name="order_food">
                          <option value="0">请选择</option>
                      </select>
                    </span>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="usergroup">数量</label>
                  <div class="controls">
                    <span id="menus_num">
                      <select data-rel="chosen" name="order_num">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                      </select>
                    </span>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="textarea">留言</label>
                  <div class="controls" >
                    <textarea class="cleditor" id="textarea" name="order_other" rows="5" ></textarea>
                  </div>
                </div>

                <div class="form-actions">
                  <button type="submit" class="button" style="width:100px; text-align:center">确定订餐</button>
                </div>




              </fieldset>
              <!-- <p ><b>订餐：</b>
              <input style="margin-right:50px" class="text-input small-input" type="text" name="order_food">
                 <b >数量：</b>
                 <input  class="text-input" style="width:30px" type="text" name="order_num" value="1">
              </p>
              <p><b>餐厅：</b>
                <input class="text-input small-input" type="text" name="order_res">
              </p>
              <p><b>备注：</b>
                <input class="text-input small-input" type="text" name="order_other">
              </p>
              <p>
                <input style="width:100px; text-align:center" class="button" type="submit" value="确定订餐">
              </p> -->
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