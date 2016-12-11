<?

# taghipoor.meysam@gmail.com
# 2016/12/11
# 1.1

function bookmarky( $table_name, $table_id ){
	
	$bookmarky = 'class="'.
		
		__FUNCTION__.' '.
		( user_logged() ? 'logged ' : 'logout ' ).
		( bookmarky_ifAdded( $table_name, $table_id ) ? 'active ' : '' ).
		
		'" table_name="'.$table_name.'" table_id="'.$table_id.'" title="'.bookmarky_result( $table_name, $table_id ).'" ';
		
    return $bookmarky;

}










