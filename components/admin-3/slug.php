<?

# jalal7h@gmail.com
# 2017/02/22
# 1.2

add_slug([
	
	'templates/Default/css/template-admin.css' => './?do_action=include_all_css_template&page=admin' ,
	
	'admin/logout' => './?do_action=admin_logout',
	
	'admin/$/edit/$' => './?page=admin&cp=$1_mg&do=form&id=$2',
	'admin/$/remove/$' => './?page=admin&cp=$1_mg&do=remove&id=$2',
	'admin/$/flag/$' => './?page=admin&cp=$1_mg&do=flag&id=$2',
	'admin/$/view/$' => './?page=admin&cp=$1_mg&do=view&id=$2',

	'admin/$/new' => './?page=admin&cp=$1_mg&do=form',

	'admin/cat/$' => './?page=admin&cp=cat_mg&l=$1',

	'admin/$' => './?page=admin&cp=$1_mg',
	'admin' => './?page=admin',

]);



