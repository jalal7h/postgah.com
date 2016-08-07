
jQuery(document).ready(function($) {
	
	$('.pgItem_user_list a[name="MakePremium"]').on('click', function(e){

		item_id = $(this).attr('href');
		content = $('.pgPlan_user_MakePremium_form_buffer[item_id="'+item_id+'"]').html();
		content = '<form target="_top" method="post" action="./?page=14&do=pgItem_user_list&do1=MakePremium&item_id='+item_id+'" class="ppugpftc_form"><div class="head">انتخاب پلن و مدت زمان ..</div>' + content + '<input type="submit" value="ثبت سفارش" class="submit_button pgiul_sb_'+item_id+'" /></form>';

		hitbox( content, 640, 'auto' );

		e.preventDefault();
	});

});


