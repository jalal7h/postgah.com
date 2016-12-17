<?

# jalal7h@gmail.com
# 2016/11/28
# 1.1

$GLOBALS['do_action'][] = 'abusereport_do';

function abusereport_do(){
	
	if(! $user_id = user_logged() ){
		$user_id = 0;
	}

	if(! $id = dbs( 'abusereport', [ 'table_name', 'table_id', 'cat_id', 'text', 'user_id'=>$user_id ] ) ){
		ed();

	} else if( $user_id > 0 ){

		if( $lmtc = lmtc($_REQUEST['table_name']) ){
			$vars['item_title'] = $lmtc[0];
		} else {
			$vars['item_title'] = __('آیتم');
		}
		$vars['item_name'] = table( $_REQUEST['table_name'], $_REQUEST['table_id'], 'name' );
		$vars['item_id'] = $_REQUEST['table_id'];

		$func = $_REQUEST['table_name']."_link";
		if( function_exists($func) ){
			$vars['item_link'] = $func( $_REQUEST['table_id'] );
		}

		$vars['abusereport_adminlink'] = abusereport_adminLink( $id );

		texty( 'abusereport_do', $vars, $user_id );

	}

	?>
	<script>
		top.dehitbox_do();
	</script>
	<?

}

