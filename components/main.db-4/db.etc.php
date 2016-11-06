<?

# jalal7h@gmail.com
# 2016/09/12
# 1.12

function dbf($rs=null){
	
	if($rs==null){
		echo convbox("dbf: No \$rs pointer defined!", "ltr");

	} else {
		return mysql_fetch_assoc($rs);
	}

	return false;
}

function dbn($rs=null){
	if($rs==null){
		echo convbox("dbn: No \$rs pointer defined!", "ltr");
	} else {
		return mysql_num_rows($rs);
	}

	return false;
}

function dbnf( $rs=null ){

    if($rs==null){
		echo convbox("dbnf: No \$rs pointer defined!", "ltr");
    } else {
    	return mysql_num_fields( $rs );
    }

    return false;
}

function dbi(){
	return mysql_insert_id();
}

function dbe(){
	// cm_install($force=true);
	return mysql_error();
}







