<?
function is_active($this_control,$menu_name)
{
	 if($this_control==$menu_name){
	 	echo "active";
	 }else{
	 	return;
	 }
}
function select_active($this_select,$current_type='')
{

 	if($this_select==$current_type){
 		echo "active";
	}else{
	 	return;
	}
}

/**
 * 公共的函数库
 * 它可以在admin应用下的任意的模型、控制器、视图模版
 */

/**
 * 上传图片函数
 * @param  string $pic_path 图片路径
 * @return array、null           info数组或空信息
 */
function pic($pic_path)
{

	// 而是把表单传过来的所有文件信息，进行一次性上传
	if($_FILES[$pic_path]['error']!=4){
		// 上传商品图片开始
		$upload = new \Think\Upload();
		$upload -> maxSize = 10240000; //1000m
		$upload -> exts = array('jpg','jpeg','png');//图片的类型
		$upload -> autoSub = FALSE;
		$upload -> rootPath = './Public/upload/';//图片的保存路径

		// $upload->thumb = true;  //设置需要生成缩略图，仅对图像文件有效
		// $upload->thumbPrefix = 's_';  //设置需要生成缩略图的文件后缀

		// $upload->thumbMaxWidth = '90';  //设置缩略图最大宽度
		// $upload->thumbMaxHeight = '90'; //设置缩略图最大高度
		$info = $upload -> upload();
		if(!$info) {
			echo $upload->getError();exit();
		} else {
			return  $info;
		}
		// 上传商品图片结束
	}else{
		return  '';
	}
}