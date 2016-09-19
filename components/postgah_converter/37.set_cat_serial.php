<?

$GLOBALS['converter_list'][] = 'set_cat_serial';

function set_cat_serial(){

	$limit = 30000;

	if(! $rs_item = dbq(" SELECT `id`,`cat_id` FROM `item` WHERE `cat_serial`='' LIMIT $limit ") ){

	} else if(! dbn($rs_item) ){
		echo "all cat_serial is set";

	} else while( $rw_item = dbf($rs_item) ){
		
		$id = $rw_item['id'];
		
		if(! pgItem_set_cat_serial( $id, $rw_item ) ){
			$_err++;

		} else {
			$_done++;
		}

	}

	$_remained = dbr( dbq(" SELECT COUNT(*) FROM `item` WHERE `cat_serial`='' ") , 0, 0);

	echo "<hr>".intval($_done)." done , ".intval($_err)." error, ".intval($_remained)." remained";
}




