<?

function ezTicket_user(){
	
	switch($_REQUEST['do']){
		case 'new':
			ezTicket_user_form();
			return true;
	}

	ezTicket_user_list();

}

