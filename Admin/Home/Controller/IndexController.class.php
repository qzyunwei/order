<?php
    namespace Home\Controller;
    use Think\Controller;
class IndexController extends Controller {
    public function index(){


        $this->assign('title','后台管理系统');
        $this->display();
        //echo "admin";
       //$this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover,{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }

    public function login(){
        header("Content-Type:text/html; charset=utf-8");
        //检查验证码是否正确
        $this->checkverify($_POST["verify_code"]);


        //验证用户名
        $username = $_POST["username"];//  获取页面输入的用户名，密码
        $password = md5($_POST["password"]);



        $user = M("User");//参数的User必须首字母大写，否则自动验证功能失效！
       /* if ($user->where("username = '$username'AND password = '$password'")->find()) {
            //跳转
            session(username,$username);
            $url=U('Application/Home/Index/index/');
            redirect($url,0, '跳转中...');


            $this->success('success','/OrderIndex/index/');
        }*/
        if($list = $user->where("username = '$username'AND password = '$password'")->find()){
            session("username",$username);
            $name = $list["name"];
            session("name",$name);
            $url=U('/Home/OrderIndex/index/');
            redirect($url,0, '跳转中...');
        }
        else{
            $this->error("用户名密码错误！");
        }

    }

    function adduser(){

        if(IS_POST){
            $d = I('POST.');
            dump($d);
        }else{
            $this->display("add");
        }
    }



    //验证码
    function check_verify($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }
    //验证注册时
    function verifyuser(){


        $add_user = $_POST['user'];

        $user = M('user');
        $result = $user->where(" username = '$add_user' ")->find();
        //echo "<script>alert('$result');</script>";
        if(!empty($result)){
            //$rt = '<label style="margin:2px 230px 0px 0px;"><font color="red">用户名存在！</font></label>';
            $rt = "1";
        }else{
            //$rt = '<img src="/order/public/Images/admin/icons/tick_circle.png" alt="" style="margin:4px 290px 0px 0px;">';
            $rt = "2";
        }
        exit($rt);

    }
    function addcheckverify(){
        $qqq = $_SESSION;
        if($this->check_verify($_POST["ver"])){
            $rt = "1";
            //$rt = '<img src="/order/public/Images/admin/icons/tick_circle.png" alt="" style="margin:4px 290px 0px 0px;">';
        }else{
            $rt = "2";
            //$rt = '<label style="margin:2px 230px 0px 0px;"><font color="red">验证码错误！</font></label>';
        }
        exit($rt);
    }


    function checkverify($ver){
        if(!$this->check_verify($ver)){
            $this->error("验证码错误！");
        }
    }

    function save_user(){

    }

}