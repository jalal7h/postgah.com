<?

# jalal7h@gmail.com
# 2016/11/01
# 1.0



// -spi-



$GLOBALS['position_config'] = [ 
	'continent', 
	'country', 
	'state', 
	'city', 
	'region', 
	'alley',
];






function position_name( $position_type ){
	
	$position_name_array = [
		'continent'=>__('قاره'), 
		'country'=>__('کشور'), 
		'state'=>__('استان'), 
		'city'=>__('شهر'), 
		'region'=>__('محله'), 
		'alley'=>__('خیابان'),
	];

	return $position_name_array[ $position_type ];

}






