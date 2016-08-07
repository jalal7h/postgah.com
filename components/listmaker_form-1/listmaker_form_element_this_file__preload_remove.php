<?
$GLOBALS['do_action'][] = 'listmaker_form_element_this_file__preload_remove';

function listmaker_form_element_this_file__preload_remove(){

	if(! $TableIdColumn_md5 = $_REQUEST['TableIdColumn_md5'] ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! isset( $_SESSION['lmfetfp-remove-stack'][ $TableIdColumn_md5 ] ) ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! $TableIdColumn = $_SESSION['lmfetfp-remove-stack'][ $TableIdColumn_md5 ] ){
		e(__FUNCTION__,__LINE__);
	
	} else {
		
		$tic_arr = explode(":",$TableIdColumn);
		$table = $tic_arr[0];
		$id = $tic_arr[1];
		$column = $tic_arr[2];
		
		if(! $rw_Table = table($table,$id) ){
			e(__FUNCTION__,__LINE__);
		
		} else if( 
			$_SESSION['lmfetfp-remove-stack-deleteRow'][$TableIdColumn_md5] 
			and (!dbq(" DELETE FROM `$table` WHERE `id`='$id' LIMIT 1 ")) ){
			e(__FUNCTION__,__LINE__);
		
		} else if( 
			(!$_SESSION['lmfetfp-remove-stack-deleteRow'][$TableIdColumn_md5]) 
			and (!dbs($table,[$column=>''],['id'=>$id])) ){
			e(__FUNCTION__,__LINE__);
		
		} else if(! unlink($rw_Table[ $column ]) ){
			e(__FUNCTION__,__LINE__);
		
		} else {
			e(__FUNCTION__,__LINE__,$table.$id.$column);
		}
		
	}

}


