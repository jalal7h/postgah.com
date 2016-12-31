<?

# jalal7h@gmail.com
# 2016/12/31
# 1.0


// RewriteRule ^admin$ ./?page=admin [L]
add_slug([
	
	'templates/Default/css/template-admin.css' => './?do_action=include_all_css_template&page=admin' ,
	'admin' => './?page=admin',
	'admin/logout' => './?do_action=admin_logout',
	'admin/$/$' => './?page=admin&cp=$1_mg&l=$2',
	'admin/$' => './?page=admin&cp=$1_mg',

]);

