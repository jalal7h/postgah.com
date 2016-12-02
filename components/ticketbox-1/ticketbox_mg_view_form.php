<?

function ticketbox_mg_view_form(){

	# -------------------------------------------------
	return listmaker_form('
		[!
			"table" => "ticketbox" ,
			"action" => "#",
			"class" => "'.__FUNCTION__.'" ,
		!]
			[!"hidden:ticketbox_id"=>"'.$_REQUEST['id'].'"!]
			[!"textarea:text"!]
			
		<div>
			[!"submit:ثبت","notInDiv"!]
			<div class="prompt">اختلال در ثبت.</div>
		</div>
	');
	# -------------------------------------------------

}


