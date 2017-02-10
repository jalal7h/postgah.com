<?

# jalal7h@gmail.com
# 2016/12/07
# 1.2

function dbq( $query='', $force=false ){

	$bt = debug_backtrace()[1];
	
	if(! $query ){
		echo convbox("dbq at <b>".$bt['function']." : ".$bt['line']."</b><br> No query defined!", "ltr");
	
	} else {
		
		$query = str_replace("ي","ی",$query);	
		
		if( $query=='' ){
			dg();
			return false;
		
		} else {
			
			if( dbc() ){
				
				if( strstr( $query, ' INNER JOIN ') ){
					$force = true;
				}

				if(! $force ){
					$query = dbq_query_normalize( $query );
					$query = dbq_query_hide( $query );
				}

				if( $res = mysql_query( $query ) ){
					return $res;
				
				} else {
					dg( $query );
					return false;
				}
			
			} else {
				dg();
				return false;
			}
		}

	}

	dg();
	return false;
	
}




function dbq_query_normalize( $query ){
	$query = trim($query);
	return $query;
}

function dbq_query_hide( $query ){

	// return $query;

	if( stristr($query, 'INFORMATION_SCHEMA.') ){
		return $query;
	}

	$qUT = strtoupper($query);
	$q7 = substr($qUT,0,7);

	switch( $q7 ){
		
		case 'SELECT ':
			$its = "SELECT";
			break;

		case 'DELETE ':
			$its = "DELETE";
			break;

		default:
			return $query;
	}

	# 
	# fetch table name from query
	$table_name = query_table_name( $query, $skip_tableCheck=true );

	if(! is_column($table_name,'hide') ){
		return $query;
	}

	# 
	# tableName =>  `tableName`
	$table_name = query_table_name( $query );
	$query = str_ireplace( 
		[" $table_name "	, " ".$table_name."."],
		[" `$table_name` "	, " `".$table_name."`." ],
		$query );

	#
	# normalize
	if( stristr($query, ' WHERE ') ){
		$query = preg_split("/ WHERE /i", $query);
		
		// $query[0] = str_replace("\t", " ", $query[0]);

		if( $its == "SELECT" ){
			$query = implode(" WHERE `hide`='0' AND ", $query);
		} else {
			$query = implode(" WHERE ", $query);
		}
	}

	#
	# replace
	// if( $its=="SELECT" ){
	// 	if( stristr($query, ' WHERE ') ){
			
	// 		$query = str_ireplace(
	// 			" FROM `$table_name` WHERE ", 
	// 			" FROM `$table_name` WHERE `hide`='0' AND ", 
	// 			$query);

	// 		error_log('dqh; '.$query);
	// 	}
	// } else 

	if( $its=="DELETE" ){
		// echo $query;die();
		$query = str_ireplace( 
			"DELETE FROM `$table_name` ", 
			"UPDATE `$table_name` SET `hide`='1' ", $query );
	}
	
	// error_log('dqh; '.$query);
	// die();

	return $query;
}


