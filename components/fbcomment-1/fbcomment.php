<?

# jalal7h@gmail.com
# 2016/11/29
# 1.1

function fbcomment( $table_name , $table_id , $comment_id=0, $page_id=0 ){
	
	#
	# page
	if( $page_id == 0 ){
		$page_id = _PAGE;
	}

	#
	# container
	if( $comment_id == 0 ) {
		$c.= '<a class="fbcomment_sharp_anchor" name="comments" >&nbsp;</a>';
		$c.= '<div class="fbcomment_container">';
	}

	#
	# display form n list
	$c.= '
	<div class="fbcomment">
		'.fbcomment_form( $table_name , $table_id , $comment_id, $page_id ).'
		'.fbcomment_list( $table_name , $table_id , $comment_id, $page_id ).'
	</div>';
	
	# 
	# container close
	if( $comment_id == 0 ) {
		$c.= "</div>";
	}

	return $c;
	
}


function fbcm( $table_name , $table_id , $comment_id=0, $page_id=0 ){
	return fbcomment( $table_name , $table_id , $comment_id, $page_id );
}










