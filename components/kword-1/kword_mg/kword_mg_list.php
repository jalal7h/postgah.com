<?php

# jalal7h@gmail.com
# 2017/06/30
# 1.1

function kword_mg_list(){

	# --------------------------------------------
	echo listmaker_list([
		'head' => __('لیست کلمات کلیدی'),
		'table' => 'kword',
		'order' => [ 'id' => 'desc' ],
		'limit' => 20,
		'url' => [
			'base' => '_URL."/?page=admin&cp='.$_REQUEST['cp'].'"',
			'add' => true,
			'removeAll' => true,
		],
		'item' => [
			[ 'head'=> 'کلمه کلیدی', '$rw[\'kword\']' ],
		],
		'search' => [ 'kword' ],
	]);
	# --------------------------------------------

}





