<?php

# jalal7h@gmail.com
# 2017/07/30
# 1.0

function number_fa2en( $num ){
	
	$per = array('۰','۱','۲','۳','۴','۵','۶','۷','۸','۹');
	$eng = array('0','1','2','3','4','5','6','7','8','9');
    
    return str_replace($per,$eng,$num);

}

function number_en2fa( $num ){
	
	$eng = array('0','1','2','3','4','5','6','7','8','9');
	$per = array('۰','۱','۲','۳','۴','۵','۶','۷','۸','۹');
    
    return str_replace($eng,$per,$num);

}

