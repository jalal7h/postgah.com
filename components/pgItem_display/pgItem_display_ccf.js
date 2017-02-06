
jQuery(document).ready(function($) {
	$('.pgItem_display_ccf .re .value .checkbox').each(function(index, el) {
		t = $(this);
		tml = parseInt(t.css('margin-left'))
		tmr = parseInt(t.css('margin-right'))
		mw = parseInt( t.css('min-width') )
		wd = t.outerWidth()

		cl( wd + ' / ' + mw )
		if( wd > mw ){
			wd = Math.ceil(wd / mw);
			wd*= ( mw + tml + tmr )
			wd-= ( tml + tmr )
			cl( wd );
			t.width(wd)
		}
	});
});

