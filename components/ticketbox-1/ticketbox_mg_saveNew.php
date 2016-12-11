<?

# jalal7h@gmail.com
# 2016/12/02
# 1.0

function ticketbox_mg_saveNew(){

	if(! admin_logged() ){
		ed();
	
	} if(! $_REQUEST['cat'] = intval($_REQUEST['cat']) ){
		e();

	} else if(! $_REQUEST['user_id'] = intval($_REQUEST['user_id']) ){
		e();

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

		# 
		# nxx texty ticketbox_mg_saveNew
		
		return true;

	}

	return false;

}









