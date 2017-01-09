<?

# jalal7h@gmail.com
# 2017/01/04
# 1.1

function admin_html_open(){

?>
<html xmlns="http://www.w3.org/1999/xhtml" >

<head>
		
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<title>.:: <?=setting('main_title')?> - Administrator ::.</title>
	<link rel="shortcut icon" href="<?=_URL."/".setting('site_ico')?>" >
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="<?=_URL?>/templates/<?=_THEME?>/font/font.css" rel="stylesheet" type="text/css">
	<?=include_all_css_echotags(); ?>
	<link href="<?=_URL?>/templates/<?=_THEME?>/css/template-admin.css" rel="stylesheet" type="text/css">
	
	<?=( is_component('noindexdirtypages') ? noindexdirtypages() : '' )?>

</head>

<body leftmargin="0" topmargin="0" rightmargin="0" downmargin="0" marginheight="0" marginwidth="0">
	
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="<?=_URL?>/scripts-admin.js"></script>
	<?

}


function admin_header(){
	
}


function admin_footer(){
	?>
	<div class="admin_footer">
		&copy; <a target="_blank" href="http://parsunix.com">Parsunix</a>
		<?=date("Y", U() )?>
	</div>
	<?
}


function admin_html_close(){

	echo "\n";
	echo js_enqueue_list();
	
	?>
	</body>
	</html>
	<?

}







