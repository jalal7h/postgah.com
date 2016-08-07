
jQuery(document).ready(function($) {
	
	$('#listmaker_list_pgItem_mg_form a[name="RejectAds"]').on('click', function(e){
		item_id = $(this).attr('href');
		cl(item_id);

		hitbox( '<form class="pgItem_mg_reject_hitbox" method="post" target="_hidden" action="./?do_action=pgItem_mg_reject&item_id='+item_id+'" onsubmit=" location.href=\'\';"><textarea name="text" placeholder="متن گزارش مشکل ..."></textarea><input class="submit_button" type="submit" value="ارسال"/></form>' , 480, 320 );

		e.preventDefault();
	});
	
});

