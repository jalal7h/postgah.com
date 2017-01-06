<?

# jalal7h@gmail.com
# 2017/01/06
# 1.1

$GLOBALS['cmp']['setting_mg'] = 'تنظيمات';
$GLOBALS['cmp-icon']['setting_mg'] = '085';

function setting_mg(){

	$url = "./?page=admin&cp=".$_REQUEST['cp'];
	$cp = $_REQUEST['cp'];

	$menu[ $cp.'_main' ] = __('تنظیمات کلی');
	// etc ...


	#
	# action
	switch ($_REQUEST['do']) {
		case 'saveNew':
			#
			# ico
			if( $_FILES['site_ico'] ){
				$f = fileupload_upload([ "input"=>"site_ico", "ext"=>['ico'] ]);
				if( $f[0] ){
					setting( 'site_ico', $f[0] );
				}
			}
			#
			# logo 
			if( $_FILES['site_logo'] ){
				$f = fileupload_upload([ "input"=>"site_logo" ]);
				if( $f[0] ){
					setting( 'site_logo', $f[0] );
				}
			}
			#
			# etc
			foreach( $_REQUEST as $k => $r ){
				if( table('setting',$k,null,'slug') ){
					setting( $k, $r );
				}
			}
			break;
	}


	if( sizeof($GLOBALS['setting']) ){
		foreach( $GLOBALS['setting'] as $setting_func => $setting_name ){
			$menu[ $setting_func ] = $setting_name;
		}
	}

	listmaker_tabmenu($menu,$url);

}








