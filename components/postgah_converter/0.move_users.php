<?

$GLOBALS['converter_list'][] = 'move_users';

function move_users(){



	$limit = 50000;



	dbq_old(" ALTER TABLE `users` ADD `converter` INT(1) NOT NULL AFTER `oldUser` ");
	echo "<hr>";
	
	#
	# move users to users
	if(! $rs = dbq_old(" SELECT * FROM `users` WHERE `converter`='0' LIMIT $limit ") ){
		e(__FUNCTION__,__LINE__,dbe());
	
	} else if(! dbn($rs) ){
		echo "no record to move";
	
	} else while( $rw = dbf($rs) ){
		
		#
		# remove '		
		foreach( $rw as $i => $v ){
			$rw[ $i ] = str_replace("'", "\'", $rw[ $i ]);
		}

		$username_arr[] = $rw['username'];
		
		#
		# credit
		$rs_credit = dbq_old(" SELECT sum(`pay_value`) FROM `epay` WHERE 1 AND `pay_from`='".$rw['username']."' AND `active`='1' ");
		$credit = dbr($rs_credit,0,0);
		$credit-= $rw['pay_archive'];
		if( $credit < 0 ){
			$credit = 0;
		}

		# 
		# trim vars
		foreach( $rw as $i => $v ){
			$rw[ $i ] = trim( $rw[ $i ] );
		}

		$rw['username'] = mb_ereg_replace('[^A-Za-z0-9@._-]+','',$rw['username']);

		#
		# address
		$address = null;
		if( $rw['position'] ){
			$address[] = $rw['position'];
		}
		if( $rw['address'] ){
			$address[] = $rw['address'];
		}
		if( sizeof($address) ){
			$address = implode('، ', $address);
			$address = mysql_real_escape_string($address);
		}

		#
		# insert
		if(! dbq(" INSERT INTO `users` (`username`,`password`,`name`,`tell`,`cell`,`wallet_credit`,`address`) VALUES 
			('".$rw['username']."',
			'".$rw['password']."',
			'".$rw['name']."',
			'".$rw['phone_number']."',
			'".$rw['mobile_number']."',
			'$credit',
			'$address') ") ){
			e( __FUNCTION__, __LINE__, dbe() );
		echo " INSERT INTO `users` (`username`,`password`,`name`,`tell`,`cell`,`wallet_credit`,`address`) VALUES 
			('".$rw['username']."',
			'".$rw['password']."',
			'".$rw['name']."',
			'".$rw['phone_number']."',
			'".$rw['mobile_number']."',
			'$credit',
			'$address') ";
			$_err++;
		}

	}

	if( sizeof($username_arr) ){
		$username_str = "'" . implode("','", $username_arr) . "'";
		if(! dbq_old(" UPDATE `users` SET `converter`='1' WHERE `username` IN ($username_str) ") ){
			e(__FUNCTION__,__LINE__,dbe());
		}
		echo "<hr>".mysql_affected_rows()." rows changed in old users";
		echo "<hr>".sizeof($username_arr)." rows inserted";
	}

	echo "<hr>";
	echo sizeof($username_arr);
	echo "<br>".intval($_err)." error";

}



