<?php
    namespace Home\Controller;
    use Think\Controller;
class OrderIndexController extends Controller {
    public function index(){
        header("Content-Type:text/html; charset=utf-8");


        if(session('?username')){
            $this->assign('username',session('username'));


            //实例化订餐模型
            $order=M('order');
            $count=$order->count();

            //分页显示列表，每页8文章
            $Page       = new \Think\Page($count,25);//后台管理页面默认一页显示8条文章记录
            $show       = $Page->show();// 分页显示输出

            $order_list = $order->select();
            //$list = $User->order('order_time')->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('list',$list);// 赋值数据集
            $this->assign('page',$show);// 赋值分页输出
            //$this->display(); // 输出模板

            //$order_list=$order->field(array('id','order_meal','author','createtime'))->order('id desc')->limit($page->firstRow.','.$page->listRows)->select();

            //对原始信息过滤
            $this->filter($order_list);

            $this->assign('news_count',$count);
            $this->assign('title','后台管理系统');
            $this->assign('order_list',$order_list);
            $this->assign('page_method',$show);
            $this->display();

        }else{
            $this->error('您好，请先登录！！！',U('/Index/index/'));
        }
    }
    /**
     * @函数  filter
     * @功能  过滤订单信息
     */
    private function filter($list){

        foreach($list as $key=>$value){
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

    /**
     * @函数  edit
     * @功能  编辑-确认支付
     */
    public function edit($id)
    {
        $order = M('order');

        $result = $order->getFieldByid($id,'confirm_price');
        //print_r($result);
        if($result == '未支付'){
            $date['confirm_price'] = '已支付' ;
        }else{
            $date['confirm_price'] = '未支付' ;
        }
        //print_r($date['confirm_price']);
        $order->where('id = '.$id)->save($date);
        redirect(U('/Home/OrderIndex/Index'),0);
    }
    /**
     * @函数  delete
     * @功能  删除指定id信息
     */
    public function delete($id){
        header("Content-Type:text/html; charset=utf-8");
        $Del = M("order");
        $result = $Del->where('id='.$id)->delete();
        if ($result !== false){
            //redirect(U('/Home/OrderIndex/Index'),5,'订单信息删除失败，请重新删除。。。');
            redirect(U('/Home/OrderIndex/Index'),0);
        }else{
            redirect(U('/Home/OrderIndex/Index'),3,'订单信息删除失败，请重新删除。。。');
        }
    }

    /**
     * @函数  delete_all
     * @功能  删除所有订餐信息
     */
    public function delete_all(){
        $Del = M("order");
        $result = $Del->where('1')->delete();
        if ($result !== false){
            redirect(U('/Home/OrderIndex/Index'),0);
        }else{
            redirect(U('/Home/OrderIndex/Index'),3,'全部订单信息删除失败，请重新删除。。。');
        }
    }

    /**
     * @函数  quit
     * @功能  退出
     */
    public function quit(){
        session(null);//清空所有session信息
        redirect(U('/Home/Index/index'),0, '重新登录');

    }



}