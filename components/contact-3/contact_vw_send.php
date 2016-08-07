<?

# jalal7h@gmail.com
# 2016/07/29
# 1.1

function contact_vw_send(){

	if(! $_REQUEST['to'] = $_REQUEST['to'] ){
		e(__FUNCTION__,__LINE__);
	
	} else if(! $_REQUEST['to'] = setting($_REQUEST['to']) ){
		e(__FUNCTION__,__FILE__);
	
	} else if(! dbs('contact', ['name','email_address','cell_number','to','content','date'=>U()] ) ){
		e(__FUNCTION__,__FILE__);

	} else {
		
		echo "<div class='convbox contact_vw_send'>";
		echo texty( "contact_vw_send" , $_REQUEST, $_REQUEST['email_address'] );
		echo "</div>";

	}

}

