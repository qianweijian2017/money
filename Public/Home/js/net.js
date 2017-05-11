$(function () { 
	//左侧导航效果
	var defaultTop  =  $(".left-list li.active").index()*60;
	var nav 		=  $('#nav_bg').css("top",defaultTop);
	$(".left-list li").on("mouseover",function() {
		var navTop		= nav.css("top");
		nav.css("top",navTop); 
		var index  		= $(this).index();
		var height 		= 60;
		var position  	= index * height; 
		Animate(position);
	}).on("mouseleave", function() { 
		Animate(defaultTop);
	});
	function Animate(iPosition) {
		 nav.stop().animate({"top":iPosition}, 200);
	}  
 
	 //获取投资人信息
    var fixid   = $('#fixid').val();
    var pagenum = 1 ;
    $('#ajaxgo').click(function () { 
        getBorrower(fixid,pagenum);
            
    });
  //点击分页
   $(function () {
       $("#ajax_page").on('click','a',function (event) {  
         event.preventDefault();
         var url = $(this).attr('href');
         $.get(url,{},function (data) {  
             var user_info =  data.info; 
             $('#record_panelPlan').html(data.userhtml);
             $("#ajax_page").html(data.pagehtml);
             
          }); 
      });
   })
  // 初始化第一页
  function getBorrower(id,pagenum) { 
    $.get("{:U('Regular/getProjBorrower')}",{id,pagenum},function (data) {  
       var user_info =  data.info; 
       $('#record_panelPlan').html(data.userhtml);
       $("#ajax_page").html(data.pagehtml);
       
    });
  }
  //获取投资人信息end
   
  //点击立即借款
  $('#open_lend_box').click(function () {

     if(!$user){
          var tiplogin=layer.confirm('要先登陆哦',{icon:5},function(){
                    location.href = loginUrl;
                    layer.close(tiplogin);
            });
          return;
     }
     var money   =   $('#investNumone').val();
     var proj_id =   $('#fixid').val();

     if( money && money >= 100){
       $('#investNum').val(money);
     } 
    $.post(getProjectInfo,{ proj_id },function (data) { 
        $("#fund_code").val(data.proj_no);
        $('#length_day').val(data.proj_lock); 
        open_lend_box =  layer.open({
                            type   : 1,
                            area   : ['600','400'],
                            title  : '填写信息',
                            content:$("#bank") 
                         }); 
     })   
    
  })
  //点击确定借款
   $('#btn_user_br').click(function  () { 
         var  fixid        =  $('#fixid').val();
         var  money        =  $("#investNum").val();
         var  trader_pwd   =  $('#trader_pwd').val();
         //如果没有输入银行卡,则结束程序
         if(!trader_pwd){
            layer.alert('请输入交易密码',{icon:2});
            return;
         }
         //如果金额为0或小于100则不执行操作,否则进入程序
         if(money && money >= 100){ 
  
            $.post(doLend,{ fixid,money,trader_pwd },function (data) {
           
               if(data.status){
                  layer.alert(data.info,{ 
                        icon :data.icon,
                        title: '温馨提示'
                  },function(){
                        location.reload();
                  });

               } else{
                  layer.alert(data.info,{icon : data.icon});
               }
               
            })  
         }else{ 
           layer.alert('借款最低额度100元,请重新输入',{icon:7}); 
         }
        
   
   });
  
})