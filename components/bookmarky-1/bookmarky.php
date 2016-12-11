<?

# taghipoor.meysam@gmail.com
# 2016/12/11
# 1.1

function bookmarky( $table_name, $table_id ){
	
	$bookmarky = 
	
		'class="'.	
			__FUNCTION__.' '.
			( user_logged() ? 'logged ' : 'logout ' ).
			( bookmarky_ifAdded( $table_name, $table_id ) ? 'active ' : '' ).
		'" '.
		
		( user_logged() ? 'title="'.bookmarky_result( $table_name, $table_id ) : '' ).
		
		'" text_notLoggedIn="'.__('لطفا ابتدا وارد سایت شوید.').
		'" table_name="'.$table_name.
		'" table_id="'.$table_id.'" ';
		
    return $bookmarky;

}










