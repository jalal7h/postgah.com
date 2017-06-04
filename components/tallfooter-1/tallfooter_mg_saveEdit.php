<?

# jalal7h@gmail.com
# 2017/04/22
# 1.1

function tallfooter_mg_saveEdit(){

	$_REQUEST['content'] = str_replace( 'href=\"http' , 'hr_korosova_ef=\"http', $_REQUEST['content'] );
	$_REQUEST['content'] = str_replace( 'href=\"' , 'href=\"'._URL.'/' , $_REQUEST['content'] );
	$_REQUEST['content'] = str_replace( 'hr_korosova_ef=\"http' , 'href=\"http', $_REQUEST['content'] );

	dbs('tallfooter', ['name','content','grid'], ['id'] );

}

