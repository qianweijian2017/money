var high=$(".navli").offset().top;
$(window).bind("scroll",function(){
	var sTop=$(this).scrollTop();
        console.log(sTop)
        console.log(high+'ftg')
	if (sTop>high){
        $(".navli").css({"position":"fixed","top":"0px","background":"rgba(15,145,221,0.5)"});
       
     } else if (sTop<=high){
     	$(".navli").css({"position":"static","top":"0px","background":"#0f91dd"});
     }
})