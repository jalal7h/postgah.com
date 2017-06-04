<?

# jalal7h@gmail.com
# 2017/01/23
# 1.1

#
# fix if there is no "do" selected.
function userpanel_fix_do(){

	if( $_REQUEST['do_slug'] ){
		return true;

	} else {
		
		foreach( $GLOBALS['userpanel_item'] as $item ){
			
			if(! $first_slug ){
				$first_slug = $item[1];
			}

			if( $item[4] == true ){
				$_REQUEST['do_slug'] = $item[1];
				break;
			}

		}

		if(! $_REQUEST['do_slug'] ){
			$_REQUEST['do_slug'] = $first_slug;
		}

	}

}






