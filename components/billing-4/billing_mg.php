<?

# jalal7h@gmail.com
# 2016/12/23
# 1.0

$GLOBALS['cmp']['billing_management'] = 'حسابداری';
$GLOBALS['cmp-icon']['billing_management'] = '155';

function billing_management(){
	
	$url = "./?page=admin&cp=".$_REQUEST['cp'];
	
	$menu['billing_management_stat'] = __("حساب روزانه");
	$menu['billing_management_user'] = __("صورتحساب های کاربران");
	$menu['billing_management_methods'] = __("درگاه پرداخت آنلاین");
	if( is_component('billing_offline') ){
		$menu['billing_management_offline'] = __("پرداخت آفلاین");
	}

	listmaker_tabmenu($menu,$url);

}

