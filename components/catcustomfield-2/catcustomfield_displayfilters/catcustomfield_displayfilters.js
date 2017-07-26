
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


	// // click on checkbox
	// if( typeof ccf_main_cat_id !== 'undefined' && ccf_main_cat_id ){

	// 	$('.option_container > input[type="checkbox"]').on('change', function(){
						
	// 		var elem_name = $(this).attr('name');
	// 		var elem_value = $(this).prop("checked") ? 1 : 0;
	// 		var the_url = _URL + "/?page=" + _PAGE + '&cat_id=' + ccf_main_cat_id;

	// 		// $('.option_container > input[type="checkbox"]').each(function(i){
	// 		// 	var each_elem_name = $(this).attr('name');
	// 		// 	var each_elem_value = $(this).prop("checked") ? 1 : 0;
	// 		// 	if( each_elem_value==1 ){
	// 		// 		the_url = the_url + '&' + each_elem_name + '=' + each_elem_value;
	// 		// 	}
	// 		// });

	// 		$('[rrqs="1"]').each(function(i){
	// 			var each_elem_name = $(this).attr('name');
	// 			var each_elem_value = $(this).prop("checked") ? 1 : 0;
	// 			if( each_elem_value==1 ){
	// 				the_url = the_url + '&' + each_elem_name + '=' + each_elem_value;
	// 			}
	// 		});

	// 		location.href = the_url;

	// 	});

	// }


});


