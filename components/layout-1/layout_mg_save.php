<?

function layout_mg_save(){

	if(! $name = $_REQUEST['name'] ){
		e();

	} else if(! dbq(" INSERT INTO `page` (`name`) VALUES ('$name') ") ){
		e();

	} else {
		return true;
	}

	return false;
	
}

