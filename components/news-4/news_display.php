<?php

# taghipoor.meysam@gmail.com
# 2016/11/27
# 1.0

$GLOBALS['block_layers']['news_display'] = 'نمایش خبر';

function news_display( $rw_pagelayer ){
	
	# 
	# news display section
   
	if(! $rw1 = table( 'news', $_REQUEST['id'] ) ){
		$content.= convbox( __('there are no results.') );
	
	} else {
		
		# آبدیت تعداد  بازدید
		$visit = dbinc( 'news', $_REQUEST['id'], 'visit' );
		$image = $rw1['image']; 
		
		

		$content = '<section>
			<div class="news_display">
				<div class="news_display_head">
					<span class="news_display__cat"><a target="_blank" href="'._URL.'/?page=51&cat_id='.$rw1['cat'].'">'.cat_translate($rw1['cat']).'</a></span>
					<span class="news_display__date">'.UDate( $rw1['date_created'], 'text' ).'</span>
					<span class="news_display__visit">'.$visit." ".__('بازدید').'</span>
				</div>
				<div class="news_display_h1"><h1>'.$rw1['name'].'</h1></div>
				<div class="news_display_social">'.seo_share('24').'</div> 	
			</div>
			
			'.( $image ? '<div class="news_display_img"><img class="isss" src="'._URL.'/'.$image.'"></div>' : '').'

			<div class="news_display">
				<div class="text">'.$rw1['text'].'</div>
			</div>
		</section>'; 

		#
		# comment section
		$content.= fbcomment( 'news' , intval($_REQUEST['id']) );

	}

    echo $content;

}




