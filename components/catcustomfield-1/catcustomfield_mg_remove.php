<?php

# jalal7h@gmail.com
# 2017/01/18
# 1.0

add_action( 'catcustomfield_mg_remove' );
add_jstext( 'remove_ccf', __('آیا مایل به حذف این خصیصه هستید؟') );

function catcustomfield_mg_remove(){
	
	if(! admin_logged() ){
		ed();

	} else if(! dbrm( 'catcustomfield', null, true ) ){
		ed();

	} else {
		echo "OK";
	}

}

