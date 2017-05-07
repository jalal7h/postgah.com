<?

# jalal7h@gmail.com
# 2017/05/06
# 1.2

function news_mg_list(){
	
	#
	# actions
	switch($_REQUEST['do']){
	
		case 'saveNew': 
			news_mg_saveNew();
			break;
	
		case 'saveEdit': 
			news_mg_saveEdit();
			break;
	
		case 'remove': 
			dbrm('news');
			break;

		case 'flag':
			listmaker_flag( 'news' );
			break;

		case 'form': 
			return news_mg_form();
			
	}
	
	#
	# the list
	# --------------------------------------------
	echo listmaker_list([
		'head' => __('لیست %%', [ lmtc('news')[1] ] ),
		'table' => 'news',
		'order' => [ 'id' => 'desc' ],
		'limit' => 5,
		'url' => [
			'base' => '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]',
			'target' => true, //'_URL."/admin/".$_REQUEST["cp"]."/edit/".$rw["id"]',
			'add' => true,
			'remove' => true,
			'flag' => true,
		],
		'filter' => [ 'cat' => [ cat_detail('news')['name'], cat_display('news') ] ],
		'item' => [
			[ 'picture' => 'news_image($rw)' ],
			[ '$rw["name"]' ],
			[ 'cat_translate($rw["cat"])' ],
		],
		'search' => [ 'name', 'text' ],
	]);
	# --------------------------------------------

}


