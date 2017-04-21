$(document).ready(function () {
    $("#title li").each(function () {
        $("#title li").eq(0).addClass("title");
        $(this).on("click",function () {
            $(this).addClass("title").siblings().removeClass("title")
            $(this).mouseout(function () {
                $(this).addClass("title_out")
            })
        });

    });
})
