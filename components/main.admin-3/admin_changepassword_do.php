<?

# jalal7h@gmail.com
# 2016/10/23
# 1.0

$GLOBALS['do_action'][] = 'admin_changepassword_do';

function admin_changepassword_do(){
	
	if(! $user_id = admin_logged() ){
		ed(__FUNCTION__,__LINE__);
	
	} else if(! $rw_user = table('user', $user_id) ){
		ed(__FUNCTION__,__LINE__);
	}

	#
	# info
	dbs( 'user', ['username','name','cell'], ['id'=>$user_id] );

	#
	# password
	if(! $password = trim($_REQUEST['password']) ){
		e(__FUNCTION__,__LINE__);

	} else if( $password != '************' ){
		if( is_component('userhashpassword') ){
			$password = userhashpassword($password);
		}
		dbs( 'user', ['password'=>$password], ['id'=>$user_id] );
	}


	?>
	<script type="text/javascript">
		top.dehitbox_do();
	</script>
	<?

}



