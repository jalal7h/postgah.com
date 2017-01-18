<?

# jalal7h@gmail.com
# 2017/01/07
# 1.0

function listmaker_list__add_to_begin_of_url( $url_string , $add_to_begin_of_url ){
	
	if(strstr($url_string, "?")){
		$url_string = explode("?", $url_string);
		$url_string[1] = $add_to_begin_of_url."&".$url_string[1]; // *
		$url_string = implode("?", $url_string);
		$url_string = str_replace("?&", "?", $url_string);
		$url_string = str_replace("&&", "&", $url_string);
	
	} else {
		$url_string.= "?".$add_to_begin_of_url;
	}

	return $url_string;

}



