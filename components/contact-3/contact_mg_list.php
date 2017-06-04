<?

# jalal7h@gmail.com
# 2017/01/21
# 1.0

function contact_mg_list(){
	
	# --------------------------------------------
	echo listmaker_list([
		'table' => 'contact',
		'order' => [ 'id' => 'desc' ],
		'limit' => 10,
		'url' => [
			'base' => '_URL."/?page=admin&cp=".$_REQUEST["cp"]', // *
			'target' => '_URL."/admin/contact/edit/".$rw["id"]',
			'remove' => true,
		],
		'item' => [
			[ '"<a href=\'mailto:".$rw[\'email\']."\'>".$rw[\'name\']."</a>"', "head"=>lmtc("contact:name") ],
			[ 'time_inword($rw[\'date\'])', "head"=>lmtc('contact:date') ],
		],
		'search' => ["name","subject","content","email","cell"],
	]);
	# --------------------------------------------

}


