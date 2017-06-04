<?php

# jalal7h@gmail.com
# 2017/01/18
# 1.0

add_action('catcustomfield_mg_setGrid');

function catcustomfield_mg_setGrid(){
	
	if(! admin_logged() ){
		ed();

	} else if(! dbs( 'catcustomfield', ['grid'], ['id'] ) ){
		ed();

	} else {
		echo "OK";
	}

}

