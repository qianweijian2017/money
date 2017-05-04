
function run(id){
// user函数名 一定要和new \Think\Page()中的第三个参数一致，上面有
    $.get("ajax_run",{'p':id},function(data){
//            alert(data['cate_list']);
        var item;
        var js_time=Date.parse(new Date())/1000;
        $.each(data['cate_list'],function(i,result){
            var val=(result['end_time']-js_time)/60/60/24;
            item += "<tr><td>"+result['id']+"</td><td>"+result['money']+"</td><td>"+result['fund_code']+"</td><td>"+result['length_day']+"</td><td>"+val.toFixed(1)+"</td></tr>";
        });

        $(".tbody_ajax").html(item);
        $(".page_ajax").html(data['show']);
    });
}
run(1);
function not(id){
// user函数名 一定要和new \Think\Page()中的第三个参数一致，上面有
    $.get("ajax_not",{'p':id},function(data){
        var item;
        $.each(data['cate_list'],function(i,result){

            item += "<tr><td>"+result['id']+"</td><td>"+result['money']+"</td><td>"+result['fund_code']+"</td></tr>";
        });

        $(".not_tbody").html(item);
        $(".not_page").html(data['show']);
    });
}
not(1);
function finish(id){
// user函数名 一定要和new \Think\Page()中的第三个参数一致，上面有
    $.get("ajax_finish",{'p':id},function(data){
//            alert(data['cate_list']);
        var item;
        $.each(data['cate_list'],function(i,result){

            item += "<tr><td>"+result['goods_id']+"</td><td>"+result['money']+"</td><td>"+result['fund_code']+"</td><td>"+result['length_day']+"</td><td>"+result['income']+"</td><td>"+result['income_money']+"</td></tr>";
        });

        $(".finish_tbody").html(item);
        $(".finish_page").html(data['show']);
    });
}
finish(1);
