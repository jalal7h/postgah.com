<?

$GLOBALS['converter_list'][] = 'fix_n_trim_pub_emails';

function fix_n_trim_pub_emails(){

	if(! $rs = dbq_old(" SELECT `id`,`email` FROM `pub` ") ){
		e(__FUNCTION__,__LINE__);

	} else while( $rw = dbf($rs) ){
		
		$id = $rw['id'];

		$email = $rw['email'];
		$email = mb_ereg_replace('[^A-Za-z0-9@._-]+','',$email);
		$email = trim($email);
		
		if(! $email ){
			dbq_old(" DELETE FROM `pub` WHERE `id`='$id' LIMIT 1 ");
			$_remove++;
			continue;

		} else if(! dbq_old(" UPDATE `pub` SET `email`='$email' WHERE `id`='$id' LIMIT 1 ") ){
			$_err++;
		} else {
			$_done++;
		}
		
		
	}

	echo "<hr>".intval($_done)." done , ".intval($_err)." error , ".intval($_remove)." remove";

}


