<?php
return array(
	'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'money',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '',          // 密码
    'DB_PORT'               =>  '',        // 端口
    'DB_PREFIX'             =>  'mn_',    // 数据库表前缀
    'TMPL_PARSE_STRING'		=>	array(
    			'__ADMIN__' 		=>	 __ROOT__.'/Public/Admin',
    			'__HOME__'			=> 	__ROOT__.'/Public/Home' ,
    			'__LIB__'			=> 	__ROOT__.'/Public/Lib' ,
    			'__UPLOAD_PATH__'	=> 	__ROOT__.'/Public/upload' 
    	),	
);