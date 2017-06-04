<?

function breadcrumb_52(){
	
	$links[] = "<a href=\"".layout_link(51)."\">".__('اخبار سایت')."</a>";

	if(! $news_id = $_REQUEST['id'] ){
		//

	} else if(! $rw_news = table('news', $news_id) ){
		//

	} else {
		$links[] = "<a href=\"".news_link($rw_news)."\">".$rw_news['name']."</a>";
	}
	
	return implode('', $links);

}
