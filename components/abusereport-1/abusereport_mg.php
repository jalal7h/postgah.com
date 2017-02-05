<?

# jalal7h@gmail.com
# 2017/01/22
# 1.2

add_component( 'abusereport_mg', 'گزارشات تخلف', '071' );

function abusereport_mg(){
	
	listmaker_tabmenu([
	
		"abusereport_mg_list" => __("لیست %%",[ lmtc('abusereport')[1] ] ),
		"cat_mg&l=abusereport" => cat_detail('abusereport')['name'],

	], _URL."/?page=admin&cp=".$_REQUEST['cp'] );

}

