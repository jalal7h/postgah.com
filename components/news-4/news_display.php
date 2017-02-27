<?php

# taghipoor.meysam@gmail.com
# 2017/01/29
# 1.1

add_layer( 'news_display', 'نمایش خبر' );

function news_display( $rw_pagelayer ){
	
	# 
	# news display section
   
	if(! $rw = table( 'news', $_REQUEST['id'] ) ){
		d404();
	
	} else if( $rw['flag'] == 0 ){
		d404();

	} else {
		
		# آبدیت تعداد  بازدید
		$visit = dbinc( 'news', $_REQUEST['id'], 'visit' );
		$image = $rw['image']; 
		
		$content = '
		<section class="news_display_section">
			<div class="news_display">
				<div class="news_display_head">
					<span class="news_display__cat"><a target="_blank" href="'._URL.'/?page=51&cat_id='.$rw['cat'].'">'.cat_translate($rw['cat']).'</a></span>
					<span class="news_display__date">'.UDate( $rw['date_created'], 'text' ).'</span>
					<span class="news_display__visit">'.$visit." ".__('بازدید').'</span>
				</div>
				<div class="news_display_h1"><h1>'.$rw['name'].'</h1></div>
				<div class="news_display_social">'.seo_share('24').'</div> 	
			</div>
			
			'.( $image ? '<div class="news_display_img"><img class="isss" src="'._URL.'/'.$image.'"></div>' : '').'

			<div class="news_display">
				<div class="text">'.$rw['text'].'</div>
			</div>
		</section>'; 

		#
		# comment section
		if( news_fbcomment_flag === true ){
			$content.= fbcomment( 'news' , intval($_REQUEST['id']) );
		}

	}

    echo $content;

}




