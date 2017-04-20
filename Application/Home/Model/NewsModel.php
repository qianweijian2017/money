<?
namespace Home\Model;
use Think\Model; 
/**
* 
*/
class NewsModel extends Model
{
	protected $_validate=array(
        array('cat_name','','分类名已存在！','3','unique')
    );
	 
}