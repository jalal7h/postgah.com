<?

$GLOBALS['converter_list'][] = 'move_rs2_to_kword_n_kwordusage';

function move_rs2_to_kword_n_kwordusage(){


	$table_name = "item";
	$limit = 1000;


	dbq_old(" ALTER TABLE `rs2` ADD `converter` INT(1) NOT NULL AFTER `pub_id` ");

	if(! $rs = dbq_old(" SELECT `id`,`title`,`pub_id` FROM `rs2` WHERE `converter`='0' ORDER BY `pub_id` ASC LIMIT $limit ") ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! dbn($rs) ){
		e(__FUNCTION__,__LINE__);

	} else {
		while( $rw = dbf($rs) ){
			
			$rs2_id = $rw['id'];
			$table_id = $rw['pub_id'];
			$kword = trim($rw['title']);

			$rs2_id_arr[] = $rs2_id;

			if( strlen($kword) > 90 ){
				continue;
			}

			kwordusage_push( $kword, $table_name, $table_id );

		}

		$rs2_id_str = implode(',', $rs2_id_arr);
		dbq_old(" UPDATE `rs2` SET `converter`='1' WHERE `id` IN ($rs2_id_str) ");

	}
	
	dbq(" DELETE FROM `kword` WHERE `usage_count`='0' ");
	
	echo "<hr>";
	echo "remained records in rs2 : ".number_format(dbr(dbq_old(" SELECT COUNT(*) FROM `rs2` WHERE `converter`='0' "), 0, 0));
	echo "<hr>";

}


