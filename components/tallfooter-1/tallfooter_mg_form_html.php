<?

# jalal7h@gmail.com
# 2016/10/30
# 1.0

function tallfooter_mg_form_html(){

	for( $i=1; $i<=12; $i++ ){
		$grid_option[] = $i."=>'".$i."/12'";
	}
	$grid_option = '['.implode(',', $grid_option).']';



	# -------------------------------------------------
	echo listmaker_form('
		<style>
		.'.__FUNCTION__.' .mce-tinymce.mce-container.mce-panel {
			width: calc( 100% - 140px );
			display: inline-block;
		}
		</style>
		[!
			"table" => "tallfooter" ,
			"action" => "./?page=admin&cp=".$_REQUEST["cp"],
			"name" => "'.__FUNCTION__.'" ,
			"class" => "'.__FUNCTION__.'" ,
			"switch" => "do",
		!]
			
			[!"text:name*"!]
			[!"hidden:type"=>"html"!]
			[!"select:grid*","dir"=>"ltr","option"=>'.$grid_option.'!]
			
			<hr>

			[!"textarea:content.tinymce"!]
			
			<hr>
			
		[!"submit:ثبت"!]
	');
	# -------------------------------------------------

}

