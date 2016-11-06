<?

function layout_mg_remove(){

	if(! $id = $_REQUEST['id'] ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! dbq(" DELETE FROM `page_layer` WHERE `page_id`='$id' ") ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! dbq(" DELETE FROM `page` WHERE `id`='$id' LIMIT 1 ") ){
		e(__FUNCTION__,__LINE__);
	
	} else {
		return true;
	}

	return false;
}

