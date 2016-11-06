<?

function layout_mg_save(){

	if(! $name = $_REQUEST['name'] ){
		e(__FUNCTION__,__LINE__);
	} else if(! dbq(" INSERT INTO `page` (`name`) VALUES ('$name') ") ){
		e(__FUNCTION__,__LINE__);
	} else {
		return true;
	}

	return false;
}

