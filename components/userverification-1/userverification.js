
function time_enclock( s ){
	m = Math.floor( s / 60 );
	s = s % 60;
	if( s < 10 ){
		s = '0' + s;
	}
	return m + ':' + s;
}

function time_declock( t ){
	t = t.split(':');
	m = parseInt( t[0] );
	s = parseInt( t[1] );
	s+= m * 60;
	return s;
}


