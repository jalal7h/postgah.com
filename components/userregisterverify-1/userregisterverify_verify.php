<?php

# jalal7h@gmail.com
# 2017/04/01
# 1.0

function userregisterverify_verify(){
	
	if(! $u = trim( strip_tags( $_REQUEST['username'] ) ) ){
		ed();
	}

	if( is_column('user', 'email_verified') ){
		$email_where = [ 'email_verified'=>1 ];
	} else {
		$email_where = [];
	}
	if( is_column('user', 'cell_verified') ){
		$cell_where = [ 'cell_verified'=>1 ];
	} else {
		$cell_where = [];
	}

	if( 
		table('user', array_merge($email_where, ['email'=>$u]) )
		or
		(userlogin_username_mobile and table('user', array_merge($cell_where, ['cell'=>$u]) ) )
	){
		qpush( 'userregisterverify_form_username', __('حساب کاربری با %% مورد نظر شما قبلا ثبت شده است.', userlogin_username_title) );

	} else {
		userverification_init( $u, _URL.'/'.Slug::getSlugByName('register').'/'.str_enc($u), $its=null );
		return true;
	}

	return false;

}

