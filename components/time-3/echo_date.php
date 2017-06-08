<?

# jalal7h@gmail.com
# 2017/06/09
# 1.1

add_action('echo_date');

function echo_date(){

	$date = U();

	echo $date;
	echo "<br>";

	echo date( 'Y/m/d H:i:s', $date );
	echo "<br>";

	echo substr( UDate($date), 0, 19 );

}





