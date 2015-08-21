<?php
    namespace Home\Controller;
    use Think\Controller;
class AdminOrderController extends Controller {
    public function index(){
        header("Content-Type:text/html; charset=utf-8");


        if(session('?username')){
            $this->assign('username',session('username'));


            //实例化订餐模型
            $order=M('order');
           //分页显示列表，每页8文章
            $Page       = new \Think\Page($count,25);//后台管理页面默认一页显示8条文章记录
            $show       = $Page->show();// 分页显示输出

            $name = session('username');
            //查询 order_name = 登录名的 订单详情，并按照order_time排序，desc采用降序的方式
            $order_list = $order->where("order_name ='$name' ")->order("order_time desc")->select();
            $count=$order->where("order_name ='$name' ")->count();
            //$list = $User->order('order_time')->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('list',$list);// 赋值数据集
            $this->assign('page',$show);// 赋值分页输出
            //$this->display(); // 输出模板

            //$order_list=$order->field(array('id','order_meal','author','createtime'))->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();

            //对原始信息过滤
            $this->filter($order_list);

            $this->assign('news_count',$count);
            $this->assign('title','齐装网订餐系统');
            $this->assign('order_list',$order_list);
            $this->assign('page_method',$show);
            $this->display();

        }else{
            $this->error('您好，请先登录！！！',U('/'));
        }
    }
    /**
     * @函数  filter
     * @功能  过滤订单信息
     */
    private function filter($list){

        foreach($list as $key=>$value){
            //$order_list[todate_time] = date("Y-m-d",$order_list[todate_time]);
            $list[$key][order_time] = toDate($list[$key][order_time]);
            //设置显示的创建时间
            /*$list[$key]['createtime']=date("Y-m-d H:i:s",$value['createtime']);

            //设置显示的最后修改时间
            if(!$value['lastmodifytime']){
                $list[$key]['lastmodifytime']="无";
            }else{
                $list[$key]['lastmodifytime']=date("Y-m-d H:i:s",$value['lastmodifytime']);
            }

            //文章标题过长时裁剪
            if(strlen($list[$key]['subject'])>80){
                    $list[$key]['subject']=$this->cutString($list[$key]['subject'],0,20).'...';
            }*/
        }
    }


    public function edit($id){
        $order = M('order');

        $result = $order->getFieldByid($id,'pay_price');
        //print_r($result);
        if($result == '未支付'){
            $date['pay_price']  = '已支付' ;
        }else{
            $date['pay_price'] = '未支付' ;
        }
        //print_r($date['confirm_price']);
        $order->where('id = '.$id)->save($date);
        redirect(U('/Home/AdminOrder/Index'),0);
    }

    private function delete($id){
        delete($id);
    }

}