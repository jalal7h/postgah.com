<?

# jalal7h@gmail.com
# 2016/12/07
# 1.0

function setting_rw_slug_n_text(){

	foreach ( setting_rw() as $slug => $rw ){
		$r[ $slug ] = $rw['text'];
	}

	return $r;

}



