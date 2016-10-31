<?

# jalal7h@gmail.com
# 2016/10/27
# 1.0

function delete_all_between( $text, $start, $end ){

	$start = str_replace( ['/','*'], ['\/','\*'], $start);
	$end = str_replace( ['/','*'], ['\/','\*'], $end);

	return preg_replace('/'.$start.'[\s\S]+?'.$end.'/', '', $text);

}
