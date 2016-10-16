<?

# jalal7h@gmail.com
# 2016/10/16
# 1.0

function position_remove_n_fix_unknowns(){
	
	# remove disabled types
	$list_of_position_types = "'".implode("','", $GLOBALS['position_config'] )."'";
	if(! dbq(" DELETE FROM `position` WHERE `type` NOT IN ($list_of_position_types) ") ){
		e( __FUNCTION__, __LINE__ );
		echo dbe();
	}

	# set parent to 0, if parent is not known
	if(! $rs_fixpos = dbq(" SELECT `id` FROM `position` WHERE `parent`!=0 AND `parent` NOT IN (SELECT `id` FROM `position`) ") ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! dbn($rs_fixpos) ){
		// echo "this is already fixed";

	} else {
		while( $rw_fixpos = dbf($rs_fixpos) ){
			$list_of_damn_ids[] = $rw_fixpos['id'];
		}
		$list_of_damn_ids = implode(',', $list_of_damn_ids);
		dbq(" UPDATE `position` SET `parent`='0' WHERE `id` IN ($list_of_damn_ids) ");
	}
	
}


