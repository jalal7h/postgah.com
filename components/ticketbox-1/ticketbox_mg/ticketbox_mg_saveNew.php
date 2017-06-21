<?

# jalal7h@gmail.com
# 2016/12/14
# 1.0

function ticketbox_mg_saveNew(){

	if(! admin_logged() ){
		ed();
	
	} if(! $_REQUEST['cat'] = intval($_REQUEST['cat']) ){
		e();

	} else if(! $_REQUEST['user_id'] = intval($_REQUEST['user_id']) ){
		e();

	} else if(! $rw_user = table( 'user', $_REQUEST['user_id'] ) ){
		ed();

	} else if(! $_REQUEST['name'] = trim($_REQUEST['name']) ){
		e();

	} else if(! $_REQUEST['text'] = trim($_REQUEST['text']) ){
		e();

	#
	# ticketbox
	} else if(! $ticketbox_id = dbs( 'ticketbox', ['cat','name'] ) ){
		e();

	#
	# ticketbox post
	} else if(! dbs('ticketbox_post',['ticketbox_id'=>$ticketbox_id,'user_id'=>1,'text'] ) ){
		e();

	#
	# ticketbox user
	} else if(! dbs( 'ticketbox_user', [ 'user_id'=>1, 'ticketbox_id'=>$ticketbox_id ] ) ){
		e();
		
	} else if(! dbs( 'ticketbox_user', [ 'user_id', 'ticketbox_id'=>$ticketbox_id ] ) ){
		e();
		

	} else {

		$vars = [
			'user_name'		=> $rw_user['name'],
			'ticket_id'		=> $ticketbox_id,
			'ticket_name'	=> $_REQUEST['name'],
			'ticket_link'	=> ticketbox_link( $ticketbox_id ),
		];
		echo texty('ticketbox_mg_saveNew', $vars, [ 0 , $_REQUEST['user_id'] ], $convbox='transparent' );
		
		return true;

	}

	return false;

}









