<?php

# jalal7h@gmail.com
# 2017/01/16
# 1.0

function var_control( $var , $control ){
	
	return mb_ereg_replace( '[^'.$control.']+', '', $var );

}

