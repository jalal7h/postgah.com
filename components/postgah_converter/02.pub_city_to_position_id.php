<?

$GLOBALS['converter_list'][] = 'pub_city_to_position_id';

function pub_city_to_position_id(){
	
	if(! dbq_old(" SELECT COUNT(*) FROM `city2` ") ){
		echo "cant find `city2`";
		die();
	}

	dbq_old(" ALTER TABLE `pub` ADD `position_id` INT NOT NULL COMMENT 'موقعیت' AFTER `pos` ");

	if(! $rs = dbq_old(" SELECT * FROM `city2` WHERE 1 ORDER BY `_ref` ") ){
		e(__FUNCTION__,__LINE__);

	} else if(! dbn($rs) ){
		e(__FUNCTION__,__LINE__);

	} else while( $rw = dbf($rs) ){
		// echo $rw['id']." : ".$rw['city']."<br>";
		$pos = $rw['city'];
		$position_id = $rw['position_id'];
		if(! dbq_old(" UPDATE `pub` SET `position_id`='$position_id' WHERE `position_id`='0' AND `pos`='$pos' OR `pos` LIKE '%-".$pos."' ") ){
			e(__FUNCTION__, __LINE__, dbe() );
		} else {
			echo $pos." -> ".$position_id." : ".mysql_affected_rows()."<br>";
		}
	}

	echo "<hr>";
	
	dbq_old(" UPDATE `pub` SET `position_id`='1479' WHERE `position_id`='0' AND `pos` LIKE 'تهران-%' OR `pos`='' ");

	echo "there is still ".dbr(dbq_old(" SELECT COUNT(*) FROM `pub` WHERE `position_id`='0' "),0,0)." pubs with no `position_id`";

	echo "<hr>";

	$rs = dbq_old(" SELECT `id`,`pos` FROM `pub` WHERE `position_id`='0' LIMIT 10 ");
	while( $rw = dbf($rs) ){
		echo $rw['id']." > ".$rw['pos']."<br>";
	}

}



