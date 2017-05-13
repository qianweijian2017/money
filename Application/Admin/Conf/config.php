<?php
return array(
	//'配置项'=>'配置值'
	'RBAC_ROLES'  		=> array(
								1  =>  '超级管理员',
								2  =>  '前台管理员',
								3  =>  '后台管理员'
		),
	'RBAC_ROLE_AUTHS'  	=> array(
								1  =>  '*/*',
								2  =>  array('nav/*','news/*'),
								3  =>  array('fund/*','project/*','user/*') 
		),
	'SHOW_PAGE_TRACE'	=> true,
);