<?

# jalal7h@gmail.com
# 2016/04/19
# Version 1.2

$GLOBALS['cmp']['setting_mg'] = 'تنظيمات';
$GLOBALS['cmp-icon']['setting_mg'] = '085';

// -spi-

function setting_mg(){

	$url = "./?page=admin&cp=".$_REQUEST['cp'];
	$menu = array(
		$_REQUEST['cp'].'_main' => 'تنظیمات کلی',
		'pgSaleDuration' => 'مدت‌زمان فروش',
		"cat_management&l=product-state" => "کارکرد کالا",
		"cat_management&l=product-waight" => "رده‌های وزنی کالا",
	);
	listmaker_tabmenu($menu,$url);

}
		







