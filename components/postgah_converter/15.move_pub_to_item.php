<?

$GLOBALS['converter_list'][] = 'move_pub_to_item';

function move_pub_to_item(){

	$limit = 10000;

	dbq_old(" ALTER TABLE `pub` ADD `converter` INT(1) NOT NULL AFTER `keyword` ");

	if(! $rs = dbq_old(" SELECT * FROM `pub` WHERE  `user_id`!=0 AND `converter`='0' LIMIT $limit ") ){
		e(__FUNCTION__,__LINE__);
	
	} else while( $rw = dbf($rs) ){

		$id_arr[] = $rw['id'];

		foreach( $rw as $i => $v ){
			$rw[ $i ] = str_replace("'", "\'", $rw[ $i ]);
		}

		$id = $rw['id'];
		$user_id = $rw['user_id'];
		$name = trim($rw['title']);
		$text = trim($rw['text']);
		$cat_id = intval($rw['sgid']) + 100;
		$position_id = intval($rw['position_id']);
		$address = trim($rw['address']);
		$cost = ( is_numeric($rw['price']) ? $rw['price'] : 0 );
		
		$rw['phone'] = trim($rw['phone']);
		if( substr($rw['phone'], 0, 2)=='09' ){
			$cell = $rw['phone'];
			$tell = '';
		} else {
			$cell = '';
			$tell = $rw['phone'];
		}

		$date_created = $rw['st_date'];
		$date_updated = ( $rw['ref_date']>0 ? $rw['ref_date'] : $rw['st_date'] );

		$state = 49;

		if(! dbq(" INSERT INTO `item` 

			(`id`,`user_id`,`name`,`text`,`cat_id`,`position_id`,`address`,`cost`,`cell`,`tell`,`state`,`flag`,`expired`,`plan`,`date_created`,`date_updated`) VALUES 

				(
				'$id',
				'$user_id',
				'$name',
				'$text',
				'$cat_id',
				'$position_id',
				'$address',
				'$cost',
				'$cell',
				'$tell',
				'$state',
				'2','0','0',
				'$date_created',
				'$date_updated'
				)

			") ){
			$_err++;
			echo dbe()."<hr>";
		
		} else {
			$_done++;
		}

	}

	$id_str = implode(',', $id_arr);
	dbq_old(" UPDATE `pub` SET `converter`='1' WHERE `id` IN ($id_str) ");

	$_remained = dbr( dbq_old(" SELECT COUNT(*) FROM `pub` WHERE `converter`='0' "), 0, 0);

	echo "<hr>".intval($_done)." done , ".intval($_err)." error, ".intval($_remained)." remained";

}


