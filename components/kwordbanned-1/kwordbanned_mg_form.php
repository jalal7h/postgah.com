<?

# jalal7h@gmail.com
# 2016/10/31
# 1.0

function kwordbanned_mg_form(){

	if( $_REQUEST['func']=='kwordbanned_mg_form' ){
		$id = $_REQUEST['id'];
	}
	
	# -------------------------------------------------
	echo listmaker_form('
		[!
			"table" => "kwordbanned" ,
			"action" => "./?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['cp'].'_list",
			"name" => "'.__FUNCTION__.'" ,
			"class" => "'.__FUNCTION__.'" ,
			"switch" => "do",
		!]
			
			'.( $id ? '' : "<hr>" ).'
			[!"text:kword*"'.( $id ? '' : ',"notInDiv"' ).'!]
			'.( $id ? "<hr>" : '' ).'
			
		[!"submit:'.__('ثبت').'"'.( $id ? '' : ',"notInDiv"' ).'!]
	');
	# -------------------------------------------------


}

