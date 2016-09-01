<?

$GLOBALS['converter_list'][] = 'set_cat_serial';

function set_cat_serial(){

	$limit = 10000;

	if(! $rs = dbq(" SELECT `id` FROM `item` WHERE `cat_serial`='' LIMIT $limit ") ){

	} else if(! dbn($rs) ){
		echo "all cat_serial is set";

	} else while( $rw = dbf($rs) ){
		
		$id = $rw['id'];
		
		if(! pgItem_set_cat_serial( $id ) ){
			$_err++;

		} else {
			$_done++;
		}

	}

	echo "<hr>".intval($_done)." done , ".intval($_err)." error";

}




