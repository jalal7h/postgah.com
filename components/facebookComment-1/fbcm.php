<?


function fbcm( $table_name , $table_id , $comment_id=0, $page_id=0 ){
	
	#
	# page
	if( $page_id==0 ){
		$page_id = _PAGE;
	}

	#
	# container
	if( $comment_id==0 ) {
		$c.= '<a class="fbcm_sharp_anchor" name="comments" >&nbsp;</a>';
		$c.= '<div class="fbcm_container">';
	}

	#
	# display form n list
	$c.= '
	<div class="fbcm">
		'.fbcm_form( $table_name , $table_id , $comment_id, $page_id ).'
		'.fbcm_list( $table_name , $table_id , $comment_id, $page_id ).'
	</div>';
	
	# 
	# container close
	if( $comment_id==0 ) {
		$c.= "</div>";
	}

	return $c;
}



