<?

function ezTicket_user_save(){
	
	if(! $uid = user_logged() ){
		ed();
	}
	
	if(! $text = $_REQUEST['text'] ){
		ed();
	}
	
	$date = U();
	if( $tid = $_REQUEST['id'] ){
		// old
		dbs('ezticket_ticket', ['date'=>$date, 'archived'=>'0', 'view_by_admin'=>'0'], ['id'] );

	} else {
		// new
		if(! $dept = $_REQUEST['dept'] ){
			ed();
		}

		if(! $name = $_REQUEST['name'] ){
			ed();
		}

		dbs( 'ezticket_ticket', ['uid'=>$uid,'dept','name','date'=>$date] );
		$tid = dbi();

	}

	dbs( 'ezticket_reply', [ 'uid'=>$uid, 'tid'=>$tid, 'text', 'date'=>$date ] );

}

