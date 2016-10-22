<?
$GLOBALS['cmp']['pgPlan_mg'] = 'پلان ها';
$GLOBALS['cmp-icon']['pgPlan_mg'] = '009';

function pgPlan_mg(){
	$url = "./?page=admin&cp=".$_REQUEST['cp'];
	$menu = array(
		$_REQUEST['cp']."_list" => "لیست پلان ها",
		$_REQUEST['cp']."_form" => "ثبت پلان جدید",
	);
	listmaker_tabmenu($menu,$url);
}


