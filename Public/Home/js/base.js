;(function () {
    //初始化首页数据
    $tar="100%";
    for ( i=0;i<6;i++){

        $val=$('.progress-val').eq(i).text();
        $('.progress-ing').eq(i).css({
            width:$val
        });
        console.log($val);
        if($val==$tar){
            $('.ft').find('.btn').eq(i).css({
                background:"#cccccc",
                borderColor:"#cccccc"
            }).text("已购满")
        }


    }
    //导航栏，选中展开
    // $('[hover="1"]').mouseenter(function(){
    //     $(this).addClass('open');
    // }).mouseleave(function () {
    //     $(this).removeClass('open');
    // });

    // $('.nav_title li').mouseenter(function () {
    //     $(this).find(".icon_180").css('transform','rotate(180deg)');
    // }).mouseleave(function () {
    //     $(this).find(".icon_180").css('transform','rotate(0deg)');
    // });
//    滚动屏幕定位
    var nav_top=$('nav').offset().top;
    $(window).scroll(function () {
        var scroll_top=$(this).scrollTop();
        if(nav_top<scroll_top){
            $("nav").css({"position":"fixed","top":0,'z-index':'999'});
        }else if(nav_top >= scroll_top){
            $("nav").removeProp("style");
        }
    });
    $(".nav_title li.active").children("a").prop("href","javascript:;")


}());
