<?

$GLOBALS['converter_list'][] = 'move_groups_to_cat';

function move_groups_to_cat(){
	
	$add_plus_cat_id = 100;

	dbq(" DELETE FROM `cat` WHERE `cat`='adsCat' ");

	$flag = 1;
	$cat = 'adsCat';

	if(! $rs = dbq_old(" SELECT * FROM `groups` WHERE 1 ORDER BY `id` ASC ") ){
		e( __FUNCTION__, __LINE__ );

	} else while( $rw = dbf($rs) ){
		
		$id = $add_plus_cat_id + intval($rw['id']);
		$name = trim($rw['name']);
		$kw = trim($rw['_keywords']);
		$parent = intval($rw['refer']);
		if( $parent > 0 ){
			$parent+= $add_plus_cat_id;
		}
		$ord = $rw['row'];

		if(! dbq(" INSERT INTO `cat` (`id`,`name`,`kw`,`parent`,`cat`,`ord`,`flag`) VALUES ('$id','$name','$kw','$parent','$cat','$ord','$flag') ") ){
			$_err++;
		} else {
			$_done++;
		}

	}

	echo intval($_done)." done, ".intval($_err)." error";

}



