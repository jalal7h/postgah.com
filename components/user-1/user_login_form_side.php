<?php

# jalal7h@gmail.com
# 2017/01/29
# 1.1

add_layer( 'user_login_form_side', 'فرم ورود به محیط کاربری', 'side', '1' );

function user_login_form_side(){
	
	if( user_logged() ){
		jsgo( layout_link(14) );
	
	} else {
		echo template_engine( 'user_login_form_side', [

			'username'	=> trim( strip_tags($_REQUEST['username']) ) ,

		]);
	}

}

