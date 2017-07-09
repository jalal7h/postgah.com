<?php

# jalal7h@gmail.com
# 2017/07/09
# 2.1

function dbf($rs=null){
	
	if($rs==null){
		echo convbox("dbf: No \$rs pointer defined!", "ltr");

	} else {
		return mysqli_fetch_assoc($rs);
	}

	return false;
}

function dbn($rs=null){
	if($rs==null){
		echo convbox("dbn: No \$rs pointer defined!", "ltr");
	} else {
		return mysqli_num_rows($rs);
	}

	return false;
}

function dbnf( $rs=null ){

    if($rs==null){
		echo convbox("dbnf: No \$rs pointer defined!", "ltr");
    } else {
    	return mysqli_num_fields( $rs );
    }

    return false;
}

function dbi(){
	return mysqli_insert_id($GLOBALS['db']);
}

function dbe(){
	// cm_install($force=true);
	return mysqli_error($GLOBALS['db']);
}







