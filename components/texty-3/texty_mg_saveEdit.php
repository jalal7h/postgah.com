<?

# jalal7h@gmail.com
# 2016/11/01
# 1.1

function texty_mg_saveEdit(){

	if(! dbs( 'texty', ['prompt', 'user_email_subject', 'user_email_content', 'admin_email_subject', 'admin_email_content', 'user_sms', 'admin_sms'], ['id'] ) ){

	} else {
		echo convbox( __( "تغییرات مربوط به پیام های <b>%%</b> ثبت شد", [table('texty',$_REQUEST['id'], 'name')] ) );
	}

}


