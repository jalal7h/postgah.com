<?

# jalal7h@gmail.com
# 2016/11/28
# 1.1

$GLOBALS['cmp']['abusereport_mg'] = 'گزارش تخلف';
$GLOBALS['cmp-icon']['abusereport_mg'] = '071';

function abusereport_mg(){

	$url = "./?page=admin&cp=".$_REQUEST['cp'];
	$menu = array(
		"abusereport_mg_list" => __("لیست %%",[ lmtc('abusereport')[1] ] ),
		"cat_mg&l=abusereport" => cat_detail('abusereport')['name'],
	);
	
	listmaker_tabmenu($menu,$url);
	
}

