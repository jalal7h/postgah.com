<?

# jalal7h@gmail.com
# 2016/10/31
# 2.1

function position_mg_list(){
	
	position_remove_n_fix_unknowns();

	if(! $type = $_REQUEST['type'] ){
		ed(__FUNCTION__,__LINE__);
	}

	$current = [ "name"=>position_name($type) ];
	if( $parent_type = position_get_higher($type) ){
		$parent = [ "name"=>position_name($parent_type) ];
	}
	
	#
	# action
	switch($_REQUEST['do']){
		
		case 'remove' : 
			position_mg_remove();
			break;
			
		case 'saveNew' : 
			position_mg_saveNew();
			break;
			
		case 'saveEdit' : 
			position_mg_saveEdit();
			break;
	}
	
	#
	# list
	$list['name'] = __FUNCTION__;
	$list['query'] = " SELECT * FROM `position` WHERE `type`='$type' ORDER BY `parent`,`name` ";
	$list['target_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=position_mg_form&p=".$_REQUEST[\'p\']."&type=".$_REQUEST[\'type\']."&id=".$rw["id"]';
	$list['paging_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]."&type=".$_REQUEST[\'type\']."&p=".$_REQUEST["p"]';
	$list['addnew_url'] = false;
	$list['remove_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]."&type=".$_REQUEST[\'type\']."&p=".$_REQUEST[\'p\']."&do=remove&id=".$rw["id"]."&p=".$_REQUEST["p"]';
	$list['remove_prompt'] = '"آیا مایل به حذف شهر به نام ".$rw["name"]." هستید?"';
	$list['tdd'] = 7;
	#
	if( $parent_type ){
		$list['paging_select'] = ['parent' => position_options( $parent_type , $array=false )];
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
	echo "<form class='position_mg_list_new' method='post' action='./?page=".$_REQUEST['page']."&cp=".$_REQUEST['cp']."&func=".$_REQUEST['func']."&type=".$_REQUEST['type']."&do=saveNew'>
	<input type='text' name='name' placeholder='ثبت ".$current['name']." جدید ..' />";
	
	# 
	# select box in new form
	if( $parent_type ){
		echo "<select name='parent' id='position_mg_list_new_parent'>";
		echo implode('',$list['paging_select']);
		echo "</select>";
		echo "<script>$('#position_mg_list_new_parent').val('".$_REQUEST['parent']."')</script>";
	}
	
	#
	# new form close
	echo "</form>";
}


