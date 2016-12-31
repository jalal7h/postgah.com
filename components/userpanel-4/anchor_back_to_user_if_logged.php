<?

# jalal7h@gmail.com
# 2016/12/31
# 1.0

function anchor_back_to_user_if_logged(){

	if( is_userpanel() ){
		//
	
	} else if(! user_logged() ){
		//
	
	} else {
		return "<a target='_blank' href='".layout_link(14)."' id='anchor_back_to_user_if_logged'>".__('محیط کاربری')."</a>";
	}

}

