<?

# jalal7h@gmail.com
# 2016/12/02
# 1.0

# user_cellNumber( user_rw or user_id )

function user_cellNumber( $rw_user__or__user_id ){
	
	if( is_numeric($rw_user__or__user_id) ){
		$user_id = $rw_user__or__user_id;
		if(! $rw_user = table('user',$user_id) ){
			return false;
		}
		
	} else {
		$rw_user = $rw_user__or__user_id;
	}

	#
	# the fields
	if( is_column('user', 'cell') ){
		$column[] = 'cell';
	}
	if( is_column('user', 'mobile') ){
		$column[] = 'mobile';
	}
	if( is_column('user', 'tell') ){
		$column[] = 'tell';
	}
	if( is_column('user', 'phone') ){
		$column[] = 'phone';
	}

	if(! sizeof($column) ){
		return false;
	}

	#
	# the user rw
	if( is_numeric($rw_user) ){
		if(! $rw_user = table('user', $rw_user) ){
			ed();
		}
	}

	foreach( $column as $i => $this_column ){
		$numb = $rw_user[ $this_column ];
		if( $numb = is_cell_correct_or_not($numb) ){
			return $numb;
		}
	}

	return false;

}







