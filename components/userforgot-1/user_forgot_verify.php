<?php

# jalal7h@gmail.com
# 2017/03/14
# 1.0

function user_forgot_verify(){

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
		!table('user', array_merge($email_where, ['email'=>$u]) )
		and
		!(userlogin_username_mobile and table('user', array_merge($cell_where, ['cell'=>$u]) ) )
	){
		echo convbox_back( __('هیچ حساب کاربری با %% مورد نظر شما ثبت نشده است.', userlogin_username_title) );

	} else {
		userverification_init( $u, _URL.'/'.Slug::getSlugByName('forgot').'/new/'.str_enc($u), $its=null );
		return true;
	}

	return false;

}



