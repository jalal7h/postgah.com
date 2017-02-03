<?

# jalal7h@gmail.com
# 2017/01/25
# 1.3

function contact_vw_send(){

	token_check();
	recaptcha_check();
	
	if(! $_REQUEST['to'] = $_REQUEST['to'] ){
		dg();
	
	} else if(! $_REQUEST['name'] = is_name_correct_or_not( $_REQUEST['name'] ) ){
		dg();

	} else if(! $_REQUEST['email'] = is_email_correct_or_not( $_REQUEST['email'] ) ){
		dg();

	} else if(! $_REQUEST['to'] = setting($_REQUEST['to']) ){
		dg();

	} else if(! dbs( 'contact', ['name','email','cell','to','content','date'=>U()] ) ){
		dg();

	} else {
		
		$vars['sender_name'] = $_REQUEST['name'];
		$vars['sender_email'] = $_REQUEST['email'];
		$vars['contact_linkadmin'] = _URL.'/?page=admin&cp=contact_mg';
		
		echo texty( 'contact_vw_send' , $vars, $_REQUEST['email'] );

	}

}




