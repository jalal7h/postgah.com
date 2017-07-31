
jQuery(document).ready(function($) {


	var ccf_elem = $('.ccf_displayFilters .cat .element');
	if( ccf_elem.length ){
		ccf_elem.each(function(index, el) {
			ts = $(this);
			mr = ts.find('.more');

			mh = parseInt( ts.css('max-height') )
			ts.css({'max-height':'none'});
			
			ht = ts.height();
			
			if( ts.hasClass('any_checked') ){
				cl('ckd')
				mr.hide()
				ts.css({'max-height':'none'});
			} else if( ht > mh + 10 ){ // its big
				cl('big')
				ts.css({'max-height':mh+'px'});
			} else { // does not need more button
				cl('sml')
				mr.hide()
				ts.css({'max-height':'none'});
			}
			
		});
	}

	ccf_elem.find('.more').on('click',function(e){
		
		mr = $(this);
		ts = mr.parent();
		mr.hide();

		mh = parseInt( ts.css('max-height') );
		ts.css({'max-height':'none'});

		e.preventDefault();
	});


});


