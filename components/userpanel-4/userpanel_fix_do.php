<?

#
# fix if there is no "do" selected.

function userpanel_fix_do(){

	if( $_REQUEST['do'] ){
		return true;

	} else {
		
		foreach( $GLOBALS['userpanel_item'] as $i => $array ){
			
			if(! $func_first ){
				$func_first = $array[0];
			}

			if( $array[3]==true ){
				$_REQUEST['do'] = $array[0];
				break;
			}

		}

		if(! $_REQUEST['do'] ){
			$_REQUEST['do'] = $func_first;
		}

	}

}






