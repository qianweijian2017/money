;(function () {
    //初始化首页数据
    $change_vot = "100%";
    for (i = 0; i < 6; i++) {
        //读取每个进度
        getVal();
        //循环已经完成投资的项目
        if ($status == 1) {
            if ($val == $change_vot){
                $.post('./index', {
                    ID: $id,
                    STATUS: $status
                }, function (data) {

                });
            }


            //刷新项目进度（贷款状态）
            getVal();
            $('.ft').find('.btn').eq(i).attr('href','/money/index.php/Home/Regular/detail/fixid/'+$id+'.html');

        }else if( $status == 2){

            getVal();
            $('.ft').find('.btn').eq(i).attr('href','/money/index.php/Home/Netloan/detail/fixid/'+$id+'.html');
            $('.ft').find('.btn').eq(i).css({
                background: "#45b8ef",
                borderColor: "#45b8ef"
            }).text("立即贷款");
            $('.yuqi .yuqitext').eq(i).text("预期年化利息");

            $('.yuqi .yuqinum').eq(i).css({
                color: "#2d6bef"
            });
            //当状态二满了的时候

            if ($val_lent == $change_vot){

                $('.ft').find('.btn').eq(i).css({
                    background: "#cccccc",
                    borderColor: "#cccccc"
                }).text("贷款名额已满")
            }


        }
        //刷新项目进程
        function getVal() {
            //获取状态
            $status = $('.bd-row li').eq(i).attr('data-status');
            //获取id
            $id = $('.bd-row li').eq(i).attr('data-id');
            //获取进度
            if ($status==1){

            }else if($status==2){
                $('.progress-val').eq(i).parent().css({
                    display:"none"
                });
                $('.progress-val-lent').eq(i).parent().css({
                    display:"block"
                });

            }
            $val = $('.progress-val').eq(i).text();
            $val_lent = $('.progress-val-lent').eq(i).text();


            $('.progress-ing').eq(i).css({
                width: $val
            });
            $('.progress-ing-lent').eq(i).css({
                width: $val_lent
            });
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
    var nav_top = $('nav').offset().top;
    $(window).scroll(function () {
        var scroll_top = $(this).scrollTop();
        console.log(scroll_top);
        if (nav_top < scroll_top) {
            $("nav").css({"position": "fixed", "top": 0, 'z-index': '999'});
        } else if (nav_top >= scroll_top) {
            $("nav").removeAttr('style');
        }
    });
    $(".nav_title li.active").children("a").prop("href", "javascript:;")


}());
