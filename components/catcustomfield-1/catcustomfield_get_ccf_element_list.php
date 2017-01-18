<?php

# jalal7h@gmail.com
# 2017/01/17
# 1.0

add_action('catcustomfield_get_ccf_element_list');

function catcustomfield_get_ccf_element_list(){
	
	echo json_encode( $GLOBALS['catcustomfield-select-options'] );
	
}

