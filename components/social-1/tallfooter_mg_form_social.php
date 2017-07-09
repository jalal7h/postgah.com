<?

# jalal7h@gmail.com
# 2016/10/28
# 1.0

function tallfooter_mg_form_social(){

	for( $i=1; $i<=12; $i++ ){
		$grid_option[] = $i."=>'".$i."/12'";
	}
	$grid_option = '['.implode(',', $grid_option).']';

	# -------------------------------------------------
	echo listmaker_form('
		
		<style>
		#lmfe_tallfooter_mg_form_social_content {
			width:500px;
			height: 200px;
			direction: ltr;
			font-size: 15px;
			font-family: monospace,sans-serif;
		}
		</style>

		[!
			"table" => "tallfooter" ,
			"action" => "'._URL.'/?page=admin&cp='.$_REQUEST['cp'].'",
			"name" => "'.__FUNCTION__.'" ,
			"class" => "'.__FUNCTION__.'" ,
			"switch" => "do",
		!]
			
			[!"name:name*"!]
			[!"hidden:type"=>"social"!]
			[!"select:grid*","dir"=>"ltr","option"=>'.$grid_option.'!]
			[!"textarea:content*","'.__('لینکها').'"!]
			
			<hr>
			
		[!"submit:'.__('ثبت').'"!]
	');
	# -------------------------------------------------


}


