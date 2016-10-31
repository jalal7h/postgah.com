<?

# jalal7h@gmail.com
# 2016/10/31
# 1.2

# $GLOBALS['d404'][] = ["66,item,item_id,flag"];
# page_id , table_name , id_variable , flag_variable_in_table

/*README*/


$GLOBALS['do_init'][] = 'd404_do';

function d404_do(){

	if(! sizeof($GLOBALS['d404']) ){
		return true;

	} else foreach ($GLOBALS['d404'] as $i => $str) {
		$arr = explode(",", $str);
		$page_id = $arr[0];
		$table_name = $arr[1];
		$id_variable = $arr[2];
		if(! $flag_variable = $arr[3] ){
			$flag_variable = 'flag';
		}

		if( _PAGE != $page_id ){
			continue;
		
		} else {
			if(! $id = $_REQUEST[ $id_variable ] ){
				d404();

			} else if(! is_table($table_name) ){
				d404();

			} else if( is_column($table_name, $flag_variable) ){
				if(! dbr(dbq(" SELECT COUNT(*) FROM `$table_name` WHERE `id`='$id' AND `$flag_variable`!=0 "),0,0) ){
					d404();
				}

			} else if(! table($table_name,$id) ){
				d404();
			}

		}

	}

}
