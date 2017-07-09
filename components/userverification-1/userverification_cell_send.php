<?php

# jalal7h@gmail.com
# 2017/04/01
# 1.1

add_action('userverification_cell_send');

function userverification_cell_send(){

	if(! $cell = $_REQUEST['cell'] ){
		ed();

	} else {
		
		// if the key is generated, sms will be send, and if its already sent it will not
		$key = userverification_cell_keyGenerateOrFind();
		dg( $key );
		
		if( que::pop('userverification_cell_keyGenerateOrFind_thisIsNew') == 1 ){
			texty_sms( $cell, 'userverification', [ 'verify_code'=>$key, 'tiny_title'=>setting('tiny_title') ] );
		}
		
		echo userverification_cell_keyTimeRemined();
		
	}

}


