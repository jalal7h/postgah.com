<?

# jalal7h@gmail.com
# 2017/01/22
# 1.0

add_component( 'useraccess_mg', 'مدیران', '0f0' );

function useraccess_mg(){
	
	listmaker_tabmenu([
	
		"useraccess_mg_list" => __("لیست مدیران"),
		"useraccess_mg_form" => __("ثبت مدیر جدید"),

	], _URL."/?page=admin&cp=".$_REQUEST['cp'] );

}



