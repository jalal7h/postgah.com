<?

function ticketbox_view(){
	

	if(! $id = intval($_REQUEST['id']) ){
		e();

	} else if(! table('ticketbox', $id) ){
		echo convbox( __('%% با شناسه #%% ثبت نشده است.',[ lmtc('ticketbox')[0], $id ] ), 'transparent' );

	} else {

		$c.= "<div class=\"".__FUNCTION__."\">";

		#
		# tanzim ticket be onvan e dide shode, flag e view dar ticketbox_user
		ticketbox_setAsViewed( $id );
		
		$c.= ticketbox_view_name();
		$c.= ticketbox_view_form();
		
		if(! $rs = dbq(" SELECT * FROM `ticketbox_post` WHERE `ticketbox_id`='$id' ORDER BY `date_created` DESC ") ){
			e();

		} else if(! dbn($rs) ){
			e();

		} else {
			
			$c.= "<div class=\"post_list\">";
			
			while( $rw = dbf($rs) ){
				$c.= ticketbox_view_post( $rw );
			}
			
			$c.= "</div>";

		}
	
		$c.= "</div>";

	}


	echo $c;

}

