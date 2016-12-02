<?

# jalal7h@gmail.com
# 2016/12/02
# 1.0

$GLOBALS['do_action'][] = 'abusereport_mg_mailToBadUser';
$GLOBALS['mss_list']['abusereport_mg_mailToBadUser'] = 'ایمیل به کاربر متخلف';

function abusereport_mg_mailToBadUser(){

	if(! admin_logged() ){
		ed();
		
	}

	if(! $abusereport_id = $_REQUEST['abusereport_id'] ){
		ed();
	
	} else if(! $rw_ar = table('abusereport', $abusereport_id) ){
		ed();

	} else {
		
		$table_name = $rw_ar['table_name'];
		$table_id = $rw_ar['table_id'];

		if(! $item_title = lmtc( $table_name )[0] ){
			$item_title = $table_name;
		}

		if( is_column($table_name,'name') ){
			$item_name = table($table_name, $table_id, 'name');
		} else if( is_column($table_name,'text') ){
			$item_name = mb_subste( table($table_name, $table_id, 'text') , 0 , 200 );
		}

		$subject_of_abuse = $item_title." ".$item_name;
		$subject = __('گزارش تخلف در %%', [ $subject_of_abuse ] );
		
	}

	if(! $email = $_REQUEST['email'] ){
		//

	} else if(! $text = $_REQUEST['text'] ){
		//

	} else if(! xmail( $email, $subject, $text ) ){
		//

	} else {
		echo "OK";
	}
	
	echo "ER";

}

