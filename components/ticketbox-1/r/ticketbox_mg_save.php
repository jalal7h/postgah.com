<?

function ticketbox_mg_save(){

	$date = U();
	
	if(! $text = $_REQUEST['text'] ){
		ed();

	} else if(! $tid = $_REQUEST['id'] ){
		e();
		return false;
	
	} else {
		// old
		dbs('ticketbox', ['date'=>$date, 'archived'=>'1','view_by_user'=>'0'], ['id'] );
		dbs('ticketbox_post', ['tid'=>$tid,'text','date'=>$date] );
	}

}

