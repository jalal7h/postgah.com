<?

# jalal7h@gmail.com
# 2016/09/18
# 1.2

function contact_vw_send(){

	token_check();

	if(! $_REQUEST['to'] = $_REQUEST['to'] ){
		dg();
	
	} else if(! $_REQUEST['to'] = setting($_REQUEST['to']) ){
		dg();
	
	} else if(! dbs( 'contact', ['name','email','cell','to','content','date'=>U()] ) ){
		dg();

	} else {
		echo texty( 'contact_vw_send' , $_REQUEST, $_REQUEST['email'] );
	}

}

