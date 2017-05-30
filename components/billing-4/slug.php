<?

# jalal7h@gmail.com
# 2017/05/30
# 1.2

add_slug([

	Slug::getSlugByName('userpanel').'/invoice/$' => _URL.'/?page=14&do_slug=payment&invoice_id=$1' ,
	'admin/billing/user/$/$' => _URL.'/?page=admin&cp=billing_mg&func=billing_management_user&do=invoice_list&id=$1&p=$2' ,
	'admin/billing/user/$' => _URL.'/?page=admin&cp=billing_mg&func=billing_management_user&do=invoice_list&id=$1' ,

]);

