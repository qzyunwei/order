<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends  Controller{
    function verify(){
        //ob_clean这个函数的作用：用来丢弃输出缓冲区中的内容，
        //如果你的网站有许多生成的图片类文件，那么想要访问正确，就要经常清除缓冲区
        ob_clean();
        //导入验证码类
        $Verify = new \Think\Verify();
        $Verify->fontSize ='15';
        $Verify->length = '4';
        $Verify->imageW = '100';
        $Verify->imageH = '30';
        $Verify->useCurve = false;
        $Verify->codeSet = '0123456789';
        $Verify->entry();
        //session('verify_code',$verify) ;
        /*import("ORG.Util.Image");
        Image::buildImageVerify(4,1,'png',70,30);//静态方法*/
        /*英文验证码：buildImageVerify($length,$mode,$type,$width,$height,$verifyName)
         * 参数1：验证码长度，默认4
         * 参数2：类型，0为字母，1为数字，2为大写字母，3为小写字母，4为中文
         * 参数3：图片类型，默认png格式，若服务器没有开PNG，就改成其他格式
         * 参数4：图片宽度（根据长度自动计算）
         * 参数5：图片高度，默认22个像素
         * 参数6：验证码保存在Session的名称 'verify'

            中文验证码：GBVerify ($length,$type,$width,$height,$fontface,$verifyName)

            length ：验证码的长度，默认为 4 位数
            type ：验证码的图片类型，默认为 png
            width ：验证码的宽度，默认会自动根据验证码长度自动计算
            height ：验证码的高度，默认为 50
            fontface ：使用的字体文件，使用完整文件名或者放到图像类所在的目录下面，默认使用的字体文件是 simhei.ttf （该文件可以从 window 的 Fonts 目录下面找到）
            verifyName ：验证码的 SESSION 记录名称，默认为 verify

            如果无法显示验证码，请检查：
            PHP 是否已经安装 GD 库支持；
            输出之前是否有任何的输出（尤其是 UTF8 的 BOM 头信息输出）；
            Image 类库是否正确导入；
            如果是中文验证码检查是否有拷贝字体文件到类库所在目录；
         */
        //英文验证码
        //中文验证码
        //Image::GBVerify();
    }
}