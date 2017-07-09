<?

# jalal7h@gmail.com
# 2016/10/09
# 1.0


// -spi-


$GLOBALS['position_config'] = [ 
	// 'continent', 
	// 'country', 
	'state', 
	'city', 
	'region', 
	// 'alley',
];





function position_name( $position_type ){
	
	$position_name_array = [
		'continent'=>'قاره', 
		'country'=>'کشور', 
		'state'=>'استان', 
		'city'=>'شهر', 
		'region'=>'محله', 
		'alley'=>'خیابان',
	];

	return $position_name_array[ $position_type ];

}









