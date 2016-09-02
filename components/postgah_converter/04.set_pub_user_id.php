<?

$GLOBALS['converter_list'][] = 'set_pub_user_id';

function set_pub_user_id(){

	$limit = 5000;

	dbq_old(" ALTER TABLE `pub` ADD `user_id` INT NOT NULL AFTER `email` ");

	if(! $rs = dbq_old(" SELECT DISTINCT `email` FROM `pub` WHERE `user_id`='0' LIMIT $limit ") ){
		e(__FUNCTION__,__LINE__);

	} else if(! dbn($rs) ){
		echo "0 record with user_id of 0";

	} else {

		// echo dbn($rs); die();

		while( $rw = dbf($rs) ){
			
			$email = $rw['email'];

			$user_id = 0;
			if(! $rs_users = dbq(" SELECT `id` FROM `users` WHERE `username`='$email' LIMIT 1 ") ){
				e(__FUNCTION__,__LINE__,dbe() );
			
			} else if(! dbn($rs_users) ){
				e(__FUNCTION__,__LINE__);

			} else if(! $user_id = dbr($rs_users, 0, 0) ){
				e(__FUNCTION__,__LINE__);
			}
			
			if(! dbq_old(" UPDATE `pub` SET `user_id`='$user_id' WHERE `email`='$email' ") ){
				$_err++;
			
			} else {
				$_done+= mysql_affected_rows();
			}

		}
	}

	// if( $_done==0 ){
	// 	dbq_old(" DELETE FROM `pub` WHERE `user_id`='0' ");
	// }	

	$_remove = dbr( dbq_old(" SELECT COUNT(*) FROM `pub` WHERE `user_id`='0' "), 0, 0);

	echo "<hr>".intval($_done)." done , ".intval($_err)." error , ".$_remove." remained";

}


