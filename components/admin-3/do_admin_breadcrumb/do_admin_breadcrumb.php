<?

# jalal7h@gmail.com
# 2017/05/03
# 1.1

function do_admin_breadcrumb(){
	
	$links = [];

	if( $cp = $_REQUEST['cp'] ){

		$slug = substr($cp,0,-3);
		$url = _URL."/admin/".$slug;

		if( array_key_exists( $cp, $GLOBALS['cmp'] ) ){
			$name = $GLOBALS['cmp'][$cp];

		} else if( $cp == 'cat_mg' and $_REQUEST['l'] != '' ){
			$name = cat_detail( $_REQUEST['l'] )['name'];

		} else if( $cp == 'linkify_mg' and $_REQUEST['l'] != '' ){
			$name = $GLOBALS['linkify_items'][ $_REQUEST['l'] ]['name'];
		}

		if( $name ){

			$links[] = [ $url, $name ];

			$func_bc = substr($cp,0,-3).'_breadcrumb';
			if( function_exists($func_bc) ){
				if( $func_links = $func_bc() and sizeof($func_links) ){
					$links = array_merge( $links, $func_links );
				}
				
			} else {
				if( $_REQUEST['do'] == 'form' ){
					
					if( $id = $_REQUEST['id'] ){
						$links[] = [ $url.'/edit/'.$id , __('ویرایش') ];

					} else {
						$links[] = [ $url.'/new' , __('جدید') ];
					}

				}
			}

		}			
		
	}

	echo template_engine( 'do_admin_breadcrumb', [ 'links' => $links ] );

}



