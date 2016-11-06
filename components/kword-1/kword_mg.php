<?

# jalal7h@gmail.com
# 2016/05/13
# Version 1.0

$GLOBALS['cmp']['kword_mg'] = 'کلمات کلیدی';
$GLOBALS['cmp-icon']['kword_mg'] = '292';

function kword_mg(){
	
	$url = "./?page=admin&cp=".$_REQUEST['cp'];
	$menu = array(
		__FUNCTION__."_list" => __("لیست کلمات"),
		__FUNCTION__."_fileForm" => __("ثبت کلمه جدید"),
	);
	
	listmaker_tabmenu($menu,$url);

}



















