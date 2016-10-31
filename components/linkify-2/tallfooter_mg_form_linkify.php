<?

# jalal7h@gmail.com
# 2016/10/31
# 1.0

function tallfooter_mg_form_linkify(){
	
	for( $i=1; $i<=12; $i++ ){
		$grid_option[] = $i."=>'".$i."/12'";
	}
	$grid_option = '['.implode(',', $grid_option).']';

	# -------------------------------------------------
	echo listmaker_form('
		[!
			"table" => "tallfooter" ,
			"action" => "./?page=admin&cp=".$_REQUEST["cp"],
			"name" => "'.__FUNCTION__.'" ,
			"class" => "'.__FUNCTION__.'" ,
			"switch" => "do",
		!]
			
			[!"name:name*"!]
			[!"select:grid*","dir"=>"ltr","option"=>'.$grid_option.'!]
			[!"select:content*","جعبه پیوند","option"=>listmaker_option("linkify_config","`flag`=1")!]
			
			<hr>
			
		[!"submit:ثبت"!]
	');
	# -------------------------------------------------

}


