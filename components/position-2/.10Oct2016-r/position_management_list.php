<?

# jalal7h@gmail.com
# 2016/05/08
# Version 1.2

function position_management_list(){
	
	if(! $type = $_REQUEST['type'] ){
		die();
	}

	$current = position_management_getCurrent();
	$parent = position_management_getParent();
	
	#
	# action
	switch($_REQUEST['do']){
		
		case 'remove' : 
			dbq(" DELETE FROM `position` WHERE `id`='".$_REQUEST['id']."' AND `type`='$type' LIMIT 1 ");
			break;
			
		case 'saveNew' : 
			if(!$type = $_REQUEST['type']){
				echo "ERR - ".__FILE__.__LINE__;
			} else if(!$name = $_REQUEST['name']){
				echo "ERR - ".__FILE__.__LINE__;
			} else if(!dbq(" INSERT INTO `position` (`name`,`parent`,`type`) VALUES ('$name','".$_REQUEST['parent']."','$type') ")){
				echo "ERR - ".__FILE__.__LINE__;
			} else {
				;// its OK
			}
			break;
			
		case 'saveEdit' : 
			dbq(" UPDATE `position` SET `name`='".$_REQUEST['name']."',`parent`='".$_REQUEST['parent']."' 
				WHERE `id`='".$_REQUEST['id']."' LIMIT 1 ");
			break;
	}
	
	#
	# list
	$list['query'] = " SELECT * FROM `position` WHERE `type`='$type' ORDER BY `parent`,`name` ";
	$list['target_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=position_management_form&p=".$_REQUEST[\'p\']."&type=".$_REQUEST[\'type\']."&id=".$rw["id"]';
	$list['paging_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]."&type=".$_REQUEST[\'type\']."&p=".$_REQUEST["p"]';
	$list['addnew_url'] = false;
	$list['remove_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]."&type=".$_REQUEST[\'type\']."&p=".$_REQUEST[\'p\']."&do=remove&id=".$rw["id"]."&p=".$_REQUEST["p"]';
	$list['remove_prompt'] = '"آیا مایل به حذف شهر به نام ".$rw["name"]." هستید?"';
	$list['tdd'] = 10;
	#
	if( $parent['type'] ){
		$list['paging_select'] = ['parent' => position_options( $parent['type'] , $array=false )];
	}
	#
	if( $type=='continent' or $parent['dont_display_in_list'] ){
		$list['list_array'] = [ ["content" => '$rw["name"]'] ];
	} else {
		$list['list_array'] = [
			[ "content" => '$rw["name"]'],
			[ "content" => '(table("position",$rw["parent"],"name")?table("position",$rw["parent"],"name"):"<i>نامشخص</i>")'],
		];
	}
	#
	if(! $html = listmaker_list($list) ){
		echo "<center>موردی ثبت نشده است</center>";
	} else {
		echo $html;
	}


	#
	# the line
	echo "<div style='clear: both; width: 90%;'></div>";

	#
	# new form open
	echo "<form class='position_management_list_new' method='post' action='./?page=".$_REQUEST['page']."&cp=".$_REQUEST['cp']."&func=".$_REQUEST['func']."&type=".$_REQUEST['type']."&do=saveNew'>
	<input type='text' name='name' placeholder='ثبت ".$current['name']." جدید ..' />";
	
	# 
	# select box in new form
	if( $parent['type'] ){
		echo "<select name='parent' id='position_management_list_new_parent'>";
		echo implode('',$list['paging_select']);
		echo "</select>";
		echo "<script>$('#position_management_list_new_parent').val('".$_REQUEST['parent']."')</script>";
	
	} else {
		echo "<input type='hidden' name='parent' id='position_management_list_new_parent' value='".$parent['default_value']."' />";
	}
	
	#
	# new form close
	echo "</form>";
}


