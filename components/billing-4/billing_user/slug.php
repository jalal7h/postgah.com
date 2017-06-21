<?php

# jalal7h@gmail.com
# 2017/06/18
# 1.4

$client = Slug::getSlugByName('userpanel');

add_slug([

	$client.'/invoice/$' => _URL.'/?page=14&do_slug=payment&invoice_id=$1' ,
	$client.'/payment/redirect/$' => _URL.'/?page=14&do_slug=payment&do2=redirect&invoice_id=$1',
	$client.'/payment/verify/$' => _URL.'/?page=14&do_slug=payment&do2=redirect&do3=verify&invoice_id=$1',

]);

