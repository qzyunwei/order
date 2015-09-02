<?php
    namespace Home\Controller;
    use Think\Controller;
class StartOrderController extends Controller {
    public function index(){
        if(session('?username')){
            $this->assign('username',session('username'));
        }else{
            $this->error('您好，请先登录！！！',U('/'));
        }
        $shopData = M('shop');
        $shop = $shopData->order('order_id DESC ')->select();

        $this->assign('shop',$shop);
        $this->assign('title','齐装订餐系统');
        $this->display();
    }

    public function start(){

    }

    public function start_order(){
        header("Content-Type:text/html; charset=utf-8");


        $d = I("post.");
        if($d['menu_id'] == '' || $d['menu_id' == '0']){
            $this->error("请正确订餐",U('/Home/StartOrder/Index'));
        }
        $menu = M('menu');

        $d['order_name'] = session('name');
        $d['order_user'] = session('username');
        $m_info = $menu->field('food_name,food_price')->where('id='.$d['menu_id'])->find();
        dump($m_info);
        $shop = M('shop');
        $s_info = $shop->field('shopname')->where('id='.$d['shop_id'])->find();
        $d['order_res'] = $s_info['shopname'];

        $d['order_food'] = $m_info['food_name'];
        $d['order_time'] = time();
        //通过order_food和order_res，查询food_price
        $menu = M('menu');
        //$order_price = $menu->where("food_name = '$data[order_food]' AND food_res = '$data[order_res]'")->field('food_price')->find();
        $d['order_price'] = $m_info['food_price'];

        //添加新的订单信息
        $this->assign('order_info',$d);
        session('order',$d);
        $this->display('sure');


    }

    /*function aprice($order_food,$order_res){
        $menu = M('menu');
        $order_price = $menu->where("food_name = '$order_food' AND food_res = '$order_res'")->field('food_price')->find();
        return $order_price[food_price];
    }*/

    /**
     * @函数  sure_pay
     * @功能  确定支付，并将订餐信息添加到数据库中
     */
    public function sure_pay(){
        header("Content-Type:text/html; charset=utf-8");

        $d  = session('order');

        $order = M('order');
        if($id = $order->add($d)){
            unset ($_SESSION['order']);
            redirect(U('/Home/AdminOrder/Index'),0,"订单已下达，请确认···");
        }else{
            $this->error("未知问题，下单失败···",U('/Home/StartOrder/Index'));
        }


        /*if($order->where('id = '.$id)->save($date)){\\\\
            redirect(U('/Home/AdminOrder/Index'),3,"您已确认支付！");
        }else{
            $this->error("未知问题，下单失败,请重新下单···",U('/Home/StartOrder/Index'));
        }*/
    }

    /*public function delete($id){
        header("Content-Type:text/html; charset=utf-8");
        $Del = M("order");
        $result = $Del->where('id='.$id)->delete();
        if ($result !== false){
            //redirect(U('/Home/OrderIndex/Index'),5,'订单信息删除失败，请重新删除。。。');
            redirect(U('/Home/AdminOrder/Index'),0);
        }else{
            $this->error('订单信息删除失败，请重新删除。。。',('/Home/OrderIndex/Index'));
        }
    }
*/

    /**
     * @函数  ajax_menu
     * @功能  订餐界面二级联动，根据所选的餐馆查找相应的菜单。
     */
    public function ajax_menu(){
        $id = $_POST["id"];
        $data = M("menu");

        $result = $data->where("shop_id = '$id' ")->select();


        $rt = '<select name="menu_id" id="menu_id">';
        if(empty($result)){
            $rt .= '<option value="">该餐馆暂无点餐！</option>';;
        }else{
            foreach ($result as $k => $v) {
                $rt .= '<option value="'.$v["id"].'">'.$v["food_name"].'   '.$v["food_price"].'元</option>';
            }
        }
        $rt .= '</select>';
        exit($rt);
    }

}