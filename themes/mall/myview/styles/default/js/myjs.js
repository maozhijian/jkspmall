/**
 *
 * Created with JetBrains PhpStorm.
 * User: Max
 * Date: 13-5-5
 * Time: 上午12:14
 * To change this template use File | Settings | File Templates.
 */
$(function(){

    var hover_color = '#88766e';
    var tmp_color ;
    $('.my-extract-icon').click(function(){
        location.href = '/index.php?app=category';
    });

    //子菜单
    $('.category-li').each(function(){
        var _this_li = this;
        $(this).mouseover(function(){

            //tmp_color = $(_this_li).css('background');
            //$(_this_li).css('background',hover_color);
            //$(_this_li).find('a').css('color','white');

            var category_id = $(_this_li).attr('data');
            //获取子菜单
            var self_sub_menu = $('.myassort_child_wrap_submenu_one_'+category_id);
            //隐藏其他
            $(self_sub_menu).siblings().hide('fast');
            //显示自己列表
            $(self_sub_menu).show('fast');
            //显示wrap
            $('.myassort_child_wrap_submenu').slideDown();
            //根据category_id更改定位位置
            switch(parseInt(category_id)){
                case 4198:
                $('.myassort_child_wrap').css("top","-526px");
                break;
                case 4497:
                $('.myassort_child_wrap').css("top","-376px");
                break;
                case 4594:
                $('.myassort_child_wrap').css("top","-490px");
                break;
            }

        });
        $(this).mouseout(function(){
            //$(_this_li).css('background',tmp_color);
            //$(_this_li).find('a').css('color','#333');
        });
    })
    $('#content-left').mouseleave(function(){
         $('.myassort_child_wrap_submenu').fadeOut();
        $('.myassort_child_wrap_submenu li').hide();
    });

    var moveCount = 0;
    function Move(){
        moveCount++ ;
        var bodyTop = 0;
        //兼容Chrom、IE 获取滚动条移动的像素
        if (typeof window.pageYOffset != 'undefined') {
            bodyTop = window.pageYOffset;
        } else if (typeof document.compatMode != 'undefined' &&
            document.compatMode != 'BackCompat') {
            bodyTop = document.documentElement.scrollTop;
        }
        else if (typeof document.body != 'undefined') {
            bodyTop = document.body.scrollTop;
        }

        if( bodyTop > 1800 ) {
            return;
        }
        if( bodyTop < 125) {
            $(".category").css({
                "margin-top" :"0px",
                "position":"static"
            });
        } else {
            $('.category').css({
                "position" : "fixed",
                "width" : "240px",
                "top" : 0
            });
            //$(".category").css( "margin-top" ,(bodyTop-125)+"px");
        }
        moveCount--;
        //$("#pagingDIV").css("top",(bodyTop + MarginTop)+"px");
        //$("#pagingDIV").css("left",(document.documentElement.clientWidth - Width - MarginLeft)+"px");
    }
    var setTimeoutCount = 0;
    $(window).scroll(function () {
        Move();
        /*
        if( setTimeoutCount == 0 ) {
            setTimeoutCount = 1;
            setTimeout(function(){
                $(".category").slideDown();
                setTimeoutCount = 0;
            },1000);
        }//End Of If
        */
    });
});

