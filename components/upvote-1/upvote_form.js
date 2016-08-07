
function upvote_do( x ){
	numb = $( x ).find('div').html();
	if( isNaN(numb)){
		numb = 0;
		console.log('NuN');
	}
	rel = $( x ).attr('rel');
	if( $( x ).hasClass('clicked') ) {
		console.log( 'it has the class, now it have not ');
		numb--;
		if( numb==0 ){
			numb = "رای مثبت";
		}
		wget('./', '', 'do_action=upvote_do&table='+rel+'&do=down');
	} else {
		console.log( 'it has not the class, now it have ');			
		numb++;
		wget('./', '', 'do_action=upvote_do&table='+rel+'&do=up');
	}
	$( x ).find('div').html( numb );
	$( x ).toggleClass('clicked');
}


