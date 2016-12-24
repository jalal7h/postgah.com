<?

# jalal7h@gmail.com
# 2016/12/16
# 1.2

function texty_mg_saveEdit(){

	if(! dbs( 'texty', [ 
		
		'prompt',

		'user_email_subject', 
		'user_email_content', 
		'user_sms', 

		'user2_email_subject', 
		'user2_email_content', 
		'user2_sms', 

		'admin_email_subject', 
		'admin_email_content', 
		'admin_sms'

	], ['id'] ) ){

	} else {
		echo convbox( __("تغییرات مربوط به پیام های <b>%%</b> ثبت شد", [table('texty',$_REQUEST['id'], 'name')] ) );
	}

}


