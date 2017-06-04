<?

function useraccess_mg_remove(){

	if(! $id = intval($_REQUEST['id']) ){
		e();

	} else if(! dbrm( 'user', $id, true ) ){
		e();

	} else {
		return true;
	}

	return false;

}

