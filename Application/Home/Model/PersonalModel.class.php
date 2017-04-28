<?

namespace Home\Model;
use Think\Model;  
/**
* 用户模型
*/
class PersonalModel extends Model
{
    // 保存自动验证的规则
    protected $_validate=array(
        array('user_name','require','用户名不能为空！'),
        array('user_gender','require','性别不能为空！'),
    );
}
	