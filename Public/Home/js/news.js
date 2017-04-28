$(document).ready(function () {
    $("#title li").each(function () {
        $("#title li").eq(0).addClass("title");
        $(this).on("click", function () {
            $(this).addClass("title").siblings().removeClass("title")
            $(this).mouseout(function () {
                $(this).addClass("title_out")
            })
        });


    });

    $('.main-con ul li').on('mouseenter', function () {
        $(this).stop().animate({
            opacity: 1,
            top:"10px"
        });

    }).on('mouseout', function () {
        $(this).stop().animate({
            top:"0px"
        });
    });
    $('.main-con ul li').children().on('mouseenter', function () {
        $(this).parent().stop().animate({
            opacity: 1,
            top:"10px"
        })
    }).on('mouseout', function () {
        $(this).stop().animate({
            top:"0px"
        });
    });
});