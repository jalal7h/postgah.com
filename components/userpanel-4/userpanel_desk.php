<?

# jalal7h@gmail.com
# 2016/12/03
# 2.2

$GLOBALS['block_layers_center']['userpanel_desk'] = 'میز کاربری';

function userpanel_desk(){

	if( ! user_logged() ){
		user_logout('./login');
	}

	userpanel_fix_do();

	$res = false;

	echo "<div class='userpanel_desk'>";

	foreach( $GLOBALS['userpanel_item'] as $i => $array ){
		
		$func = $array[0];
		$name = $array[1];

		if( $func==$_REQUEST['do'] ){
			$res = call_user_func($func);
			break;
		}

	}
	
	?>
	<style type="text/css">
	.userpanel_menu {
		opacity: 1.0;
	}
	</style>
	<?
	
	echo "</div>";

	return $res;
	
}




