<?

function anchor_back_to_admin_if_logged(){

	if( is_admin() ){
		//
	
	} else if(! admin_logged() ){
		//
	
	} else {
		return "<a target='_blank' href='"._URL."/admin' id='anchor_back_to_admin_if_logged'>".__('مدیریت')."</a>";
	}

}

