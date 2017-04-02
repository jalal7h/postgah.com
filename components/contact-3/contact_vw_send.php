<?

# jalal7h@gmail.com
# 2017/04/02
# 1.4

function contact_vw_send(){

	token_check();
	// recaptcha_check();
	
	if(! $_REQUEST['to'] = $_REQUEST['to'] ){
		que::push( 'contact_vw_form_to', __('مقصد پیام انتخاب نشده است.') );
	
	} else if(! $_REQUEST['name'] = is_name_correct_or_not( $_REQUEST['name'] ) ){
		que::push( 'contact_vw_form_name', __('لطفا نام خود را درست وارد کنید.') );

	} else if(! $_REQUEST['email'] = is_email_correct_or_not( $_REQUEST['email'] ) ){
		que::push( 'contact_vw_form_email', __('آدرس ایمیل بدرستی وارد نشده است.') );

	} else if(! $destination = setting($_REQUEST['to']) ){
		que::push( 'contact_vw_form_to', __('مقصد پیام انتخاب نشده است.') );

	} else if(! $_REQUEST['content'] = trim($_REQUEST['content']) ){
		que::push( 'contact_vw_form_content', __('لطفا متن پیام را بدرستی وارد کنید.') );

	} else if(! dbs( 'contact', ['name','email','cell','to'=>$destination,'content','date'=>U()] ) ){
		que::push( 'contact_vw_form_dbs', __('اختلالی در ثبت پیام رخ داده است.') );

	} else {
		
		$vars['sender_name'] = $_REQUEST['name'];
		$vars['sender_email'] = $_REQUEST['email'];
		$vars['contact_linkadmin'] = _URL.'/admin/contact';
		
		echo texty( 'contact_vw_send' , $vars, $_REQUEST['email'] );

		return true;

	}

	return false;

}




