<?

# jalal7h@gmail.com
# 2016/12/02
# 1.0

function ticketbox_mg_saveEdit(){

	if(! $current_user_id = admin_logged() ){
		ed();
	
	} else if(! $_REQUEST['id'] = intval($_REQUEST['id']) ){
		e();

	} else if(! $_REQUEST['cat'] = intval($_REQUEST['cat']) ){
		e();

	} else if(! $_REQUEST['user_id'] = intval($_REQUEST['user_id']) ){
		e();

	} else if(! $_REQUEST['name'] = trim($_REQUEST['name']) ){
		e();

	# 
	# ticketbox
	} else if(! dbs( 'ticketbox', ['cat','name'], ['id'] ) ){
		e();

	#
	# ticketbox user
	} else if(! $cur_foreign_user_id = ticketbox_user($_REQUEST['id'], $current_user_id)['foreign'] ){
		e();

	} else if( $_REQUEST['user_id'] == $cur_foreign_user_id ){
		return true;

	} else if(! dbs( 'ticketbox_user', ['user_id'], ['ticketbox_id'=>$_REQUEST['id'], 'user_id'=>$cur_foreign_user_id ] ) ){
		e();

	} else {
		return true;
	}

	return false;

}









