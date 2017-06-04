<?

# jalal7h@gmail.com
# 2017/02/08
# 1.3

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
		$texty_name = table('texty',$_REQUEST['id'], 'name');
		$texty_name = __( $texty_name );
		echo convbox( __("تغییرات مربوط به پیام های <b>%%</b> ثبت شد", [ $texty_name ] ) );
	}

}


