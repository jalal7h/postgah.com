<?

# jalal7h@gmail.com
# 2016/08/23
# 1.0

// social_links( $url, $text, $socials="facebook,tw,tu", $head="");

/*README*/

function social_links( $url, $text, $socials="", $head="" ){
	
	if( $socials=='' ){
		$socials = 'google,facebook,twitter,linkedin,tumblr,reddit';
	}
	$socials = ",".$socials.",";


	$url = urlencode($url);
	
	$c.= "<div class=\"social_links\">\n";
	
	if( $head ){
		$c.= "<span class=\"head\">".$head."</span>\n";
	}

	if( strstr($socials, 'google') or strstr($socials, ',go,') ){
		$c.= '<a target="_blank" href="https://plus.google.com/share?url='.$url.'" class="google"></a>';
	}

	if( strstr($socials, 'facebook') or strstr($socials, ',fa,') ){
		$c.= '<a target="_blank" href="http://facebook.com/share.php?u='.$url.'" class="facebook"></a>';
	}

	if( strstr($socials, 'twitter') or strstr($socials, ',tw,') ){
		$c.= '<a target="_blank" href="https://twitter.com/share?url='.$url.'&text='.$text.'" class="twitter"></a>';
	}

	if( strstr($socials, 'linkedin') or strstr($socials, ',li,') ){
		$c.= '<a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url='.$url.'&title='.$text.'&summary=&source=" class="linkedin"></a>';
	}

	if( strstr($socials, 'tumblr') or strstr($socials, ',tu,') ){
		$c.= '<a target="_blank" href="http://www.tumblr.com/share/link?url='.$url.'" class="tumblr"></a>';
	}

	if( strstr($socials, 'reddit') or strstr($socials, ',re,') ){
		$c.= '<a target="_blank" href="http://reddit.com/submit?url='.$url.'" class="reddit"></a>';
	}

	$c.= "</div>\n";

	return $c;
}

