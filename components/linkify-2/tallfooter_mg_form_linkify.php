<?

# jalal7h@gmail.com
# 2017/05/01
# 1.1

function tallfooter_mg_form_linkify(){
	
	for( $i=1; $i<=12; $i++ ){
		$grid_option[] = $i."=>'".$i."/12'";
	}
	$grid_option = '['.implode(',', $grid_option).']';

	# -------------------------------------------------
	echo listmaker_form('
		
		[!"table" => "tallfooter"!]
			
			[!"name:name*"!]
			[!"hidden:type"=>"linkify"!]
			[!"select:grid*","dir"=>"ltr","option"=>'.$grid_option.'!]
			[!"select:content*","'.__('جعبه پیوند').'","option"=>listmaker_option("linkify_config","`flag`=1",true)!]
			
			<hr>

		[!submit!]

	');
	# -------------------------------------------------

}


	




