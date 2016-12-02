
jQuery(document).ready(function($) {
	
	// size fix for info box
	setTimeout( function(){

		$('.ticketbox_mg_view .post .text').each(function() {
			
			tx = $(this);
			nf = $(this).parent().find('.info');

			tx_height = tx.height();
			tx_padding = parseInt( tx.css('padding-top') ) + parseInt( tx.css('padding-bottom') );
			tx_all = tx_height + tx_padding;

			nf_height = nf.height();
			nf_padding = parseInt( nf.css('padding-top') ) + parseInt( nf.css('padding-bottom') );;
			nf_all = nf_height + nf_padding;

			if( tx_all > nf_all ){
				nf.height( tx_all - nf_padding );
			}
			
			cl( tx_height + ' > ' + nf_height );

		});

	},100);

});

