<?php

# jalal7h@gmail.com
# 2017/05/21
# 1.0

add_action('ticketbox_mg_widget_waitingTickets_ajax');

function ticketbox_mg_widget_waitingTickets_ajax(){
	
	$limit = 10;

	if(! is_adminUser() ){
		ed();
	
	} else if(! $rs = dbq(" SELECT * FROM `ticketbox` WHERE 1 ORDER BY `date_updated` DESC, `date_created` DESC, `id` DESC LIMIT $limit ") ){
		e();

	} else if(! dbn($rs) ){
		echo __('هنوز تیکتی ثبت نشده است.');

	} else while( $rw = dbf($rs) ){
		?><a href="<?=ticketbox_mg_link($rw)?>" target="_blank"><?=$rw['name']?> - <span class="time"><?=time_inword($rw['date_updated'])?></span></a><?
	}

}

