<?php

# jalal7h@gmail.com
# 2017/07/29
# 1.2

function position_translate( $id ){
	
	if(! $rs = dbq(" SELECT `name` FROM `position` WHERE `id`='$id' LIMIT 1 ") ){
		e();
	
	} else if( dbn($rs)!=1 ){
		return '';
	
	} else {
		return dbr( $rs, 0, 0 );
	}

}

