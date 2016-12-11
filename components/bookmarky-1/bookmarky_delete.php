<?


function bookmarky_delete($table_name,$table_id){
	
	#
	# DELETE
	$user_id = user_logged();
	dbq(" DELETE FROM `bookmarky` WHERE `table_name`='".$table_name."' AND `table_id`='".$table_id."'AND `user_id`='".$user_id."'");
	$result = bookmarky_result($table_name,$table_id);

	echo $result;
	#
}


