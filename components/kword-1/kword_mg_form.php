<?

# jalal7h@gmail.com
# 2016/10/31
# 1.0

function kword_mg_form(){

	if( $_REQUEST['func'] == 'kword_mg_form' ){
		$id = $_REQUEST['id'];
	}
	
	# -------------------------------------------------
	echo listmaker_form('
		[!
			"table" => "kword" ,
			"action" => "./?page=admin&cp='.$_REQUEST['cp'].'&func='.$_REQUEST['cp'].'_list",
			"name" => "'.__FUNCTION__.'" ,
			"class" => "'.__FUNCTION__.'" ,
			"switch" => "do",
		!]
			
			[!"text:kword*"!]
			<hr>
			
		[!"submit:ثبت"!]
	');
	# -------------------------------------------------

}

