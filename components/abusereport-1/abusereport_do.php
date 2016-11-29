<?

# jalal7h@gmail.com
# 2016/11/28
# 1.1

$GLOBALS['do_action'][] = 'abusereport_do';

function abusereport_do(){
	
	if(! $user_id = user_logged() ){
		$user_id = 0;
	}

	dbs( 'abusereport', [ 'table_name', 'table_id', 'cat_id', 'text', 'user_id'=>$user_id ] );

	?>
	<script>
		top.dehitbox_do();
	</script>
	<?

}

