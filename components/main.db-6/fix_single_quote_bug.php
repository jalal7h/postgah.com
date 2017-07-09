<?php

# jalal7h@gmail.com
# 2017/07/09
# 1.2

#
# page
if( $_REQUEST['page'] ){
	$_REQUEST['page'] = ($_REQUEST['page'] == 'admin') ? 'admin' : intval($_REQUEST['page']);
	if( $_GET['page'] ){
		$_GET['page'] = $_REQUEST['page'];
	} else if( $_POST['page'] ){
		$_POST['page'] = $_REQUEST['page'];
	}
}

#
# etc
if( $_REQUEST ){
	
	foreach ($_REQUEST as $k => $v) {
		if( $v and is_string($v) ){
			
			$_REQUEST[$k] = addslashes($v);

			if( $_GET[$k] ){
				$_GET[$k] = $_REQUEST[$k];
			
			} else if( $_POST[$k] ){
				$_POST[$k] = $_REQUEST[$k];
			}

		}
	}

}



