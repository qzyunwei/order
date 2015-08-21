<?php
    namespace Home\Controller;
    use Think\Controller;
class PublicController extends Controller {
    /**
     * @函数  quit
     * @功能  退出
     */
    function quit(){
        session(null);//清空所有session信息
        redirect(U('/Home/Index/index'),0, '重新登录');
    }

}