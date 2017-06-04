<?
$GLOBALS['do_action'][] = 'layout_mg_renameSave';

function layout_mg_renameSave(){
	
	if(! admin_logged() ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! $id = $_REQUEST['id'] ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! $name = $_REQUEST['name'] ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! dbs( "page", array("name"=>$name), array("id"=>$id) ) ){
		e(__FUNCTION__,__LINE__);
	
	} else {
		;//
	}

}


