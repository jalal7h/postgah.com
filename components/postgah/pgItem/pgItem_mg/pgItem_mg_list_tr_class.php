<?

function pgItem_mg_list_tr_class( $rw ){
	
	#
	# flag
	if( $rw['flag']==2 ){
		$tr_class[]= "Active";
	} else if( $rw['flag']==1 ){
		$tr_class[]= "Rejected";
	} else {
		$tr_class[]= "Waiting";
	}

	$tr_class = implode(' ', $tr_class);

	return $tr_class;
}








