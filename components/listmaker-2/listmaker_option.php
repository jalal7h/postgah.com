<?

# jalal7h@gmail.com
# 2016/04/01
# Version 1.2

function listmaker_option( $table_name, $condition="", $returnArray=false ){
	return listmaker_select_options($table_name,$condition,$returnArray);
}

function listmaker_select_options( $table_name, $condition="", $returnArray=false ){
	
	if(!$rs = dbq(" SELECT * FROM `$table_name` WHERE 1 ".$condition)){
		$c.= "err ".__LINE__;
	} else if(!dbn($rs)){
		$c.= "err ".__LINE__." - SELECT * FROM `$table_name` WHERE 1 ".$condition;
	} else while($rw = dbf($rs)){
		if($returnArray){
			$c[$rw['id']] = $rw['name'];
		} else {
			$c.= "<option value='".$rw['id']."' >".$rw['name']."</option>";
		}
	}
	
	return $c;
}


