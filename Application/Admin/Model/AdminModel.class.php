<?php
namespace Admin\Model;
use Think\Model;  
/**
* 自动执行函数
*/
class AjaxModel extends Model
{
	protected $_map = array(
			'abc'		=>   'user_name',
			'efg'		=>   'user_pwd'
		);
	
}
