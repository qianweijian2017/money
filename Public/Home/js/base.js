;(function () {
    //初始化首页数据
    $url_m=$('.url');
    // var p_url=url.split("/")[0];

   $url=($url_m.text().split('/')[1]);
    $change_vot = "100.00%";
    var num = document.getElementsByClassName("num")[0];
    for (i = 0; i < 13; i++) {
        //读取每个进度
        getVal();

        //刷新项目进程

    }
    function getVal() {
        $val = $('.progress-val').eq(i).text();

        $val_lent = $('.progress-val-lent').eq(i).text();


        $('.progress-ing').eq(i).css({
            width: $val
        });
        $('.progress-ing-lent').eq(i).css({
            width: $val_lent
        });
        //获取状态
        $status = $('.bd-row li').eq(i).attr('data-status');
        //获取id
        $id = $('.bd-row li').eq(i).attr('data-id');
        //获取进度
        if ($status == 1) {
            $('.ft').find('.btn').eq(i).attr('href', '/'+$url+'/index.php/Home/Regular/detail/fixid/' + $id + '.html');

            if ($val == $change_vot) {
                alert($id);
                $.post('./index', {
                    ID: $id,
                    STATUS: $status
                }, function (data) {

                });
            }

        } else if ($status == 2) {
            $('.progress-val').eq(i).parent().css({
                display: "none"
            });
            $('.progress-val-lent').eq(i).parent().css({
                display: "block"
            });
            $('.ft').find('.btn').eq(i).attr('href',  '/'+$url+'/index.php/Home/Regular/detail/fixid/' + $id + '.html');
            $('.ft').find('.btn').eq(i).css({
                background: "#45b8ef",
                borderColor: "#45b8ef"
            }).text("立即贷款");
            $('.yuqi .yuqitext').eq(i).text("预期年化利息");

            $('.yuqi .yuqinum').eq(i).css({
                color: "#2d6bef"
            });
            //当状态二满了的时候

            if ($val_lent == $change_vot) {

                $('.ft').find('.btn').eq(i).css({
                    background: "#cccccc",
                    borderColor: "#cccccc"
                }).text("名额已满")
            }
        } else if ($status==4){
            $('.ft').find('.btn').eq(i).attr('href',  '/'+$url+'/index.php/Home/Fund/funddetail/fixid/' + $id + '.html');
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
        if (nav_top < scroll_top) {
            $("nav").css({"position": "fixed", "top": 0, 'z-index': '999'});
        } else if (nav_top >= scroll_top) {
            $("nav").removeProp("style");
        }
    });
    $(".nav_title li.active").children("a").prop("href", "javascript:;")


}());
