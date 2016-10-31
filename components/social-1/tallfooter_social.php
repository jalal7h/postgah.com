<?

# jalal7h@gmail.com
# 2016/10/31
# 1.0

$GLOBALS['tallfooter_element']['social'] = 'جامعه مجازی';

function tallfooter_social( $rw_tf ){

	if(! $links = $rw_tf['content'] ){
		e();

	} else if(! $links = explode("\r\n", $links) ){
		e();

	} else foreach( $links as $i => $link ){

		if(! $link = trim($link) ){
			continue;
		}

		$link_pattern = $link;
		$link_pattern = strtolower($link_pattern);
		$link_pattern = str_replace( "www.", "", $link_pattern );
		$link_pattern = str_replace( "https://", "http://", $link_pattern );

		if( strstr($link_pattern, "http://facebook.com/" ) ){
			$class = 'facebook';

		} else if( strstr($link_pattern, "http://twitter.com/" ) ){
			$class = 'twitter';
			
		} else if( strstr($link_pattern, "http://instagram.com/" ) ){
			$class = 'instagram';
			
		} else if( strstr($link_pattern, "http://youtube.com/" ) ){
			$class = 'youtube';
			
		} else if( strstr($link_pattern, "http://pinterest.com/" ) ){
			$class = 'pinterest';
			
		} else if( strstr($link_pattern, "http://linkedin.com/" ) ){
			$class = 'linkedin';
			
		} else if( strstr($link_pattern, "http://plus.google.com/" ) ){
			$class = 'google-plus';

		} else {
			continue;
		}

		$class_title = $class;
		$class_title = str_replace("-", " ", $class_title);
		$class_title = ucfirst($class_title);

		$c.= "\t<li><a href=\"".$link."\" title=\"".$class_title."\" target=\"_blank\"><i class=\"fa fa-".$class.( $class=='instagram' ? '' : '-square' )."\"></i></a></li>\n";

	}
	// die();


	if( $c != '' ){
		$c = "\n\n<ul class=\"".__FUNCTION__."\">\n" . $c . "</ul>\n";
	}
	
	if( $c != '' ){
		$grid = $rw_tf['grid'] ? " grid".$rw_tf['grid'] : "";
		$c = "<div class=\"this".$grid." ".$rw_tf['type']."\" >" . $c . "</div>";
	}

	return $c;

}

