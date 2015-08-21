 <?php
    function toDate($time,$format='Y-m-d H:i:s ')
    {
        if( empty($time)) {
            return '';
        }
        $format = str_replace('#',':',$format);
        return date('m/d h:m',$time);
    }


    /**
     * @函数  delete
     * @功能  删除指定id信息
     */
    function delete($id){
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

 ?>