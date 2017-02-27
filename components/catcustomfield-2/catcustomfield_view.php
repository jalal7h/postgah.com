<?php

# jalal7h@gmail.com
# 2017/02/20
# 1.1


/**
* input : item's table
* input : item's id
* output : array of all records
*/
function catcustomfield_view( $tableName, $tableId ){
	
	// return "yechi $tableName $tableId";

	// get the list of filled value for this item
	// get the related elements of this options
	// list elements with their value order by what defined on element list

	if(! $rw_ccfv_s = table('catcustomfield_value', ['item_table'=>$tableName,'item_id'=>$tableId]) ){
		//
	
	} else {

		#
		# remove empty records
		foreach ($rw_ccfv_s as $i => $rw_ccfv) {
			if( $rw_ccfv['option_id'] == 0 and $rw_ccfv['text'] == '' ){
				dbrm( 'catcustomfield_value', $rw_ccfv['id'] );
				unset( $rw_ccfv_s[ $i ] );
			}
		}

		if(! sizeof($rw_ccfv_s) ){
			return [];
		}

		#
		foreach ($rw_ccfv_s as $rw_ccfv) {

			$ccf_id = $rw_ccfv['catcustomfield_id'];
			$ccf_id_arr[] = $ccf_id;

			$rw_ccf = table('catcustomfield',$ccf_id);
			$ccf_value = catcustomfield_getValue( $rw_ccf, $tableName, $tableId );
			$ccf_value_arr[ $ccf_id ] = $ccf_value;

		}

		$ccf_id_str = implode( ',', $ccf_id_arr );
		if(! $rs_ccf = dbq(" SELECT `id`,`name` FROM `catcustomfield` WHERE `id` IN ($ccf_id_str) ORDER BY `prio` ASC ") ){
			e();
		} else while( $rw_ccf = dbf($rs_ccf) ){
			$ccf_id = $rw_ccf['id'];
			$ccf_name = $rw_ccf['name'];
			$ccf_value = $ccf_value_arr[ $ccf_id ];
			if( is_array($ccf_value) and sizeof($ccf_value) ){
				foreach ($ccf_value as $i => $ccf_value_this) {
					$ccf_value[$i] = ccfo_translate( $ccf_value_this );
				}
			} else {
				$ccf_value = ccfo_translate( $ccf_value );
			}
			$records[] = [ $ccf_name, $ccf_value ];
		}

		return $records;
		
	}

}





