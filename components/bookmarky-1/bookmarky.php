<?

# taghipoor.meysam@gmail.com
# 2017/05/09
# 1.2

# echo "<div ". bookmarky( 'item', $rw_item['id'] ) ." >some text</div>";

function bookmarky( $table_name, $table_id ){
	
	$bookmarky = 
	
		'class="'.	
			__FUNCTION__.' '.
			( user_logged() ? 'logged ' : 'logout ' ).
			( bookmarky_ifAdded( $table_name, $table_id ) ? 'active cl_l1_before ' : '' ).
		'" '.
		
		( user_logged() ? 'title="'.bookmarky_result( $table_name, $table_id ) : '' ).
		
		'" text_notLoggedIn="'.__('لطفا ابتدا وارد سایت شوید.').
		'" table_name="'.$table_name.
		'" table_id="'.$table_id.'" ';
		
    return $bookmarky;

}










