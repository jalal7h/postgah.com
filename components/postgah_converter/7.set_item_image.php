<?

$GLOBALS['converter_list'][] = 'set_item_image';

function set_item_image(){

	$dir = "data/item_image/old/";
	
	if(! file_exists($dir) ){
		echo "cant find ".$dir;
	
	} else if(! $dp = opendir($dir) ){
		echo "cant open ".$dir;

	} else {
		
		#
		# clear database
		mysql_query(" DELETE FROM `item_image` WHERE `image` LIKE '".$dir."%' ");
		
		#
		# try to set AI
		$count_in_item_image = dbr( dbq(" SELECT COUNT(*) FROM `item_image` "), 0, 0);
		if( $count_in_item_image==0 ){
			$AI = 1;
		} else {
			$rs_tmp = dbq(" SELECT `id` FROM `item_image` WHERE 1 ORDER BY `id` DESC LIMIT 1 ");
			$the_last_id = dbr($rs_tmp,0,0);
			$AI = $the_last_id + 1;
		}
		dbq(" ALTER TABLE `item_image` AUTO_INCREMENT=$AI ");

		while( $d = readdir($dp) ){
			
			if( substr($d,0,1)=='.' ){
				continue;
			}

			$item_id = substr($d,0,8);
			$image = $dir.$d;
			$image_hash = sha1($image);
			
			if(! dbs('item_image', [ 'item_id'=>$item_id, 'image'=>$image ] ) ){
				$_err++;
				echo dbe();
			
			} else {
				$_done++;
			}
		}

		echo "<hr>".intval($_done)." done , ".intval($_err)." error";

	}


	closedir($dp);

}