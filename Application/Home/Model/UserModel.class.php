<?

namespace Home\Model;
use Think\Model;  
/**
* 用户模型
*/
class UserModel extends Model
{
	// 用户名
			//1.不能为空
			 
			//2.长度限制
	//密码
			//1.不能为空
			//2.长度6-12
	//重复密码
			//两次输入的密码必须一致



	// 保存自动验证的规则
    protected $_validate=array(
	    array('user_name','require','用户名不能为空！'), //默认情况下用正则进行验证
        array('user_name','','管理员用户名已存在！','3','unique'),
		array('user_pwd','require','密码不能为空'),
		array('user_pwd','6,12','密码不能少于6位，且不能多于12位',3,'length'),
	  	array('repassword','user_pwd','两次输入的密码不一样',0,'confirm'), // 验证确认密码是否和密码一致
    );
	
}
	