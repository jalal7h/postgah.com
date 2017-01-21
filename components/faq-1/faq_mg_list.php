<?

# jalal7h@gmail.com
# 2017/01/21
# 1.2

function faq_mg_list(){
	
	# --------------------------------------------
	echo listmaker_list([
		'table' => 'faq',
		'url' => [
			'base' => '_URL."/?page=admin&cp=faq_mg"', // *
			'target' => '_URL."/admin/faq/edit/".$rw["id"]',
			'add' => true,
			'remove' => true,
			'prio' => true,
			'flag' => true,	
		],
		// 'add_prompt' => 'new item link prompt',
		'remove_prompt' => '__("آیا مایل به حذف هستید?")',
		'item' => [ [ '$rw["name"]' ] ],
		'search' => [ 'name', 'text' ],
		'sort' => 'faq/admin',
	]);
	# --------------------------------------------

}







