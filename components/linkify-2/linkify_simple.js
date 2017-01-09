/*index*/

jQuery(document).ready(function($) {

	lang_dir = $('.linkify_simple').attr('lang_dir');

	$('.linkify_simple .sub_w').each(function(index, el) {

		sw = $(this);
		dv = sw.parent();
		ln = dv.find('>a');

		$('.linkify_simple .sub_w').addClass('show');

		if( dv.hasClass('master') ){
			ln_height = ln.outerHeight();
			sw.css({ 'top' : ln_height });

		} else {
			ln_width = ln.outerWidth();
			if( lang_dir == 'ltr' ){
				// cl( lang_dir + ln_width);
				sw.css({ 'left' : ln_width });
			} else {
				sw.css({ 'right' : ln_width });
			}
		}

		$('.linkify_simple .sub_w').removeClass('show');

	});

});

