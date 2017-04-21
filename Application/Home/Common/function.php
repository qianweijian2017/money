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