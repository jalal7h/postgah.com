
jQuery(document).ready(function($) {
	
	$('.pgItem_user_list .RenewAds').on('click', function(e){
		
		item_id = $(this).attr('href');
		content = $('.pgPlan_user_RenewAds_form_buffer[item_id="'+item_id+'"]').html();
		content = '<form target="_top" method="post" action="./?page=14&do=pgItem_user&do1=RenewAds&id='+item_id+'" class="ppuraf_form"><div class="head">انتخاب دوره تمدید آگهی ..</div>' + content + '<input type="submit" value="ثبت سفارش" class="submit_button pgiul_ra_sb_'+item_id+'" /></form>';

		hitbox( content, 440, 'auto' );
	
		e.preventDefault();
	});

});


