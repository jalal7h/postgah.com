<?

# jalal7h@gmail.com
# 2017/05/04
# 1.1

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
			$class = 'fa-facebook-square';
			$class_title = 'Facebook';

		} else if( strstr($link_pattern, "http://twitter.com/" ) ){
			$class = 'fa-twitter-square';
			$class_title = 'Twitter';
			
		} else if( strstr($link_pattern, "http://instagram.com/" ) ){
			$class = 'fa-instagram';
			$class_title = 'Instagram';
			
		} else if( strstr($link_pattern, "http://youtube.com/" ) ){
			$class = 'fa-youtube-square';
			$class_title = 'Youtube';
			
		} else if( strstr($link_pattern, "http://pinterest.com/" ) ){
			$class = 'fa-pinterest-square';
			$class_title = 'Pinterest';
			
		} else if( strstr($link_pattern, "http://linkedin.com/" ) ){
			$class = 'fa-linkedin-square';
			$class_title = 'LinkedIn';
			
		} else if( strstr($link_pattern, "http://plus.google.com/" ) ){
			$class = 'fa-google-plus-square';
			$class_title = 'Google Plus';

		// } else if( strstr( $link , 'sitemap' ) ){
		// 	$class = 'fa-sitemap';
		// 	$class_title = 'Sitemap';

		// } else if( strstr( $link , 'rss' ) ){
		// 	$class = 'fa-rss-square';
		// 	$class_title = 'RSS';

		} else if( strstr( $link , 'aparat.com' ) ){
			$class = 'social-aparat';
			$class_title = 'Aparat';

		} else {
			continue;
		}

		$c.= "\t<li><a href=\"".$link."\" class=\"cl_l1_hover\" title=\"".$class_title."\" target=\"_blank\"><i class=\"fa ".$class."\"></i></a></li>\n";

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

