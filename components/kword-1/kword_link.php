<?

# jalal7h@gmail.com
# 2017/01/02
# 1.0

function kword_link( $tag ){

	if(! $tag = strip_tags($tag) ){
		return false;
	
	} else if(! $tag = trim($tag) ){
		return false;
	
	} else {
		return _URL."/tag/".$tag;
	}

}
