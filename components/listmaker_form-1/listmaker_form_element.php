<?

# jalal7h@gmail.com
# 2016/06/08
# Version 1.2

function lmfe( $list ){
	return listmaker_form_element( $list );
}

function listmaker_form_element( $list, $comment=true ){

	if( $comment ){
		$c.= "\n\n<!----------------------- form maker element - start ----------------------->\n\n";
	}

	if(! is_array($list)){
		e(__FUNCTION__,__LINE__);

	} else foreach ( $list as $k => $list_this ) {
		
		$c.= "\n";
		
		#
		# string
		if( is_string($list_this) /*and (! strstr($list_this,':'))*/ ){
			$c.= $list_this;
		
		#
		# form element
		} else {
			$c.= listmaker_form_element_this( $list_this );
		}

		$c.= "\n";
	}

	if( $comment ){
		$c.= "\n<!----------------------- form maker element - end ----------------------->\n\n\n";
	}

	return $c;

}

