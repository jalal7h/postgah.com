<?

function position_options( $type , $array=true ){
	
	if(! $rs01 = dbq(" SELECT * FROM `position` WHERE `type`='$type' ORDER BY `name` ") ){
		echo "err - ".__LINE__;
	
	} else while( $rw01 = dbf($rs01) ){
		
		if( $array ){
			$c[ $rw01['id'] ] = $rw01['name'];
		
		} else {
			$c.= "<option value='".$rw01['id']."' >".$rw01['name']."</option>";
		}
	
	}

	return $c;
	
}


