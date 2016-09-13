
// 2016/09/12




/** * ** * ** * ** * ** * ** * ** * **/
var slidy_disable_height_change = true;
/** * ** * ** * ** * ** * ** * ** * **/





var slidy_i0 = 0;
var max_slidy_height = 0;
var slidy_handy_change = 0;

function do_set_slide(){
jQuery(document).ready(function($) {

	var slidy_width = $('.slidy > .main').width();

	if( disable_auto_flag==0 || slidy_handy_change==1 ){
		
		$('.slidy > .main > img').css({'opacity':'0.0'});
		$('.slidy > .main > img').css({'z-index':'1'});

		$('.slidy > .main > img:nth-child('+slidy_i0+')').css({'z-index':'2'});
		$('.slidy > .main > img:nth-child('+slidy_i0+')').css({'opacity':'1.0'});

		var this_width = $('.slidy > .main > img:nth-child('+slidy_i0+')').attr('width');
		var this_height = $('.slidy > .main > img:nth-child('+slidy_i0+')').attr('height');
		var slidy_height = this_height * slidy_width / this_width;

		if( slidy_disable_height_change == true ){
			if( slidy_height > max_slidy_height ){
				max_slidy_height = slidy_height;
			} else {
				slidy_height = max_slidy_height;
			}
		}

		$('.slidy > .main').css({'height':slidy_height});			

		slidy_i0 = (slidy_i0%size0);
		slidy_i0++;
	}

});
}


jQuery(document).ready(function($) {
	
	size0 = $('.slidy > .main > img').size();
	slidy_i0 = 1;
	disable_auto_flag = 0;
	
	setInterval( "do_set_slide()", 4000 );
	do_set_slide();

	$('.slidy').on('mouseenter', function(){
		disable_auto_flag = 1;
	
	}).on('mouseleave', function(){
		disable_auto_flag = 0;
	});

});


//
// tumb
jQuery(document).ready(function($) {
	$('.slidy > .tumb > img').on('click', function(){
		numb = $(this).attr('numb');
		slidy_i0 = numb;
		slidy_handy_change = 1;
		do_set_slide();
		slidy_handy_change = 0;
	});
});







