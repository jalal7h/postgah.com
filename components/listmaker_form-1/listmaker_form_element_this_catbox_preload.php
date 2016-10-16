<?

# jalal7h@gmail.com
# 2016/10/08
# 1.0

$GLOBALS['do_action'][] = 'listmaker_form_element_this_catbox_preload';

function listmaker_form_element_this_catbox_preload(){
	
	$the_key = $_REQUEST['info'];

	if( $cache_hit = cache( "hit", $the_key, "1hour" ) ){
		header('Content-Type: application/javascript');
		echo $cache_hit;

	} else {
		
		if(! $info = trim($_REQUEST['info']) ){
			ed(__FUNCTION__,__LINE__);
		} else if(! $info = str_dec($info) ){
			ed(__FUNCTION__,__LINE__);
		} else if(! $info = json_decode($info, true) ){
			ed(__FUNCTION__,__LINE__);
		}

		$cat_name = $info['cat_name'];
		
		$list_of_cat[] = "0";

		while( sizeof($list_of_cat) ){

			$parent = array_pop($list_of_cat);

			if(! $c = cat_fetch( $cat_name, $parent ) ){
				continue;
			
			} else {

				foreach( $c as $rw_cat_id => $rw_cat_name ){
					array_push( $list_of_cat, $rw_cat_id );
				}

				$cat_arr[ $parent ] = $c;

			}

		}


		if( sizeof($cat_arr) ){

			$c.= "\ncatjson = new Array();\n\n";

			foreach( $cat_arr as $i => $cat_rw ){
				$cat_rw_json = [];
				foreach( $cat_rw as $id => $name) {
					if( $name = trim($name) ){
						$cat_rw_json[] = '"'.$id.'":"'.$name.'"';
					}
				}
				if( sizeof($cat_rw_json) ){
					$c.= "catjson[$i]='{".implode(',', $cat_rw_json)."}';\n\n";
				}
			}

			header('Content-Type: application/javascript');
			echo cache( "make", $the_key, $c );

		}


	}

}










