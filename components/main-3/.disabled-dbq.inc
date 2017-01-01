<?

# jalal7h@gmail.com
# 2016/01/23
# Version 1.5.1


define( 'database_driver' , 'mysql' );


function dbq( $query='' ){

	$query = str_replace("ي","ی",$query);

	switch( database_driver ){
		
		case 'mysql':
		    $GLOBALS['dbq']['db'] = new PDO('mysql:host='.mysql_host.';dbname='.mysql_database.';charset=utf8' , mysql_username , mysql_password );
		    break;

		default : 
			$GLOBALS['dbq']['db'] = new PDO("sqlite:../database.db");
	}

	if(! $GLOBALS['dbq']['db'] ){
		echo __FUNCTION__." : ".__LINE__;
	// } else if(! $GLOBALS['dbq']['db']->exec(" SET NAMES 'utf8' ")){
		// echo __FUNCTION__." : ".__LINE__;
	// } else if(! $GLOBALS['dbq']['db']->exec(" SET time_zone = '+3:30' ")){
		// echo __FUNCTION__." : ".__LINE__;
	} else {
		if( (!$query) or ($query=='') ){
			echo "No query defined!";
		} else if(! $rs_pdo = $GLOBALS['dbq']['db']->query( $query ) ){
			echo dbe();
		} else if( substr(trim(strtolower($query)) , 0 , 7)!="select " ){
			return true;
		} else {
			#
			# load from GLOBALS
			$gdbq = $GLOBALS['dbq'];
			#
			# create new pointer
			$rs = ++$gdbq['pointer'];
			#
			# store this query result
			$gdbq['storage'][ $rs ] = $rs_pdo->fetchAll();
			#
			# set cursor for new pointer
			$gdbq['cursor'][ $rs ] = 0;
			#
			# save to GLOBALS
			$GLOBALS['dbq'] = $gdbq;
			#
			# return pointer
			return $rs;
		}
	}

	echo "
	<div style='width:100%;padding-top:8%; font:bold 30px monospace; margin:auto;'>
	<img style='width:350px; max-width:50%; margin-bottom:30px;' src='http://parsunix.com/cdn/img/tools2.png' >
	<br>
	MySQL service is down !
	</div>";

	return false;
}


function dbf( $rs=null ){
	
	if( $rs==null ){
		echo "No \$rs pointer defined!";
		return false;
	}

	$cursor = $GLOBALS['dbq']['cursor'][ $rs ];
	$result = $GLOBALS['dbq']['storage'][ $rs ];
	$num_of_rows = count( $GLOBALS['dbq']['storage'][ $rs ] );
	
	if( $num_of_rows <= $cursor ){
		;//
	} else {
		$rw = $result[ $cursor ];
		$GLOBALS['dbq']['cursor'][ $rs ]++;
		return $rw;
	}

	return false;
}


function dbr( $rs=null , $r="" , $c="" ){
	
	if($rs==null){
		echo "No \$rs pointer defined!";
	} else if($r==null and $r!==0){
		echo "No \$row pointer defined!";
	} else {

		$result = $GLOBALS['dbq']['storage'][ $rs ];
		
		if( $c=="" ){
			return $result[ $r ];
		} else {
			return $result[ $r ][ $c ];
		}
	}

	return false;
}

function dbn( $rs=null ){
	
	if($rs==null){
		echo "No \$rs pointer defined!";
	} else {
		return count( $GLOBALS['dbq']['storage'][ $rs ] );
	}

	return false;
}

function dbc( $rs=null ){

	if($rs==null){
		echo "No \$rs pointer defined!";
	} else {
		return count( $GLOBALS['dbq']['storage'][ $rs ][ 0 ] );
	}

	return false;
}

function dbi(){
	return $GLOBALS['dbq']['db']->lastInsertId();
}

function dbe(){
	return $GLOBALS['dbq']['db']->errorInfo();
}

function dbs($table, $array_set, $array_where){
	
	foreach($array_set as $k => $r){
		$string_set[] = "`$k`='$r'";
	}
	$string_set = implode(",",$string_set);
	
	foreach($array_where as $k => $r){
		$string_where[] = "`$k`='$r'";
	}
	$string_where = implode(" AND ",$string_where);

	$query = " UPDATE `$table` SET $string_set WHERE $string_where ";
	// e($query);

	return dbq($query);
}







// INSERT `test` SET `zaman` = 3.5 * 3600 + UNIX_TIMESTAMP();












