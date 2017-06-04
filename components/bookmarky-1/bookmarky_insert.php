<?


function bookmarky_insert( $table_name,$table_id){

	#
	# insert
	$user_id = user_logged();
	dbq("INSERT INTO bookmarky (table_name,table_id,user_id) VALUES('{$table_name}','{$table_id}','{$user_id}')");
	$result = bookmarky_result($table_name,$table_id);

	echo "$result";

	#
}
