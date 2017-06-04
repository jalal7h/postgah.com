<?

# jalal7h@gmail.com
# 2017/06/02
# 1.3

$client = Slug::getSlugByName('userpanel');

add_slug([

	$client.'/invoice/$' => _URL.'/?page=14&do_slug=payment&invoice_id=$1' ,
	$client.'/payment/redirect/$' => _URL.'/?page=14&do_slug=payment&do2=redirect&invoice_id=$1',
	$client.'/payment/verify/$' => _URL.'/?page=14&do_slug=payment&do2=redirect&invoice_id=$1&do3=',

	'admin/billing/user/$/$' => _URL.'/?page=admin&cp=billing_mg&func=billing_management_user&do=invoice_list&id=$1&p=$2' ,
	'admin/billing/user/$' => _URL.'/?page=admin&cp=billing_mg&func=billing_management_user&do=invoice_list&id=$1' ,


]);

