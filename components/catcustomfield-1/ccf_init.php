<?php

# jalal7h@gmail.com
# 2017/01/20
# 1.0

add_init(function(){
	
	if(! sizeof($GLOBALS['catcustomfield_haveOptions']) ){
		return;
	} else {
		$list_in_string = "'" . implode( "','" , $GLOBALS['catcustomfield_haveOptions'] ) . "'";
		add_jscode( 'var ccf_haveOptions = ['.$list_in_string.'];' );
	}

});

