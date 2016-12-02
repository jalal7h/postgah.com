<?
error_log('KK; lsdjkl');
function ticketbox_mg_view_form(){

	# -------------------------------------------------
	return listmaker_form('
		[!
			"table" => "ticketbox" ,
			"action" => "#",
			"class" => "'.__FUNCTION__.'" ,
		!]
			[!"hidden:ticketbox_id"=>"'.$_REQUEST['id'].'"!]
			[!"textarea:text*"!]
			
		[!"submit:ثبت"!]
	');
	# -------------------------------------------------

}


