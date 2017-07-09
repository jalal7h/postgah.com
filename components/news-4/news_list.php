<?php

# jalal7h@gmail.com
# 2017/05/31
# 1.0

add_layer( 'news_list', 'لیست خبر‌ها', 'center', $repeat='1' );

function news_list( $rw_pagelayer ){
	
	$where_set = [ 'flag' => 1 ];

	$tdd = 7;
	$p = intval($_REQUEST['p']);
	$stt = $p * $tdd;

	if(! $news_list = table( 'news', $where_set, [ 'date_created' => 'desc' ], "$stt,$tdd" ) ){
		$content = convbox( __('خبری نیست!') );

	} else {

		foreach( $news_list as $i => $news ){
			
			$news['link'] = news_link( $news );
			if( $news['image'] ){
				$news['image'] = _URL . '/' . $news['image'];
			}
			$news['cat'] = cat_translate( $news['cat'] );
			$news['date'] = UDate( $news['date_created'], 'text' );
			$news['social'] = seo_share( '24' , news_link($news) );

			$news_list[$i] = (object) $news;

		}

		$paging = listmaker_paging( " SELECT * FROM `news` WHERE `flag`='1' " , _URL.'/news/%%' , $tdd );

		$content = template_engine( 'news_list', [ 'news_list'=>$news_list, 'paging'=>$paging ] );

	}

	$title = $rw_pagelayer['name'];
    layout_post_box( $title , $content, $allow_eval=false, $framed=true, $position="center" );

}

