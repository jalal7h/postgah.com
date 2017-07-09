<?

function pgSaleDuration_form(){
	
	echo listmaker_form('
		[!
			"table" => "sale_duration" ,
			"action" => "./?page=admin&cp='.$_REQUEST["cp"].'&func='.$_REQUEST["func"].'",
			"name" => "'.__FUNCTION__.'" ,
			"class" => "'.__FUNCTION__.'" ,
			"switch" => "do",
		!]

			[!"text:name","inDiv"!]
			[!"number:days","inDiv"!]
			
			[!"submit:ثبت","inDiv"!]

		[!close!]
	');

}


