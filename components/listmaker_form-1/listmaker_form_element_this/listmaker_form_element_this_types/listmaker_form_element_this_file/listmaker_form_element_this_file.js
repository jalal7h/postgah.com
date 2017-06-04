
// 2016/05/21

function lmff_div_select( elem ) {
	var elem_input = $(elem).parent().find('.lmff_file');
	$(elem_input).trigger('click');
}

jQuery(document).ready(function($) {
	
	$("body").delegate( 'label.lmfe_fileDiv input[type="file"]', 'change', function() {

		cl('s');
		lmfetfp = $(this).parent().parent().find('div.lmfetfp');
		lmfetfp.show();

		var extn = $(this).val().substr( $(this).val().lastIndexOf(".")+1 );
		extn = extn.substr(0,3);

		lmfetfp.html( extn );
	});
	
});


