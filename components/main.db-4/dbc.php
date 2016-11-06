<?

# jalal7h@gmail.com
# 2016/07/13
# 1.0

function dbc(){

	# INSERT `test` SET `zaman` = 3.5 * 3600 + UNIX_TIMESTAMP();

	if(! $db = @mysql_connect( mysql_host , mysql_username , mysql_password ) ){
		$prompt = "problem connecting to mysql server, invalid username or password";
	
	} else if(! mysql_query(" SET NAMES 'utf8' ") ){
		$prompt = "problem setting NAMES, cant set names";
	
	} else if(! mysql_query(" SET time_zone = '+3:30' ") ){
		$prompt = "problem setting time_zone";
	
	} else if(! mysql_select_db( mysql_database ) ){
		$prompt = "
		<img style='width:350px; max-width:50%; margin-bottom:30px;' src='http://parsunix.com/cdn/img/tools2.png' >
		<br>
		MySQL service is down !";
	
	} else {
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



