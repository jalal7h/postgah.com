<?

function anchor_back_to_user_if_logged(){

	if( is_userpanel() ){
		//
	
	} else if(! user_logged() ){
		//
	
	} else {
		return "<a target='_blank' href='"._URL."/userpanel' id='anchor_back_to_user_if_logged'>محیط کاربری</a>";
	}

}

