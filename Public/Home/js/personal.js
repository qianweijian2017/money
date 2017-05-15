
function run(id){
// user函数名 一定要和new \Think\Page()中的第三个参数一致，上面有
    $.get("ajax_run",{'p':id},function(data){
//            alert(data['cate_list']);
        var item;
        var js_time=Date.parse(new Date())/1000;
        $.each(data['cate_list'],function(i,result){
            var val=(result['end_time']-js_time)/60/60/24;
            var date=new Date(result['start_time']*1000);
            item += "<tr><td>"+result['id']+"</td><td>"+result['proj_no']+"</td><td>"+result['in_amount']+"</td><td>"+val.toFixed(1)+"</td><td>"+date.toLocaleString();+"</td></tr>";
        });

        $(".tbody_ajax").html(item);
        $(".page_ajax").html(data['show']);
    });
}
run(1);

function finish(id){
// user函数名 一定要和new \Think\Page()中的第三个参数一致，上面有
    $.get("ajax_finish",{'p':id},function(data){
//            alert(data['cate_list']);
        var item='';
        $.each(data['cate_list'],function(i,result){
            var date=new Date(result['create_time']*1000);
            item += "<tr><td>"+result['id']+"</td><td>"+result['proj_no']+"</td><td>"+result['in_amount']+"</td><td>"+result['interest']+"</td><td>"+date.toLocaleString()+"</td></tr>";
        });

        $(".finish_tbody").html(item);
        $(".finish_page").html(data['show']);
    });
}
finish(1);

function not(id){

// user函数名 一定要和new \Think\Page()中的第三个参数一致，上面有
    $.get("ajax_not",{'p':id},function(data){
        var item='';
        $.each(data['cate_list'],function(i,result){
            var date=new Date(result['start_time']*1000);
            item += "<tr><td>"+result['id']+"</td><td>"+result['proj_no']+"</td><td>"+result['in_amount']+"</td><td>"+date.toLocaleString()+"</td></tr>";
        });

        $(".not_tbody").html(item);
        $(".not_page").html(data['show']);
    });
}
not(1);


function run_loan(id){
// user函数名 一定要和new \Think\Page()中的第三个参数一致，上面有
    $.get("ajax_run_loan",{'p':id},function(data){
//            alert(data['cate_list']);
        var item;
        var js_time=Date.parse(new Date())/1000;
        $.each(data['cate_list'],function(i,result){
            var val=(result['end_time']-js_time)/60/60/24;
            var date=new Date(result['start_time']*1000);
            item += "<tr><td>"+result['id']+"</td><td>"+result['proj_no']+"</td><td>"+result['in_amount']+"</td><td>"+val.toFixed(1)+"</td><td>"+date.toLocaleString();+"</td></tr>";
        });

        $(".tbody_loan_ajax").html(item);
        $(".page_loan_ajax").html(data['show']);
    });
}
run_loan(1);

function loan(id){
// user函数名 一定要和new \Think\Page()中的第三个参数一致，上面有
    $.get("ajax_loan",{'p':id},function(data){
//            alert(data['cate_list']);
        var item='';
        $.each(data['cate_list'],function(i,result){
            var date=new Date(result['create_time']*1000);
            item += "<tr><td>"+result['id']+"</td><td>"+result['proj_no']+"</td><td>"+result['in_amount']+"</td><td>"+result['interest']+"</td><td>"+date.toLocaleString()+"</td></tr>";
        });

        $(".loan_tbody").html(item);
        $(".loan_page").html(data['show']);
    });
}
loan(1);

function finish_loan(id){
// user函数名 一定要和new \Think\Page()中的第三个参数一致，上面有
    $.get("ajax_finish_loan",{'p':id},function(data){
//            alert(data['cate_list']);
        var item='';
        $.each(data['cate_list'],function(i,result){
            var date=new Date(result['create_time']*1000);
            item += "<tr><td>"+result['id']+"</td><td>"+result['proj_no']+"</td><td>"+result['in_amount']+"</td><td>"+result['interest']+"</td><td>"+date.toLocaleString()+"</td></tr>";
        });

        $(".finish_loan_tbody").html(item);
        $(".finish_loan_page").html(data['show']);
    });
}
finish_loan(1);

function not_loan(id){

// user函数名 一定要和new \Think\Page()中的第三个参数一致，上面有
    $.get("ajax_not_loan",{'p':id},function(data){
        var item='';
        $.each(data['cate_list'],function(i,result){
            var date=new Date(result['start_time']*1000);
            item += "<tr><td>"+result['id']+"</td><td>"+result['proj_no']+"</td><td>"+result['in_amount']+"</td><td>"+date.toLocaleString()+"</td></tr>";
        });

        $(".not_loan_tbody").html(item);
        $(".not_loan_page").html(data['show']);
    });
}
not_loan(1);
