<?

$GLOBALS['converter_list'][] = 'pub_kw_into_kword';

function pub_kw_into_kword(){

	$table_name = "item";
	$limit = 100000;

	if(! $rs = dbq_old(" SELECT `id`,`_keywords`,`keyword` FROM `pub` WHERE `converter`='1' LIMIT $limit ") ){
		dbe();

	} else while( $rw = dbf($rs) ){
		
		$kw = null;
		if( trim($rw['_keywords']) ){
			$kw[] = trim($rw['_keywords']);
		}
		if( trim($rw['keyword']) ){
			$kw[] = trim($rw['keyword']);
		}

		if(! sizeof($kw) ){
			//
			
		} else {
			$table_id = $rw['id'];
			$kw = implode(',', $kw);
			$kw = str_replace('،', ',', $kw);
			$kw_arr = explode(',', $kw);
			$id_kw_repeat_tmp_arr = null;
			foreach( $kw_arr as $i => $kword ){
				
				if(! $kword = trim($kword) ){
					continue;
				
				} else {
					
					if( sizeof($id_kw_repeat_tmp_arr) ){
						if( in_array( strtolower($kword), $id_kw_repeat_tmp_arr ) ){
							continue;
						}
					}

					#
					# put into array
					$id_kw_repeat_tmp_arr[] = strtolower($kword);

					#
					# use it
					// echo $id." -> ".$kword."<br>";
					kwordusage_push( $kword, $table_name, $table_id );
					$k++;

				}

			}
		}

		dbq_old(" UPDATE `pub` SET `converter`='2' WHERE `id`='".$rw['id']."' LIMIT 1 ");
		echo ". ";
		flush();

	} 

	echo "<hr>".$k." kword inserted";
	echo "<br>".dbr( dbq_old(" SELECT COUNT(*) FROM `pub` WHERE `converter`='1' ") , 0, 0)." pub remained";

}


