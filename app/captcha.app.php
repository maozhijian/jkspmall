<?php

/**
 *    验证码
 *
 *    @author    Garbin
 *    @usage    none
 */
class CaptchaApp extends FrontendApp
{
    function index()
    {
        import('captcha_helper.lib');

        $vals = array(
            'img_path' => ROOT_PATH.'/data/files/captcha/',
            'img_url' => SITE_URL.'/data/files/captcha/',
            'img_width' => 80,
            'img_height' => 24,
            'expiration' => 7200
        );
        $cap = create_captcha($vals);

        $_SESSION['captcha'] = base64_encode(strtolower($cap['word']));
        header('Content-type: image/jpeg');
        imagejpeg($cap['im']);
        imagedestroy($cap['im']);
        exit();
    }
        //操蛋的ecmall的生成算法就是一坨屎，生成不出来还占位置
        //$this->_captcha(80, 24);

    /* 检查验证码 */
    function check_captcha()
    {
        $captcha = empty($_GET['captcha']) ? '' : strtolower(trim($_GET['captcha']));
        if (!$captcha)
        {
            echo ecm_json_encode(false);
            return ;
        }
        if (base64_decode($_SESSION['captcha']) != $captcha)
        {
            echo ecm_json_encode(false);
        }
        else
        {
            echo ecm_json_encode(true);
        }
        return ;
    }
}

?>