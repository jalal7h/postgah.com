
jQuery(document).ready(function($) {
	$('#listmaker_list_billing_invoice_form .tools-td a.linkToFA[name="approve"]').on('click', function(e){
		if(! confirm( $(this).attr('text_readytoremove') ) ){
			e.preventDefault();
			return false;
		}
	});
});