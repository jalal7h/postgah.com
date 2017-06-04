<?

# jalal7h@gmail.com
# 2017/05/01
# 1.0

function tallfooter_mg_form_seo(){
	
	for( $i=1; $i<=12; $i++ ){
		$grid_option[] = $i."=>'".$i."/12'";
	}
	$grid_option = '['.implode(',', $grid_option).']';

	# -------------------------------------------------
	echo listmaker_form('
		[!"table" => "tallfooter"!]
			
			[!"name:name*"!]
			[!"hidden:type"=>"seo"!]
			[!"select:grid*","dir"=>"ltr","option"=>'.$grid_option.'!]
			
			<hr>
			
		[!submit!]
	');
	# -------------------------------------------------

}


