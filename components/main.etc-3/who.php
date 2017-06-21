<?php

# jalal7h@gmail.com
# 2017/06/15
# 1.0

function who_logged(){

	if( is_admin() ){
		return admin_logged();

	} else {
		return user_logged();
	}

}

