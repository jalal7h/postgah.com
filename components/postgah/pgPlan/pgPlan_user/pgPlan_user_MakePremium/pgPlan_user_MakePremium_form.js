
jQuery(document).ready(function($) {
	
	// form e make premium	
	$('.pgItem_user_list .MakePremium').on('click', function(e){

		item_id = $(this).attr('href');
		content = $('.pgPlan_user_MakePremium_form_buffer[item_id="'+item_id+'"]').html();
		content = '<form target="_top" method="post" action="./?page=14&do=pgItem_user&do1=MakePremium&id='+item_id+'" class="ppugpftc_form"><div class="head">انتخاب پلن و مدت زمان ..</div>' + content + '<input type="submit" value="ثبت سفارش" class="submit_button pgiul_sb_'+item_id+'" /></form>';

		hitbox( content, 640, 'auto', 'pgPlan_user_MakePremium_form_hitbox' );

		e.preventDefault();
	});



	$("body").delegate( '.ppugpftc_form .plan_wrapper', 'click', function(){

		if(! $(this).hasClass('selectedPlan') ){

			$('.ppugpftc_form .plan_wrapper').removeClass('selectedPlan');
			$(this).addClass('selectedPlan');

			$('.ppugpftc_form .plan_wrapper select').prop({
				'disabled': true,
			});
			$(this).find('select').attr({
				'disabled': false,
			});

		}


	});

});


