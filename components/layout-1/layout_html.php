<?php

# jalal7h@gmail.com
# 2017/01/18
# 1.2

function layout_open(){


	#
	# its 404 page
	if( d404_flag === true ){
		$vars['meta_title'] = _DOMAIN.' - Page Not Found !';
		$vars['meta_kw'] = '';
		$vars['meta_desc'] = '';
	
	} else {


		$vars['meta_title'] = setting('main_title');

		#
		# rw of the page
		$rw = table( 'page', _PAGE );


		#
		# meta func
		$func_meta = "meta_"._PAGE;
		if( function_exists( $func_meta ) ){
			$rw_meta = $func_meta();
		}


		#
		# title
		// it have an special title
		if( $rw['meta_title'] ){
			$rw['meta_title'] = stripcslashes($rw['meta_title']);
			ob_start();
			eval("?>".$rw['meta_title']."<?");
			$vars['meta_title'] = ob_get_contents();
			ob_end_clean();

		// meta func
		} else if( $rw_meta ){
			$vars['meta_title'] = $rw_meta['title'];

		// its a normal page with no special title
		} else {
			$vars['meta_title'] = setting('main_title');
			if( $rw['id']!=1 and $rw['name'] ){
				if( lang_dir === "rtl" ){
					$vars['meta_title'].= "، ".$rw['name'];
				} else {
					$vars['meta_title'].= ", ".$rw['name'];					
				}
			}
		}
		

		#
		# kw
		// special
		if( $rw['meta_kw'] ){
			$rw['meta_kw'] = stripcslashes($rw['meta_kw']);
			ob_start();
			eval("?>".$rw['meta_kw']."<?");
			$vars['meta_kw'] = ob_get_contents();
			ob_end_clean();
		
		// meta func
		} else if( $rw_meta ){
			$vars['meta_kw'] = $rw_meta['kw'];
		
		// normal page
		} else {
			$vars['meta_kw'] = str_replace("،",",",setting("keywords"));
		}
		

		#
		# desc
		// special
		if($rw['meta_desc']){
			$rw['meta_desc'] = stripcslashes($rw['meta_desc']);
			ob_start();
			eval("?>".$rw['meta_desc']."<?");
			$vars['meta_desc'] = ob_get_contents();
			ob_end_clean();
		
		// meta func
		} else if( $rw_meta ){
			$vars['meta_desc'] = $rw_meta['desc'];
		
		// normal page
		} else {
			$vars['meta_desc'] = str_replace("،",",",setting("websitedescription"));
		}

	}

	#
	# clean up the vars
	$vars['meta_title'] = var_control( $vars['meta_title'], 'a-zA-Z0-9,\.\-\_آ-ی ');
	$vars['meta_kw'] = var_control( $vars['meta_kw'], 'a-zA-Z0-9,\.\-\_آ-ی ');
	$vars['meta_desc'] = var_control( $vars['meta_desc'], 'a-zA-Z0-9,\.\-\_آ-ی ');

	#
	# return it.
	return template_engine('html-tag-open',$vars);

}


// $GLOBALS['block_layers']['layout_header'] = 'سرایند سایت';
function layout_header(){

	$vars['THEME']=_THEME;
	return template_engine('header',$vars);
	
}


// $GLOBALS['block_layers']['layout_footer'] = 'پسایند سایت';
function layout_footer(){
	return template_engine( 'footer' );
}


function layout_copyright(){
	return template_engine('copyright',$vars);
}


function layout_close(){
	return template_engine('html-tag-close',$vars);
}






