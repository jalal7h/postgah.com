<?

# jalal7h@gmail.com
# 2016/09/13
# 1.0

$GLOBALS['do_action'][] = '_404';

function _404(){

	header("HTTP/1.0 404 Not Found");
	?>
	<html>
	<head>
		<title>404, not found!</title>
		<link href="templates/Default/font/font.css" rel="stylesheet" type="text/css">

		<style>
			* {
				margin: 0px;
				padding: 0px;
			}
			body {
				background-color: #d4d2bf;
			}
			div {
				font-family: monospace,Raleway;
			}
			.the_head {
			    margin: calc( 47vh - 90px ) auto 0 auto;
				background-color: white;
				padding: 10px 0 30px 0;
				box-shadow: 0 0 130px #b7b281;
			    font-size: 120px;
			    font-weight: bold;
			    color: #8e895b;
			    text-align: center;
			}
			.the_desc {
			    margin-top: 40px;
				font-size: 24px;
				text-align: center;
				color: #868368;
				text-shadow: 0 0 2px #bfb878;
			}
		</style>
	</head>
	<body>
	<div class="the_head">404</div>
	<div class="the_desc">the page not found!</div>
	</body>
	</html>
	<?
	
	die();
}

