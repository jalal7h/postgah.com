<?

function layout_mg_meta_save(){
	
	foreach ($GLOBALS['layout-metatag'] as $k => $column) {
		$fields[] = "`".$column."`='".mysql_real_escape_string( $_REQUEST[ $column ] )."'";
	}
	
	if(! $id = $_REQUEST['id'] ){
		e();
	
	} else if(! $rw = table("page", $id) ){
		e();
	
	} else if(! dbq(" UPDATE `page` SET ".implode(',', $fields)." WHERE `id`='".$id."' LIMIT 1 ") ){
		e();
		echo dbe();
	
	} else {
		return true;
	}
	
}


