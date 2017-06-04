<?

$GLOBALS['converter_list'][] = 'set_pub_flag_as_old';

function set_pub_flag_as_old(){

	
	# flag 0
	# # # # 
	$list_of_id = [];
	if(! $rs = dbq_old(" SELECT `id` FROM `pub` WHERE `active`='0' ") ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! dbn($rs) ){
		echo "no waiting found<br>";

	} else while( $rw = dbf($rs) ){
		$list_of_id[] = $rw['id'];
	}

	if( sizeof($list_of_id) ){
		$list_of_id_str = implode(',', $list_of_id);
		dbq(" UPDATE `item` SET `flag`='0' WHERE `id` IN ($list_of_id_str) ");
	}
	echo mysql_affected_rows()." waiting found<br>";


	# expied 1
	# # # # 
	$list_of_id = [];
	if(! $rs = dbq_old(" SELECT `id` FROM `pub` WHERE `active`='-2' ") ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! dbn($rs) ){
		echo "no expired found<br>";

	} else while( $rw = dbf($rs) ){
		$list_of_id[] = $rw['id'];
	}

	if( sizeof($list_of_id) ){
		$list_of_id_str = implode(',', $list_of_id);
		dbq(" UPDATE `item` SET `expired`='1' WHERE `id` IN ($list_of_id_str) ");
	}
	echo mysql_affected_rows()." expired found<br>";


}


