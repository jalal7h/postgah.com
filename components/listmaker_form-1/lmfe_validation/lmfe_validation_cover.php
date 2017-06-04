<?php

# jalal7h@gmail.com
# 2017/05/16
# 1.0

function lmfe_validation_cover( $info, $c ){
	
	$req = json_encode($_REQUEST);
	$req = str_enc($req);

	$c.= "
	<div class=\"lmfe_validation_i\" req=\"$req\"  >
		<i class=\"color_checked checked fa fa-2x fa-check-circle\"></i>
		<i class=\"color_wrong wrong fa fa-2x fa-exclamation-circle\"></i>
		<i class=\"color_checking checking fa fa-2x fa-spinner fa-spin\"></i>
		<span class=\"the_message\"></span>
	</div>\n";

	return $c;

}

