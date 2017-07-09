<?

# taghipoor.meysam@gmail.com
# 2016/11/27
# 1.0

$GLOBALS['do_action'][] = 'bookmarky_ajax';

function bookmarky_ajax(){
	
	$table_name = $_POST['table_name'];
	$table_id = $_POST['table_id'];
    
    #
    #بررسی لوگین بودن کاربر
    if ( $user_id = user_logged() ) {
     	
		#		
		# بررسی اینکه اولین کلیک هستش یا کلیک مجدد
		$query = " SELECT * FROM `bookmarky` WHERE `table_name`='".$table_name."' AND `table_id`='".$table_id."'AND `user_id`='".$user_id."' ";
	    
	    if(! $rs = dbq($query) ){
			e();
		
		} else if( dbn($rs) ){
				$flag = dbn($rs);
		}
			
		if ($flag == 0) {
		    # یعنی کاربر قبلا کلیک نکرده
			bookmarky_insert($table_name,$table_id);
		} else {
			# یعنی کاربر کلیک مجدد داشته
			bookmarky_delete($table_name,$table_id);
		}
    } else {

    	return fulse;
    }
	
}

