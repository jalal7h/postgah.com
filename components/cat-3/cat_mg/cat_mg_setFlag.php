<?php

# jalal7h@gmail.com
# 2017/01/18
# 1.0

add_action('cat_mg_setFlag');

function cat_mg_setFlag(){
	
	if(! admin_logged() ){
	} else if(! $id = $_REQUEST['id'] ){
	} else if(! dbs( 'cat', ['flag'], ['id'] ) ){
	} else {
		echo "OK";
	}

}

