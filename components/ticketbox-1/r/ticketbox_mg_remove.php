<?

function ticketbox_mg_remove(){
	
	if(! $id = $_REQUEST['id'] ){
		e();
	
	} else if(! dbq(" DELETE FROM `ticketbox_post` WHERE `tid`='$id' ") ){
		e();
	
	} else if(! dbrm("ticketbox") ){
		e();
	
	} else {
		return true;
	}

}
