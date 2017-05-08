;(function () { 
		var nav =  $('#nav_bg').css("top",0);
	$(".left-list li").hover(function() {
		var navTop		= $('#nav_bg').css("top");
		$('#nav_bg').css("top",navTop); 
		var index  		= $(this).index();
		var height 		= 60;
		var position  	= index * height;
		console.log(position);
		Animate(position);
	}, function() {
		Animate(0);
	});
	function Animate(iPosition) {
		 nav.stop().animate({"top":iPosition}, 200);
	}  
}())