<?

function ticketbox_mg_view(){
	
	$c.= "<div class=\"".__FUNCTION__."\">";

	if(! $id = $_REQUEST['id'] ){
		e();

	} else {

		#
		# tanzim ticket be onvan e dide shode, flag e view dar ticketbox_user
		ticketbox_setAsViewed( $id );
		
		$c.= ticketbox_mg_view_name();
		$c.= ticketbox_mg_view_form();
		
		if(! $rs = dbq(" SELECT * FROM `ticketbox_post` WHERE `ticketbox_id`='$id' ORDER BY `date_created` DESC ") ){
			e();

		} else if(! dbn($rs) ){
			e();

		} else while( $rw = dbf($rs) ){
			$c.= ticketbox_mg_view_post( $rw );
		}

	}

	$c.= "</div>";

	echo $c;

}

