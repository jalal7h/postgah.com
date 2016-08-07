<?
$GLOBALS['do_action'][] = 'upvote_do';

function upvote_do(){
	
	if(! $user_id = user_logged() ){
		e( __FUNCTION__ , __LINE__ );		
	
	} else if(! $table = $_REQUEST['table'] ){
		e( __FUNCTION__ , __LINE__ );
	
	} else if(! $table = explode( ":", $table ) ){
		e( __FUNCTION__ , __LINE__ );
	
	} else if(! $table_name = $table[0] ){
		e( __FUNCTION__ , __LINE__ );
	
	} else if(! $table_id = $table[1] ){
		e( __FUNCTION__ , __LINE__ );
	
	} else if(! $page_url = str_dec($table[2]) ){
		e( __FUNCTION__ , __LINE__ );
	
	} else if(! $do = $_REQUEST['do'] ){
		e( __FUNCTION__ , __LINE__ );
	
	} else if(! in_array( $do , array("up","down") ) ){
		e( __FUNCTION__ , __LINE__ );
	
	} else {
		switch( $do ){

			case 'up': 
				dbq(" INSERT INTO `upvote` (`table_name`,`table_id`,`page_url`,`user_id`,`date`) VALUES ('".$table_name."','".$table_id."','".$page_url."','".$user_id."','".U()."') ");
				break;
			
			case 'down':
				dbq(" DELETE FROM `upvote` WHERE `table_name`='".$table_name."' AND `table_id`='".$table_id."' AND `user_id`='".$user_id."' LIMIT 1 ");
				break;
		}

		return true;
	}

	return false;
}




