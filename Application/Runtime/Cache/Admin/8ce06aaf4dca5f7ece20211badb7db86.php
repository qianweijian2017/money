<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台自动更新</title>
    <script rel="stylesheet" src="/Public/Lib/jquery-1.9.1.min.js"></script>
</head>
<body>
<p>后台自动更新个人基金收益</p>
<p class="time"></p>
<script>
setInterval(function () {
    $.get('<?php echo U('autorun/ajax');?>',function(data){
        $('.time').html(data['time']);
    })
    $.get('<?php echo U('autorun/delete');?>',function(data){
        $('.delete').html(data['time']);
    })
},11000)
</script>
</body>
</html>