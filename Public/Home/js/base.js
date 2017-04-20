;(function () {
    //导航栏，选中展开
    $('[hover="1"]').mouseenter(function(){
        $(this).addClass('open');
    }).mouseleave(function () {
        $(this).removeClass('open');
    });

    $('.nav_title li').mouseenter(function () {
        $(this).find(".icon_180").css('transform','rotate(180deg)');
    }).mouseleave(function () {
        $(this).find(".icon_180").css('transform','rotate(0deg)');
    });
//    滚动屏幕定位
    var nav_top=$('.fixe_nav').offset().top;
    $(document).scroll(function () {
        var scroll_top=$(this).scrollTop();
        if(nav_top<scroll_top){
            $(".fixe_nav").css({"position":"fixed","top":0,'padding-top':'10px','z-index':'999'});
        }else if(nav_top>=scroll_top){
            $(".fixe_nav").css({"position":"static",'padding-top':'24px','z-index':'999'});
        }
    });

}());
