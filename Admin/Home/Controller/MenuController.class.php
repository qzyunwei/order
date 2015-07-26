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
    //菜单展示页面的删除
    function delete($id){
        header("Content-Type:text/html; charset=utf-8");
        $del = M('Menu');
        $result = $del->where('id='.$id)->delete();
        if ($result !== false){
            redirect(U('/Home/Menu/Index'),0);
        }else{
            //redirect(U('/Home/OrderIndex/Index'),5,'订单信息删除失败，请重新删除。。。');
            redirect(U('/Home/Menu/Index'),3,'请重新删除。。。');
        }
    }

    //菜单展示页面的编辑
    function edit($id){
        /*header("Content-Type:text/html; charset=utf-8");
        $edit = M('Menu');

        $edit_order = $edit->where('id ='.$id)->select();
        $this->assign('edit_order',$edit_order);
        $url=U('/Home/Menu/index');
        redirect($url,0, '');*/
    }

    //菜单录入保存
    function save(){
        $order = M('Menu');

        $Data['food_name'] = $_POST['food_name'];
        $Data['food_price'] = $_POST['food_price'];
        $Data['food_res'] = $_POST['food_res'];

        if ($lastInsId = $order->add($Data)) {
            $url=U('/Home/Menu/index/');
            redirect($url,0, '录入成功...');
        }else{
             $this->error("菜单录入失败！");
        }

    }

}

?>