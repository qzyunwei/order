<?php
    namespace Home\Controller;
    use Think\Controller;

class MenuController extends Controller{
    public function index(){
        header("Content-Type:text/html; charset=utf-8");

        if(session('?username')){
            $this->assign('username',session('username'));


            //实例化订餐模型
            $menu=M('menu');
            $count=$menu->count();


            //分页显示列表，每页8文章
            $Page       = new \Think\Page($count,25);//后台管理页面默认一页显示8条文章记录
            $show       = $Page->show();// 分页显示输出
            //连表查询，通过订餐的shopid和餐厅的id关联，查询出所有订餐的信息。
            $sql = "select think_menu.id,think_menu.food_name,think_menu.food_price,think_shop.shopname from think_menu inner join think_shop on think_menu.shop_id = think_shop.id";
            $menu_list = $menu->query($sql);
            //查询餐厅的信息
            $shop = M('shop');
            $sql = "select * from think_shop";
            $shop_list = $shop->query($sql);

            //$list = $User->order('order_time')->limit($Page->firstRow.','.$Page->listRows)->select();
            //$this->assign('list',$list);// 赋值数据集
            //$this->assign('page',$show);// 赋值分页输出
            //$this->display(); // 输出模板

            //$order_list=$order->field(array('id','order_meal','author','createtime'))->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();

            //对原始信息过滤
            //$this->filter($menu_list);
            $this->assign('news_count',$count);
            $this->assign('title','齐装订餐系统');
            $this->assign('menu_list',$menu_list);
            $this->assign('shop_list',$shop_list);

            $this->display();
        }else{
             $this->error('您好，请先登录！！！',U('/'));
        }
    }


    //菜单展示页面的删除
    function del_menu($id){
        $del = M('menu');
        $result = $del->where('id='.$id)->delete();
        if ($result !== false){
            redirect(U('/Home/Menu/Index'),0);
        }else{
            //redirect(U('/Home/OrderIndex/Index'),5,'订单信息删除失败，请重新删除。。。');
            redirect(U('/Home/Menu/Index'),3,'请重新删除。。。');
        }
    }

    function del_shop($id){
        $del = M('shop');
        $result = $del->where('id='.$id)->delete();
        if ($result !== false){
            redirect(U('/Home/Menu/Index'),0);
        }else{
            //redirect(U('/Home/OrderIndex/Index'),5,'订单信息删除失败，请重新删除。。。');
            redirect(U('/Home/Menu/Index'),3,'请重新删除。。。');
        }
    }

    //菜单修改页面
    function edit($id,$str){
        header("Content-Type:text/html; charset=utf-8");
        //$info = $this->getinfo($id,$str);
        if(IS_GET){
            if($str == "menu"){
                $edit = M('menu');
                $info = $edit->where('id ='.$id)->find();
                //查询餐厅信息，以便在下拉框中显示
                $shop = $this->getshopinfo();
                //遍历查询的餐厅信息，并且判断当订单$info.shop_id和餐厅$shop.id一样时，
                //在餐厅信息中插入一条is_select，记录为“selscted”，用于显示所属的餐厅。
                foreach ($shop as $k => $value){
                if($info['shop_id'] == $value['id']){
                    $shop[$k]['is_select'] = 'selected';
                }
            }

                $this->assign('act','修改');
                $this->assign('show_d',$shop);
                $this->assign('edit_order',$info);
                $this->display('addmenu');
            }
            else if($str == "shop"){
                $edit = M('shop');
                $info = $edit->where('id ='.$id)->find();
                $this->assign('act','修改');
                $this->assign('edit_order',$info);
                $this->display('addshop');
            }else{
                $this->error("操作失误！");
            }
        }else{
            if ($str == "save_menu") {
                $order = M('menu');
                $d = I('POST.');
                $d['id'] = $id;
                //$d['shop_id'] = 1;
                $result = $order->save($d);
            }
            if($str == "save_shop"){
                $order = M('shop');
                $s = I('POST.');
                $s['id'] = $id;
                $result = $order->save($s);
            }

            if($result !== false){
               redirect(U('/Home/menu/index'),0);
            }else{
                $this->error('失败！');
            }

        }

    }

    //菜单录入保存
    function save_menu(){

        header("Content-Type:text/html; charset=utf-8");
        $order = M('menu');
        $d = I('POST.');
        dump($d);
        //$sql = "insert into think_shop(shopname) value ('$d[shopname]') ";
        if ($order->add($d)){
            $url = U('/Home/menu/index');
            redirect($url,0, '录入成功...');
        }else{
             $this->error("菜单录入失败！");
        }
    }

    //餐厅录入保存
    function save_shop(){
        header("Content-Type:text/html; charset=utf-8");
        $order = M('shop');
        $d = I('POST.');

        //$sql = "insert into think_shop(shopname) value ('$d[shopname]') ";
        if ($lastInsId=$order->add($d)){
            $url = U('/Home/menu/index');
            redirect($url,0, '录入成功...');
        }else{
             $this->error("菜单录入失败！");
        }

    }


    //添加菜单 按钮时  加载全部的餐厅
    function add_menu(){
        header("Content-Type:text/html; charset=utf-8");
        /*$shop = M('shop');
        $sql = "select * from think_shop";
        $show_s = $shop->query($sql);*/
        $show_s = $this->getshopinfo();
        $this->assign('act','添加');
        $this->assign('show_d',$show_s);
        $this->display('addmenu');
    }

    //添加餐厅 按钮时 按钮变化
    function add_shop(){
        header("Content-Type:text/html; charset=utf-8");
        $this->assign('act','添加');
        $this->display('addshop');
    }

    //获得现有餐厅的信息
    function getshopinfo(){
         $shop = M('shop');
        $sql = "select * from think_shop";
        $show_s = $shop->query($sql);

        if(empty($show_s)){
            $this->error('没有这个数据。');
        }
        return $show_s;
    }
}
?>