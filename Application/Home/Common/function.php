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
//数据部分隐藏
function hidden($result){
	$user_info=array();
	if($result['user_email']){
		$email_info=$result['user_email'];
		$email_array = explode("@", $email_info);
		$prevfix = (strlen($email_array[0]) < 4) ? "" : substr($email_info, 0, 3); //邮箱前缀
		$count = 0;
		$email_info = preg_replace('/([\d\w+_-]{0,100})@/', '***@', $email_info, -1, $count);
		$user_info['user_email'] = $prevfix . $email_info;
	}
	if($result['user_phone']){
		$phone_info=$result['user_phone'];
		$pattern = '/(1[3458]{1}[0-9])[0-9]{4}([0-9]{4})/i';
		$user_info['user_phone'] = preg_replace($pattern, '$1****$2', $phone_info); // substr_replace($name,'****',3,4);
	}
	if($result['user_name']){
		$name_info=$result['user_name'];
		$user_info['user_name'] = substr($name_info,0,3) . "***" . substr($name_info, -3);
	}
	if($result['user_real_name']){
		$Real_name=$result['user_real_name'];
		$user_info['user_real_name'] = "***".substr($Real_name, -3);
	}
	if($result['user_id_card']){
		$ID_card=$result['user_id_card'];
		$user_info['user_id_card'] = substr($ID_card,0,4) . "******" . substr($ID_card, -4);
	}
//	print_r($user_info);
	return $user_info;
}

/**
 * 对数字进行分割
 */

function sliceNumber($iNumber)
{	
	if($iNumber>999){
		 $aNumber=str_split($iNumber); 
		 $dot="," ;
		 for ($i = count($aNumber) -1 ; $i >=0 ;$i--) { 
		 	 $sNumber[]=$aNumber[$i];

		 }
		 foreach ($sNumber as $key => $value) {
		 	 if(($key+1) % 3 == 0){
	 			 $sNumber[$key] = $dot.$value;
		 	}   
		 }
		 for ($j = count($sNumber) -1 ; $j >=0 ;$j--) { 
		 	 $newNumber.=$sNumber[$j]; 
		 }
		
	}
	return $newNumber;
}