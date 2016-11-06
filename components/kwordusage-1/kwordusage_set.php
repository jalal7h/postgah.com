<?

# jalal7h@gmail.com
# 2016/07/30
# 1.0

# 
# kwordusage_set( $kword_array_N[string or array], $table_name, $table_id );
# 

/*README*/

function kwordusage_set( $kword_array_N, $table_name, $table_id ){

	if( is_string($kword_array_N) ){
		if( $kword_array_N=='' ){
			$kword_array_N = [];
		} else {
			$kword_array_N = str_replace('،', ',', $kword_array_N);
			$kword_array_N = explode(',', $kword_array_N);
			foreach( $kword_array_N as $i => $kword ){
				if(! $kword = trim($kword) ){
					continue;
				} else {
					$kword_array_N_tmp[] = $kword;
				}
			}
			$kword_array_N = $kword_array_N_tmp;
		}
	
	} else if(! sizeof($kword_array_N) ){
		$kword_array_N = [];
	}

	$kword_array_C = kwordusage_get( $table_name, $table_id );
	
	#
	# age in kword tuye kw_N nist, az kwusage hazfesh kon.
	if( $kword_array_C and sizeof($kword_array_C) ){
		
		foreach( $kword_array_C as $i => $kword ){
			
			if( !$kword_array_N or !sizeof($kword_array_N) ){
				kwordusage_pop( $kword, $table_name, $table_id );

			} else if(! in_array( $kword, $kword_array_N ) ){
				kwordusage_pop( $kword, $table_name, $table_id );
			
			} else {
				// keep it
			}

		}
	}

	#
	# age in kword e jadid, tuye kword haye kw_C nist, ezafe kon
	if( $kword_array_N and sizeof($kword_array_N) ){
		foreach( $kword_array_N as $i => $kword ){
			
			if( !$kword_array_C or !sizeof($kword_array_C) ){
				kwordusage_push( $kword, $table_name, $table_id );				

			} else if(! in_array($kword, $kword_array_C) ){
				kwordusage_push( $kword, $table_name, $table_id );
			}

		}
	}

}

