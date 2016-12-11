<?

# jalal7h@gmail.com
# 2016/11/17
# 1.0

function news_mg_list(){
	
	switch($_REQUEST['do']){
	
		case 'saveNew' : 
			news_mg_saveNew();
			break;
	
		case 'saveEdit' : 
			news_mg_saveEdit();
			break;
	
		case 'remove' : 
			dbrm('news');
			break;
	}
	
	$list['query'] = " SELECT * FROM `news` WHERE 1 ORDER BY `id` DESC ";
	$list['target_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=news_mg_form&p=".$_REQUEST["p"]."&id=".$rw["id"]';
	$list['paging_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]';
	$list['remove_url'] = '_URL."/?page=".$_REQUEST["page"]."&cp=".$_REQUEST["cp"]."&func=".$_REQUEST["func"]."&p=".$_REQUEST["p"]."&do=remove&id=".$rw["id"]';
	
	$list['list_array'] = array(
		// picture
		array(	"picture" => '$rw["image"]'),
		
		// name
		array(	"content" => '$rw["name"]'),

		// cat
		array(  "content" => 'cat_translate($rw["cat"])'),
				
	);
	
	echo listmaker_list($list);

}


