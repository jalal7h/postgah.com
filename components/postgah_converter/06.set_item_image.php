<?

$GLOBALS['converter_list'][] = 'set_item_image';

function set_item_image(){

	$limit = 10000;

	if(! file_exists(image_dir_new) ){
		mkdir( image_dir_new );
		set_item_image_clean_table();
	}

	if(! file_exists(image_dir_old) ){
		echo "cant find ".image_dir_old;
	
	} else if(! $dp = opendir(image_dir_old) ){
		echo "cant open ".image_dir_old;

	} else {
		
		while( $d = readdir($dp) ){
			
			if( substr($d,0,1)=='.' ){
				continue;
			
			} else if(! $d = trim($d) ){
				continue;
			}

			if( $kq==$limit ){
				break;
			}
			$kq++;

			$item_id = substr($d,0,8);
			
			$image_new_path_dir = image_dir_new.substr( md5($d), 0, 3 )."/";
			if(! file_exists( $image_new_path_dir ) ){
				mkdir( $image_new_path_dir );
			}

			$image_new_path = $image_new_path_dir.$d;
			$image_cur_path = image_dir_old.$d;
			
			if( file_exists($image_new_path) ){
				unlink( $image_cur_path );
				$_repeat++;
			
			} else if(! dbs('item_image', [ 'item_id'=>$item_id, 'image'=>$image_new_path ] ) ){
				$_err++;
				echo dbe();
			
			} else if(! rename( $image_cur_path, $image_new_path ) ){
				dbq(" DELETE FROM `item_images` WHERE `item_id`='$item_id' AND `image`='$image' LIMIT 1 ");
				$_err++;

			} else {
				$_done++;
			}
		}

		echo "<hr>".intval($_done)." done , ".intval($_err)." error, ".intval($_repeat)." repeat";
		closedir($dp);
	
	}

}




function set_item_image_clean_table(){

	mysql_query(" DELETE FROM `item_image` WHERE `image` LIKE '".image_dir_new."%' ");

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

}




