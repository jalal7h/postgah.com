<?

function seo_share_link( $link , $title="" ){

	$c.= "
	<div class='seo_share_link'>
		<a href='http://www.facebook.com/sharer/sharer.php?u=".urlencode($link)."' target='_blank' class='facebook' ><icon></icon></a>
		<a href='http://twitter.com/share?url=".$link."' target='_blank' class='twitter' ><icon></icon></a>
		<a href='http://plus.google.com/share?url=".$link."' target='_blank' class='googleplus' ><icon></icon></a>
		<a href='https://pinterest.com/pin/create/button/?url=&media=".urlencode($link)."&description=".urlencode($title)."' target='_blank' class='pinterest' ><icon></icon></a>
		<a href='https://www.linkedin.com/shareArticle?mini=true&url=".urlencode($link)."&title=".urlencode($title)."&summary=&source=' target='_blank' class='linkedin' ><icon></icon></a>
	</div>
	";
	
	return $c;
}