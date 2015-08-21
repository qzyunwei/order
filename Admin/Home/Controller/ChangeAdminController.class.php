<?php
    namespace Home\Controller;
    use Think\Controller;
class ChangeAdminController extends Controller {
    public function index(){
        header("Content-Type:text/html; charset=utf-8");


        if(session('?username')){

            $user = M('user');
            $d = session('username');
            $sql = "select * from think_user where username = '$d'  ";
            $user_info = $user->where("username = '$d'") ->find();
            /*$user_info = array();
            //单条数据查询 一维数组
            $user_info =mysql_fetch_row($sql);*/
            //$user_info = $user->find($sql);
            $this->assign('username',session('username'));
            $this->assign('user_info',$user_info);
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

    //保存基本信息
    function save_user(){
        if(IS_POST){
            $d = I('POST.');
            $user = M('user');
            $name = session('username');

            if($user->where("username = '$name' ")->save($d)){
                $url = U("/Home/AdminOrder/Index");
                redirect($url,0);
            }else{
                $this->error("信息无修改！");
            }
        }else{
            $url = U("/Home/AdminOrder/Index");
            redirect($url,0);
        }
    }

    //修改密码
    function save_password(){
        if(IS_POST){
            $d = I('POST.');

            $user = M('user');
            $name = session('username');
            $array = $user->field('password')->where("username = '$name' ")->find();

            if($array["password"] == md5($d["password_old"])){
                $new["password"] = md5($d["password_new"]);
                dump($d["password_new"]);
                dump($new["password"]);
                $user->where("username = '$name' ")->save($new);
                redirect(U("/Home/AdminOrder/Index"),0);
            }else{
                $this->error("您输入的密码有误，请重试！");
            }
        }else{
            if(session('?username')){
                $this->assign('username',session('username'));
                $this->display('pass');
            }else{
                $this->error('您好，请先登录！！！',U('/'));
            }
        }



    }

}