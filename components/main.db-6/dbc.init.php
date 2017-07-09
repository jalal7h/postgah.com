<?

# jalal7h@gmail.com
# 2017/07/06
# 2.0

function dbc(){

	# INSERT `test` SET `zaman` = 3.5 * 3600 + UNIX_TIMESTAMP();
	
	$db = mysqli_connect( mysql_host, mysql_username , mysql_password, mysql_database );
	
	if( mysqli_connect_errno() ){
		$prompt = "
		<img style='width:350px; max-width:50%; margin-bottom:30px;' src='http://parsunix.com/cdn/img/tools2.png' >
		<br>
		MySQL service is down !<!-- ".mysqli_error()." -->";

	} else if(! mysqli_query($db, " SET NAMES 'utf8' ") ){
		$prompt = "problem setting NAMES, cant set names";
	
	} else if(! mysqli_query($db, " SET time_zone = '+3:30' ") ){
		$prompt = "problem setting time_zone";
	
	} else {
		$GLOBALS['db'] = $db;
		return $db;
	}
	
	#
	# if mysql is down
	?>
	<div style="width:100%;padding-top:8%; font:bold 30px monospace; margin:auto;">
		<center class=er1 ><?=$prompt?></center>
	</div>
	<?
	die();
	
}



