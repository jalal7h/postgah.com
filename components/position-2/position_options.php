<?

# jalal7h@gmail.com
# 2016/10/09
# 1.0

function position_options( $type , $array=true ){
	
	if(! $rs = dbq(" SELECT * FROM `position` WHERE `type`='$type' ORDER BY `name` ") ){
		e(__FUNCTION__,__LINE__);
		
	} else while( $rw = dbf($rs) ){
		
		if( $array ){
			$c[ $rw['id'] ] = $rw['name'];
		
		} else {
			$c.= "<option value='".$rw['id']."' >".$rw['name']."</option>";
		}
	
	}
	
	return $c;
	
}


