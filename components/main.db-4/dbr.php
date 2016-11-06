<?

# jalal7h@gmail.com
# 2016/07/13
# 1.0

function dbr( $rs=null, $r="", $c="" ){
	
	$bt = debug_backtrace()[1];

	if( $rs==null ){
		echo convbox("dbr at <b>".$bt['function']." : ".$bt['line']."</b><br>No \$rs pointer defined!", "ltr");
	
	} else if( $r==null and $r!==0 ){
		echo convbox("dbr at <b>".$bt['function']." : ".$bt['line']."</b><br>No \$row pointer defined!", "ltr");
	
	} else if(! dbn($rs) ){
		echo convbox("dbr at <b>".$bt['function']." : ".$bt['line']."</b><br>No record found on query pointer", "ltr");
	
	} else if( $c=="" ){
		return mysql_result( $rs, $r );
	
	} else {
		return mysql_result( $rs, $r, $c );
	}

	return false;
	
}







