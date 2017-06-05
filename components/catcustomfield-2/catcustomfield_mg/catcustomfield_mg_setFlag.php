<?php

# jalal7h@gmail.com
# 2017/01/18
# 1.0

add_action('catcustomfield_mg_setFlag');

function catcustomfield_mg_setFlag(){
	
	if(! admin_logged() ){
		ed();

	} else if(! dbs( 'catcustomfield', ['flag'], ['id'] ) ){
		ed();

	} else {
		echo "OK";
	}

}

