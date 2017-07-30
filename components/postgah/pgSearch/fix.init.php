<?php

# jalal7h@gmail.com
# 2017/07/30
# 1.0

if( !$_REQUEST['cat_id'] and $_REQUEST['q_cat'] ){
	$_REQUEST['cat_id'] = $_REQUEST['q_cat'];
}

