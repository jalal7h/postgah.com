<?

# jalal7h@gmail.com
# 2016/12/21
# 1.0

$GLOBALS['do_action'][] = 'layout_mg_this_layer_this_remove';

function layout_mg_this_layer_this_remove(){

	if(! admin_logged() ){
		dg();
		echo __('خطا در احراز هویت');

	} else if(! $id = intval($_REQUEST['id']) ){
		dg();
		echo __('خطا در فرایند حذف رخ داده است');

	} else if( $id < 100 ){
		dg();
		echo __('شما مجاز به حذف این لایه نمی باشید.');

	} else if(! dbrm( 'page_layer' ) ){
		dg();
		echo __("خطادر فرایند حذف");
	
	} else {
		dg();
		echo "OK";
	}

}

