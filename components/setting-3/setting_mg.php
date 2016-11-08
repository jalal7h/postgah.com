<?

# jalal7h@gmail.com
# 2016/08/28
# Version 1.3

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
		case 'save':
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








