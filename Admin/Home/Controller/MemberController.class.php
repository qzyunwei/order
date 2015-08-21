<?php
    namespace Home\Controller;
    use Think\Controller;
class MemberController extends Controller {
    public function index(){
        $user = M('user');
        $user_list = $user->select();
        $count = $user->count();

        $this->assign('new_count',$count);
        $this->assign('user_list',$user_list);
        $this->assign('title','齐装订餐系统');
        $this->display();

    }
}