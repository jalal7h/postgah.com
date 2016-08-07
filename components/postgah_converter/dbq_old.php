<?

#
# old mysql connection
function dbq_old( $query ){
	if(! $db_link_old = mysql_connect( mysql_host, mysql_username, mysql_password ) ){
		echo __LINE__."<br>";
	} else if(! mysql_select_db( mysql_database_old, $db_link_old ) ){
		echo __LINE__."<br>";
	} else if(! mysql_query(" SET NAMES 'latin1' ", $db_link_old) ){
		echo __LINE__."<br>";	
	} else if(! $rs = mysql_query($query, $db_link_old) ){
		echo __LINE__.mysql_error()."<br>";
	} else {
		return $rs;
	}

}



