<?php 
/*
 * 指向webroot 的 前端控制器，主要为了安全.
 * 主要做一些安全检测工作，并且屏蔽对于其他文件的访问。不用将所有文件暴露
 * @author maxmys
 * @date 2013-5-12
 */
$request_app = isset($_GET['app'])? $_GET['app'] : null;
$request_act = isset($_GET['act'])? $_GET['act'] : null;

$md5_request = md5($request_app.$request_act);

$allow_app = allow_array();

$md5_array = array();
foreach( $allow_app as $row ) {

    $md5_array[] = md5($row);
}//End Of Foreach

if( ! in_array($md5_request, $md5_array) ) {

    mys_show404($request_app.$request_act);
    die();
}//End Of If



//载入ecmall 启动
require('../index.php');


function mys_show404 ($url) {
    $html404 = <<<EOT
<html><head>
<title>404 Not Found</title>
</head><body>
<h1>Not Found</h1>
<p>The requested URL /admin wasn't found on this server.</p>
<p>Request: $url .</p>
<hr>
<address>Apache/2.2.20 (Ubuntu) Server at www.runmall.com Port 80</address>

</body></html>
EOT;
    echo $html404;
}



function allow_array() {

    return array(
        '',
        'swfupload',
        'jslang',
        'search',
        'searchstore',
        'searchindex',

        'category',

        'article',
        'articleview',
        'articlesystem',

        'goods',
        'goodscomments',
        'goodssaleslog',

        'storesearch',

        'cart',
        'cartupdate',
        'cartdrop',
        'cartadd',

        'store',

        'my_favorite',
        'my_favoritedrop',
        'my_favoriteadd',

        'my_address',
        'my_addressadd',
        'my_addressedit',
        'my_addressdrop',

        'my_goods',
        'my_goodsdrop_image',
        'my_goodsajax_col',
        'my_goodsadd',
        'my_goodsdrop',
        'my_goodscheck_mgcate',
        'my_goodsedit',
        'my_goodsbatch_edit',
        'my_goodsbrand_list',
        'my_goodsimport_taobao',

        'my_category',
        'my_categoryexport',
        'my_categoryimport',
        'my_categoryadd',
        'my_categorydrop',
        'my_categoryedit',
        'my_categorycheck_category',
        'my_categoryajax_col',
        
        'member',
        'member',
        'memberprofile',
        'memberpassword',
        'memberemail',
        'memberlogin',
        'memberlogout',
        'memberregister',

        'find_password',

        'messagenewpm',
        'messageprivatepm',
        'messagesystempm',
        'messagesend',

        'friend',
        'friendadd',
        'frienddrop',
        'messageview',

        'cashier',
        'cashieroffline_pay',
        'cashiergoto_pay',

        'buyer_order',
        'buyer_ordercancel_order',
        'buyer_orderevaluate',
        'buyer_orderview',
        'buyer_orderindex',
        'buyer_orderconfirm_order',

        'captcha',

        'applycheck_name',
        'mlselection',
        
        'seller_order',
        'seller_ordershipped',
        'seller_orderreceived_pay',
        'seller_orderadjust_fee',
        'seller_ordercancel_order',

        'order',

        'my_store',

        'my_payment',
        'my_paymentconfig',
        'my_paymentinstall',

        'my_shipping',
        'my_shippingadd',
        'my_shippingedit',
        'my_shippingdrop',
    );
}
