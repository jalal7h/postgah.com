<?

$GLOBALS['cmp']['billing_management'] = 'حسابداری';
$GLOBALS['cmp-icon']['billing_management'] = '155';

function billing_management(){
	
	$url = "./?page=admin&cp=".$_REQUEST['cp'];
	$menu = array(
		$_REQUEST['cp']."_stat" => __("حساب روزانه") ,
		$_REQUEST['cp']."_user" => __("فاکتور های کاربران") ,
		$_REQUEST['cp']."_methods" => __("درگاه پرداخت آنلاین") ,
		$_REQUEST['cp']."_offline" => __("پرداخت آفلاین") ,

	);

	listmaker_tabmenu($menu,$url);

}

