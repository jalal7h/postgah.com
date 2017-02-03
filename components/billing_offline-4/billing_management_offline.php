<?

# jalal7h@gmail.com
# 2017/01/22
# 1.0

function billing_management_offline(){
	
	listmaker_tabmenu([
	
		$_REQUEST['func']."_list&archive=0" => __("لیست پرداخت های تایید نشده") ,
		$_REQUEST['func']."_list&archive=1" => __("آرشیو پرداخت ها") ,
		$_REQUEST['func']."_methods" => __("روشهای پرداخت") ,

	], _URL."/?page=admin&cp=".$_REQUEST['cp']."&func=".$_REQUEST['func'], "func2" );

}

