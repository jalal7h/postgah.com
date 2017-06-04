
var lml_intoolstd = "";

$(document).ready(function(){
	//
	// mouse over effect on TR
	$('.tools-td').on("mouseenter", function(){
		lml_intoolstd = "in";
		// cl(lml_intoolstd);
	});
	$('.tools-td').on("mouseleave", function(){
		lml_intoolstd = "out";
		// cl(lml_intoolstd);
	});

	// allow links in td,th to be clicked.
	$('.listmaker_list td a , .listmaker_list th a').on('click', function(){
		cl( 'kk');
		lml_intoolstd = 'in';
		setTimeout( function(){
			lml_intoolstd = 'out';
		} , 500 );
	});
	
})


