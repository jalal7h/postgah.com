<?

# jalal7h@gmail.com
# 2016/12/07
# 1.0

function query_table_name( $q, $skip_tableCheck=false ){
	
	if(! $q ){
		dg();
		ed("no query defined");

	} else if(! is_string($q) ){
		dg();
		ed('its not string '.$q.";");

	} else {
		$q = trim($q);
	}

	$q = str_ireplace( ['INSERT INTO ','UPDATE '], 'FROM ', $q );

	$table_name = trim(preg_split("/ from /i", $q)[1]);
	$table_name = trim(explode(' ', $table_name)[0]);
	$table_name = str_replace('`', '', $table_name);
	$table_name = trim($table_name);
	
	if(! $skip_tableCheck ){
		if(! is_table($table_name) ){
			ed('could not fetch the table name from query');
		}
	}

	return $table_name;

}

