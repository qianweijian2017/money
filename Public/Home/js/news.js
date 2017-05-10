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

    $('.main-con ul li').on('mouseover', function () {
        $(this).stop().css({
            opacity: 1,
            boxShadow: "3px 4px 32px -12px inset"
        });

    }).on('mouseout', function () {
        $(this).stop().css({
            boxShadow: "0px 0px 0px 0px"
        });
    });


    	$(".carousel-inner img").eq(0).addClass("active");


    	$(".carousel-inner li").eq(0).addClass("active");

        
});

