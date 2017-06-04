<?

$GLOBALS['do_action'][] = 'listmaker_formfield_file_preuploadedfiles_remove';

function listmaker_formfield_file_preuploadedfiles_remove(){

	if(! session_id() ){
		session_start();
	}

	if(! is_admin() ) {
		e();
	
	} else if(!$path = $_REQUEST['path']){
		e();
	
	} else if(! strstr($path, FILE_UPLOAD_DATA_DIR)){
		e();

	} else if(! $_SESSION['listmaker_formfield-validtoremove'] ){
		e();
	
	} else if(!in_array($path, $_SESSION['listmaker_formfield-validtoremove'])){
		e($path." not placed in ".sizeof($_SESSION['listmaker_formfield-validtoremove']) );
		e();
	
	} else if( file_exists($path) and (!unlink($path)) ){
		e();
	
	} else {

		#
		# remove on table
		if(! $table_id_column = $_SESSION['listmaker_formfield-validtoremove-table_id_column-'.md5($path)] ){
			//

		} else {
						
			#
			# variables
			$table_id_column = explode(':', $table_id_column);
			$table = $table_id_column[0];
			$id = $table_id_column[1];
			$column = $table_id_column[2];

			# 
			# query
			dbq(" UPDATE `$table` SET `$column`='' WHERE `id`='$id' LIMIT 1 ");

		}

		e("$path removed");
		die();

	}

	e("<br>invalid access for fileupload_remove");
	die();

}





