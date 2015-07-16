<?php
    namespace Home\Controller;
    use Think\Controller;
class MenuController extends Controller{
    public function index(){
        header("Content-Type:text/html; charset=utf-8");

        if(session('?username')){
            $this->assign('username',session('username'));


            //实例化订餐模型
            $order=M('menu');
            $count=$order->count();

            //分页显示列表，每页8文章
            $Page       = new \Think\Page($count,25);//后台管理页面默认一页显示8条文章记录
            $show       = $Page->show();// 分页显示输出

            $menu_list = $order->select();
            //$list = $User->order('order_time')->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('list',$list);// 赋值数据集
            $this->assign('page',$show);// 赋值分页输出
            //$this->display(); // 输出模板

            //$order_list=$order->field(array('id','order_meal','author','createtime'))->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();

            //对原始信息过滤
            //$this->filter($menu_list);

            $this->assign('news_count',$count);
            $this->assign('title','后台管理系统');
            $this->assign('menu_list',$menu_list);

            $this->display();
        }else{
             $this->error('您好，请先登录！！！',U('/Index/index/'));
        }
    }
}

?>