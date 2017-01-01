<?

# jalal7h@gmail.com
# 2017/01/01
# 1.2

function canonical_tag(){

	if(! $link = canonical_link() ){
		return '';
	
	} else {
		return '<link rel="canonical" href="'.$link.'" />';
	}
	
}

