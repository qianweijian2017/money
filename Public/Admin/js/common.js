 ;(function () { 
 	  //全选 /反选 
 	 
 	$("#check_all").on("click",function(){  
		$("table input.sub_check[type='checkbox']").prop("checked",$(this).prop("checked"));
 		var $iCheck=$(this).siblings("label").children("i.fa");
 		if($iCheck.hasClass("fa-square-o")){
 			$iCheck.removeClass("fa-square-o").addClass("fa-check-square-o");
 		}else{
 			$iCheck.removeClass("fa-check-square-o").addClass("fa-square-o");
 		} 
 		
 	})
 	//js删除 
 	$("#deleteItem").on("click",function () {
 		 layer.confirm('确定删除吗?',{ icon : 0},function () {
 		 	 	var $sCheck=$("table tr td input:checked"); 
		 		if($sCheck.length!=0){
			 		var aIds=[];
			 		for(var i = 0 ; i < $sCheck.length ; i++ ){
			 			aIds.push($sCheck[i].value);
			 		}   
			 		 
			 		$.post(postDelUrl,{"controllerName":controllerName,"aIds":aIds},function (data) {
			 			 
			 			 layer.alert(data.info,{'icon' : data.icon},function () {
			 			 	location.reload();
			 			 });
			 			 
			 		})
		 		}else{
		 			layer.alert("请选择要删除的选项",{icon : 0});
		 		}
 
 		 })

 		

 	});

 	//点击编辑
 	$("table.common_table tr td p").on("click",function () {
 		$(this).attr("contenteditable",true);
 	});
 	$("table.common_table tr td p").blur(function () { 
 		var key=$(this).data("key");//获取列名 
 		var value=$(this).text();//获取列值   
 		var id=$(this).parent().parent().data("id");//获取主键,因为要通过主键修改 
 		$.post(postEditUrl,{
 				"controllerName":controllerName,
 				"id":id,
 				"key":key,
 				"value":value
 		},function (data) { 
 			if(data){  
 				layer.alert(data.info);
 				$(this).removeAttr("contenteditable");
 			}  
 			
 		}); 
 		
 	})
 	//添加
 	$('.addModel-btn').on('click',function () { 
        $('.addModel').animate({
            top:"25%"
        }) 
	  });
    $('.cancel-btn').on('click',function () {
        $('.addModel').animate({
            top:"-100%"
        })
    });
 }())
 