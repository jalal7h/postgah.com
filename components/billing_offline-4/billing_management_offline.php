<?

function billing_management_offline(){
	
	$url = "./?page=admin&cp=".$_REQUEST['cp']."&func=".$_REQUEST['func'];
	
	$menu = array(
		$_REQUEST['func']."_list&archive=0" => __("لیست پرداخت های تایید نشده") ,
		$_REQUEST['func']."_list&archive=1" => __("آرشیو پرداخت ها") ,
		$_REQUEST['func']."_methods" => __("روشهای پرداخت") ,
	);

	listmaker_tabmenu( $menu , $url, "func2" );
	
}


