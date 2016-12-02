<?

$GLOBALS['do_action'][] = 'ticketbox_mg_post_remove';

function ticketbox_mg_post_remove(){

	if(! admin_logged() ){
		ed();
	
	} else if(! $post_id = $_REQUEST['post_id'] ){
		//

	} else if(! $rw_tp = table('ticketbox_post', $post_id) ){
		//

	} else if(! dbrm('ticketbox_post', $post_id) ){
		//

	} else if( dbr(dbq(" SELECT COUNT(*) FROM `ticketbox_post` WHERE `ticketbox_id`='".$rw_tp['ticketbox_id']."' "),0,0) == 0 ){
		dbrm( 'ticketbox', $rw_tp['ticketbox_id'], true );
		echo "NULL";
		die();

	} else {
		echo "OK";
		die();
	}

	echo "ER";

}


