<?

# jalal7h@gmail.com
# 2017/01/22
# 1.1

add_component( 'billing_mg', 'حسابداری', '155' );

function billing_mg(){
	
	$url = _URL."/?page=admin&cp=".$_REQUEST['cp'];
	
	$menu['billing_management_stat'] = __("حساب روزانه");
	$menu['billing_management_user'] = __("صورتحساب های کاربران");
	$menu['billing_management_methods'] = __("درگاه پرداخت آنلاین");
	
	if( is_component('billing_offline') ){
		$menu['billing_management_offline'] = __("پرداخت آفلاین");
	}

	listmaker_tabmenu($menu,$url);

}

