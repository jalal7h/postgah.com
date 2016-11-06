<?

# jalal7h@gmail.com
# 2016/05/13
# Version 1.0

$GLOBALS['cmp']['kwordbanned_mg'] = 'فیلترینگ';
$GLOBALS['cmp-icon']['kwordbanned_mg'] = '0b0';

function kwordbanned_mg(){
	$url = "./?page=admin&cp=".$_REQUEST['cp'];
	$menu = array(
		__FUNCTION__."_list" => __("لیست کلمات"),
		__FUNCTION__."_form" => __("فیلتر کلمه جدید"),
	);
	listmaker_tabmenu($menu,$url);
}



















