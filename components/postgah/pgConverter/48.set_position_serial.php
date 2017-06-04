<?

$GLOBALS['converter_list'][] = 'set_position_serial';

function set_position_serial(){

	$limit = 30000;

	if(! $rs = dbq(" SELECT `id` FROM `item` WHERE `position_serial`='' LIMIT $limit ") ){

	} else if(! dbn($rs) ){
		echo "all position_serial is set";

	} else while( $rw = dbf($rs) ){
		
		$id = $rw['id'];
		
		if(! pgItem_set_position_serial( $id ) ){
			$_err++;

		} else {
			$_done++;
		}

	}

	$_remained = dbr( dbq(" SELECT COUNT(*) FROM `item` WHERE `position_serial`='' ") , 0, 0);

	echo "<hr>".intval($_done)." done , ".intval($_err)." error, ".intval($_remained)." remained";

}




