// 2017/01/20

jQuery(document).ready(function($) {
	
	$("body").delegate('.lmfo remove', 'click', function(e) {

		cl( $(this) );

		prv = $(this).prev()
		pnt = prv.parent();
		pntt = pnt.parent();
		
		prv.val('');
		prv.attr('value','');

		if(  pnt.hasClass('lmfe_inDiv')  ||  pnt.hasClass('lmfe_more')  ){
			pnt.hide();
			// pnt.remove();

		} else if( pntt.hasClass('lmfe_more') ){
			pntt.hide();
			
		} else {
			prv.hide();
			// pnt.remove();
		}

		e.preventDefault();
		return false;

	})

});

