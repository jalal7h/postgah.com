<?php

# jalal7h@gmail.com
# 2017/06/21
# 1.5

function dbq( $query='', $force=false ){

	$bt = debug_backtrace()[1];
	
	if(! $query ){
		echo convbox("dbq at <b>".$bt['function']." : ".$bt['line']."</b><br>No query defined!", "ltr");
	
	} else {
		
		$query = str_replace("ي","ی",$query);	
		
		if( $query=='' ){
			dg();
			return false;
		
		} else {
			
			if( $db = dbc() ){
				
				if( strstr( $query, ' INNER JOIN ') ){
					$force = true;
				}

				if(! $force ){
					$query = dbq_query_normalize( $query );
					$query = dbq_query_hide( $query );
				}

				#
				# trafficmonitor
				if( is_component('trafficmonitor') ){
					$GLOBALS['trafficmonitor']['query'][] = $query." - ".
						debug_backtrace()[1]['function'].":".debug_backtrace()[0]['line']." / ".
						debug_backtrace()[2]['function'].":".debug_backtrace()[1]['line'];


				}

				if( $res = mysqli_query( $db, $query ) ){
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
	# fix, if there is no where 1 on select query
	if( $its == "SELECT" and !stristr($query, ' WHERE ') ){
		$delimiters = [ 'ORDER BY', 'GROUP BY', 'LIMIT' ];
		foreach( $delimiters as $delimiter ){
			$delimiter = " $delimiter ";
			if( stristr( $query, $delimiter ) ){
				$query_ar0 = explode( $delimiter, $query );
				$query_ar0[0].= " WHERE 1";
				$query = implode( $delimiter, $query_ar0 );
				$where1_attachment_done = true;
				break;
			}
		}
		if(! $where1_attachment_done ){
			$query.= " WHERE 1";
		}
	}


	#
	# normalize
	if( stristr($query, ' WHERE ') ){
		$query = preg_split("/ WHERE /i", $query);
		
		// $query[0] = str_replace("\t", " ", $query[0]);

		if( $its == "SELECT" ){
			$query = implode(" WHERE `$table_name`.`hide`='0' AND ", $query);
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


