<?php

# jalal7h@gmail.com
# 2017/02/08
# 1.0

/**
* input : text 
* output : covered text
*/
function convbox_back( $text, $dir=null ){
	
	$text.= "<br><a href=\"javascript:history.go(-1);\">".__('بازگشت')."</a>";

	return convbox( $text, $dir );

}

