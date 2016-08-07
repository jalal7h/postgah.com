
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
})


