<?

# jalal7h@gmail.com
# 2016/07/10
# 1.0

function admin_html_open(){
?>
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
	<title>.:: <?=setting('main_title')?> - Administrator ::.</title>
	<link rel="shortcut icon" href="image_list/favicon.ico" >
	<META http-equiv=Content-Type content="text/html; charset=utf-8">
	<link rel="stylesheet" href="<?=_URL?>/modules/font-awesome-4.6.1/css/font-awesome.min.css">
	<link href="<?=_URL?>/templates/<?=_THEME?>/font/font.css" rel="stylesheet" type="text/css" />
	<link href="<?=_URL?>/templates/<?=_THEME?>/css/template-admin.css" rel="stylesheet" type="text/css" />
	<?=include_all_css_echotags(); ?>
</head>
<body leftmargin="0" topmargin="0" rightmargin="0" downmargin="0" marginheight="0" marginwidth="0">
	<script type="text/javascript" src="<?=_URL?>/modules/jquery/jquery-1.12.3.min.js"></script>
	<script src="<?=_URL?>/scripts-admin.js"></script>
<?
}

function admin_header(){
	
}

function admin_footer(){
	echo "\n<div class='admin_footer'>&copy; <a target=\"_blank\" href=\"http://parsunix.com\">Parsunix</a> ".date("Y", U() )."</div>\n";
}

function admin_html_close(){
	echo "\n</body>\n</html>\n";
}





