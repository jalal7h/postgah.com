<?

# jalal7h@gmail.com
# 2016/07/30
# 1.0

# 
# kwordusage_get( $table_name, $table_id, $string_flag=false ); // returns array, 
# 

/*README*/

function kwordusage_get( $table_name, $table_id, $string_flag=false ){

	if(! $rs_KWU = dbq(" SELECT `kword_id` FROM `kwordusage` WHERE `table_name`='$table_name' AND `table_id`='$table_id' ORDER BY `id` ASC ") ){
		e(__FUNCTION__,__LINE__);

	} else if(! dbn($rs_KWU) ){
		//

	} else {
		
		while( $rw_KWU = dbf($rs_KWU) ){
			$kword_id = $rw_KWU['kword_id'];
			$kword_array[] = table( 'kword', $kword_id, 'kword' );
		}

		if( $string_flag ){
			
			if( sizeof($kword_array) ){
				return implode(',', $kword_array);
			} else {
				return "";
			}
		
		} else {
			return $kword_array;
		}

	}

	return false;
}

