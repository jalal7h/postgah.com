<?

# jalal7h@gmail.com
# 2017/01/21
# 1.1

add_headtag( 'include_all_css_echotags', 0 );

function include_all_css_echotags(){

	return '<link href="'._URL.'/styles'.($_REQUEST['page']=='admin' ? '-admin' : '').'.css" rel="stylesheet" type="text/css" />';
	
}

