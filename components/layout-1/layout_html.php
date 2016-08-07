<?php


function layout_open(){

	$vars['meta_title'] = tab__temp('main_title');

	#
	# rw of the page
	$rw = table( 'page', _PAGE );

	#
	# title
	// it have an special title
	if( $rw['meta_title'] ){
		ob_start();
		eval("?>".$rw['meta_title']."<?");
		$vars['meta_title'] = ob_get_contents();
		ob_end_clean();
	
	// its a normal page with no special title
	} else {
		$vars['meta_title'] = tab__temp('main_title');
		if( $rw['id']!=1 and $rw['name'] ){
			$vars['meta_title'].="، ".$rw['name'];
		}
	}
	
	#
	# kw
	if($rw['meta_kw']){ // it have an special title
		ob_start();
		eval("?>".$rw['meta_kw']."<?");
		$vars['meta_kw'] = ob_get_contents();
		ob_end_clean();
	} else {
		// its a normal page with no special title
		$vars['meta_kw'] = str_replace("،",",",tab__temp("keywords"));
	}
	
	#
	# desc
	if($rw['meta_desc']){ // it have an special title
		ob_start();
		eval("?>".$rw['meta_desc']."<?");
		$vars['meta_desc'] = ob_get_contents();
		ob_end_clean();
	} else {
		// its a normal page with no special title
		$vars['meta_desc'] = str_replace("،",",",tab__temp("websitedescription"));
	}

	return template_engine('html-tag-open',$vars);
}


$GLOBALS['block_layers']['layout_header'] = 'سرایند سایت';
function layout_header(){
	
	$dates=U2Vaght(U());
	$dates=Vaght_2_Taghvim($dates);
	$dates=explode('&nbsp;',$dates);
	$vars['date']=$dates[1]." <span dir=rtl lang=fa>".str_replace('.','/',substr(U2Vaght(U()),2,8))."</span>";
	$vars['THEME']=_THEME;
	
	return template_engine('header',$vars);
}


$GLOBALS['block_layers']['layout_footer'] = 'پسایند سایت';
function layout_footer(){
	return template_engine( 'footer' );
}


function layout_copyright(){
	return template_engine('copyright',$vars);
}


function layout_close(){
	return template_engine('html-tag-close',$vars);
}






