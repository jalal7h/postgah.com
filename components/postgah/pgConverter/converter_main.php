<?

$GLOBALS['do_action'][] = 'converter_main';

## CONFIG ## # ##
define( 'mysql_database_old', 'postgah_tmp00' );
define( 'image_dir_old', 'img/' );
define( 'image_dir_new', 'data/item_image/old/' );
## # ## # ## # ##

function converter_main(){
	
	?>
	<style>
	a ,
	a:visited {
		text-decoration: none;
		padding: 10px;
		display: inline-block;
		border-radius: 5px;
		color: royalblue;
	}
	a:hover {
		background-color: #eee;
	}
	</style>
	<?

	echo "convert &nbsp; &nbsp; ".mysql_database_old."&nbsp; &nbsp;  => &nbsp; &nbsp; ".mysql_database."<hr>";

	ksort($GLOBALS['converter_list']);

	$anchor_arr[] = "<a href=\"./?do_action=".$_REQUEST['do_action']."\" >home</a>";

	foreach( $GLOBALS['converter_list'] as $i => $func ){
		$anchor_arr[] = "<a ".($_REQUEST['func']==$func ? 'style="color: red"' : '')." href=\"./?do_action=".$_REQUEST['do_action']."&func=$func\" >".str_replace('_', ' ', $func)."</a>";
	}
	echo implode(' , ', $anchor_arr);
	echo "<hr>";

	if( $func = $_REQUEST['func'] ){
		$func();
	}


}



